<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use DateTime;

use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\LabelNewsController;

use App\Models\NewsSource;
use App\Models\News;
use App\Models\Label;
use App\Models\LabelNews;
use App\Models\Category;

class FetchNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'app:fetch-news-command';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch news from sources of all users';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $newsSourcesController = new NewsSourceController();
        $newsController = new NewsController();
        $labelController = new LabelController();
        $labelNewsController = new LabelNewsController();

        $newsSources = NewsSource::all();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        LabelNews::truncate();
        Label::truncate();
        News::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        foreach ($newsSources as $sources) :
            $url = $sources['url'];
            $xml = simplexml_load_file($url); /** loads the file into a SimpleXMLElement object */

            /** Iterate through each item */
            foreach ($xml->channel->item as $item) {

                /** DATE FORMATING ZONE */
                $dateString = $item->pubDate;
                $dateTime = new DateTime($dateString);
                $newDateTime = $dateTime->format('Y-m-d H:i:s');

                /** 
                 * ENDS DATE FORMATING ZONE
                 * 
                 * BEGINS DESCRIPTION FORMATING ZONE
                 */
                $parts = explode('</p>', $item->description[0], 2); // Obtains an array with the img tag in parts[0] and the text in parts[1]

                /** Separate the img tag and the text */
                $image = $parts[0];
                $text = $parts[1];

                /** Establishes a pattern to obtain src only of the img */
                $pattern = '/<img[^>]+src=["\']([^"\']+)["\']/';
                preg_match($pattern, $image, $matches); /** Searches for the pattern in the img and saves them in $matches */

                /** $matches[1] will contain the src */
                $src = isset($matches[1]) ? $matches[1] : '';

                /** 
                 * ENDS DESCRIPTION FORMATING ZONE
                 * 
                 * BEGINS LABELS FORMATING ZONE
                 */
                $labels = [];
                foreach ($item->category as $label) {
                    $labels[] = (string)$label;
                }

                /** 
                 * ENDS LABELS FORMATING ZONE
                 */

                $text = mb_strimwidth($text, 0, 196, "...");
                
                $news['title'] = $item->title;
                $news['short_description'] = $text;
                $news['image'] = $src;
                $news['permalink'] = $item->link;
                $news['date'] = $newDateTime;
                $news['news_sources_id'] = $sources['id'];
                $news['user_id'] = $sources['user_id'];
                $news['category_id'] = $sources['category_id'];

                $news_id = $newsController->store($news);

                foreach ($labels as $label) {
                    $labelController->store($label, $news_id);
                }
                

            }

        endforeach;
    }
}

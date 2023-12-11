<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\NewsSourceController;
use App\Http\Controllers\NewsController;

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

        $newsSources = NewsSource::all();
        News::truncate();

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

                /** 
                 * ENDS LABELS FORMATING ZONE
                 */
                $labels = [];
                foreach ($item->category as $label) {
                    $labels[] = (string)$label;
                }


                $news['title'] = $item->title;
                $news['description'] = $text;
                $news['image'] = $src;
                $news['link'] = $item->link;
                $news['date'] = $newDateTime;
                $news['news_source_id'] = $sources['id'];
                $news['user_id'] = $sources['user_id'];
                $news['category_id'] = $sources['category_id'];

                saveNews($news);

            }

        endforeach;
    }
}

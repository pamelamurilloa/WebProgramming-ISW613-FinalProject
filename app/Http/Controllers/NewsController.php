<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\LabelNews;
use App\Models\Label;
use App\Models\Category;

class NewsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        $news = News::with('category')->get();
        $news = News::with('newsSource')->get();

        $categories = Category::all();
    
        $labelNewsRaw = LabelNews::all()->groupBy('news_id');
        $labelNewsRaw = LabelNews::with('name')->get();

        $newsLabels = [];

        foreach ($labelNewsRaw as $label) {
        
            if (!isset($newsLabels[$label->news_id])) {
                $newsLabels[$label->news_id]=[];
            }
            array_push($newsLabels[$label->news_id], $label->name);

        }

        return view ('news.index', compact('news', 'newsLabels', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Array $news)
    {
        News::create($news);

        $insertedNews = News::orderBy('id', 'DESC')->first();

        return $insertedNews->id;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::destroy($id);
    }
}

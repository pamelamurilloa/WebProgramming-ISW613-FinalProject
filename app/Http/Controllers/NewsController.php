<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\LabelNews;
use App\Models\Label;
use App\Models\Category;

class NewsController extends Controller
{

    private function groupLabels() {

        $labelNewsRaw = LabelNews::all()->groupBy('news_id');
        $labelNewsRaw = LabelNews::with('name')->get();

        $newsLabels = [];
        foreach ($labelNewsRaw as $label) {
        
            if (!isset($newsLabels[$label->news_id])) {
                $newsLabels[$label->news_id]=[];
            }
            array_push($newsLabels[$label->news_id], $label->name);

        }

        return $newsLabels;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::all();
        $news = News::where('user_id', Auth::user()->id)->get();
        $news = News::with('category')->get();
        $news = News::with('newsSource')->get();

        $categories = Category::all();
        $newsLabels = $this->groupLabels();
        

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories'));
    }

    public function search(Request $request) {
        $search = $request->search;

        $news =News::where(function($query) use ($search){

            $query->where('title','like',"%$search%")
            ->orWhere('short_description','like',"%$search%");

            })
            ->orWhereHas('category',function($query) use($search){
                $query->where('name','like',"%$search%");
            })
            ->get();

        $labels = Label::all();
        $categories = Category::all();
        $newsLabels = $this->groupLabels();
        
        return view('news.index',compact('news', 'search', 'newsLabels', 'labels', 'categories'));
    }

    public function filterCategory(Request $request) {
        $categorySelected = $request->category_id;

        $news =News::where('category_id', $categorySelected)->get();;

        $labels = Label::all();
        $categories = Category::all();
        $newsLabels = $this->groupLabels();

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories'));
    }

    public function filterLabels(Request $request) {
        $labels = $request->all();
        
        $user = Auth::user();
        $id = $user->id;

        $newsIds = LabelNews::whereIn('label_id', $labels)->pluck('news_id')->toArray();

        $news = News::with('newsSource')->where('user_id', $id)->whereIn('id', $newsIds)->get();

        $labels = Label::all();
        $categories = Category::all();
        $newsLabels = $this->groupLabels();

        //    SELECT n.* FROM news AS n WHERE n.user_id = $id AND n.id in (
        //SELECT news_id FROM labels_news WHERE label_id IN ($labels) 
        //);

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories'));
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\LabelNews;
use App\Models\Label;
use App\Models\User;
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

    private function renderInfo(User $user, bool $guest) {
        $labels = Label::all();
        $news = News::where('user_id', $user->id)->get();
        $news = News::with('category')->get();
        $news = News::with('newsSource')->get();

        $categories = Category::all();
        $newsLabels = $this->groupLabels();

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories', 'guest'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return $this->renderInfo($user, false);
    }

    public function search(Request $request) {
        $search = $request->search;

        $user = Auth::user();
        $id = $user->id;

        $news =News::where(function($query) use ($search){

            $query->where('title','like',"%$search%")
            ->orWhere('short_description','like',"%$search%");
            })
            ->orWhereHas('category',function($query) use($search){
                $query->where('name','like',"%$search%");
            })
            ->where('user_id',"$id")
            ->get();

        $labels = Label::all();
        $categories = Category::all();
        $newsLabels = $this->groupLabels();
        $guest = false;
        
        return view('news.index',compact('news', 'search', 'newsLabels', 'labels', 'categories', 'guest'));
    }

    public function filterCategory(Request $request) {
        $categorySelected = $request->category_id;

        $user = Auth::user();
        $id = $user->id;

        $news =News::where('category_id', $categorySelected)->where('user_id', $id)->get();

        $labels = Label::all();
        $categories = Category::all();
        $newsLabels = $this->groupLabels();
        $guest = false;

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories', 'guest'));
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
        $guest = false;

        return view ('news.index', compact('news', 'newsLabels', 'labels', 'categories', 'guest'));
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

    public function guestPage(string $username) {

        $user = User::where('username','like', $username)->first();
        if (isset($user) && $user->public === 1) {
            return $this->renderInfo($user, true);
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::destroy($id);
    }
}

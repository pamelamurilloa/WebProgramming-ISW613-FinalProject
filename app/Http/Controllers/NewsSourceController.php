<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsSource;

class NewsSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsSources = NewsSource::all();
        return view ('news-sources.index')->with('newsSources', $newsSources);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $newSources = Career::all();
        return view('news-sources.create')->with('newSources', $newSources);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        NewsSource::create($input);
        return redirect('news-sources')->with('flash_message', 'Source Succesfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $newsSource = NewsSource::find($id);
        $categories = Category::all();
        return view('news-sources.edit', compact('newsSource', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newsSource = NewsSource::find($id);
        $input = $request->all();
        $newsSource->update($input);
        return redirect('news-sources')->with('flash_message', 'Source Succesfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Destroys all news associated with that source
        News::where('fk_news_sources_id', $id)->delete();
        NewsSource::destroy($id);
        return redirect('news-sources')->with('flash_message', 'Source and News Succesfully Deleted'); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
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
        $categories = Category::all();
        return view('news-sources.create')->with('categories', $categories);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
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
        News::destroy($id);
    }
}

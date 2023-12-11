<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(News $news)
    {
        $news->save();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        News::destroy($id);
    }
}

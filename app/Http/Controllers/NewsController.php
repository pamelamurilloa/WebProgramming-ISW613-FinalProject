<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(News $news)
    {
        $news->save();

        $insertedNews = YourModel::latest()->first();

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

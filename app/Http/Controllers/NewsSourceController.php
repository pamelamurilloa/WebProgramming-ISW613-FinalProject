<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsSourceController extends Controller
{
    //

    public function index () {
        return view('news-sources.index');
    }

    public function showForm () {
        return view('news-sources.form');
    }

    public function create (Request $request) {
        $message = 'it was a success in creation';
        dd($request);

        return view('news-sources.index', $message);
    }

    public function edit ($id = 0) {
        return view('news-sources.index', $message);
    }

    public function delete ($id = 0) {
        return view('news-sources.index', $message);
    }
}

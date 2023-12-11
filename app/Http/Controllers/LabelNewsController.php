<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use App\Models\LabelNews;

class LabelNewsController extends Controller
{
    public function store(int $label_id, int $news_id)
    {
        $input['label_id'] = $label_id;
        $input['news_id'] = $news_id;
        LabelNews::create($input);
    }
}

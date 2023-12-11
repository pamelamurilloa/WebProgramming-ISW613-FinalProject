<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Label;
use App\Http\Controllers\LabelNewsController;

class LabelController extends Controller
{
        /**
     * Store a newly created resource in storage.
     */
    public function store(string $label, int $news_id)
    {
        $notExists = Label::where('name', $label)->doesntExist();

        if ($notExists)
        {
            $label->save();
        }

        $record = Label::where('label', $label)->first();
        
        $labelNewsController = new LabelNewsController();
        
        $labelNewsController->store($record->id, $news_id);
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Label::destroy($id);
    }
}

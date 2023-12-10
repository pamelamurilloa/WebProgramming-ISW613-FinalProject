<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabelNews extends Model
{
    use HasFactory;

    protected $table = 'labels_news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'fk_label_id',
        'fk_news_id'
    ];
}

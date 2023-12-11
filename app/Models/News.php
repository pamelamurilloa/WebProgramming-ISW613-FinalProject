<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'short_description',
        'image',
        'permalink',
        'date',
        'news_sources_id',
        'user_id',
        'category_id'
    ];

}

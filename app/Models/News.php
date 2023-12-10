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
        'fk_news_sources_id',
        'fk_user_id',
        'fk_category_id'
    ];

}

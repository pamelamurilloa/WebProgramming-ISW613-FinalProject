<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsSource extends Model
{
    use HasFactory;

    protected $table = 'news_sources';
    protected $primaryKey = 'id';

    protected $fillable = [
        'url',
        'name',
        'fk_category_id',
        'fk_user_id'
    ];

}

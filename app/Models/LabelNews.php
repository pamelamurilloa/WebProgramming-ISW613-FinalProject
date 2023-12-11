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
        'label_id',
        'news_id'
    ];

    public function name()
    {
        return $this->belongsTo(Label::class, 'label_id');
    }
}

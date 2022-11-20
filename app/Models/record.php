<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_num',
        'chapter_num',
        'verse_num',
        'content',
        'uploadnotprocess',
        'uploadedid'
    ];
}

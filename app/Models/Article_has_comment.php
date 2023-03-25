<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article_has_comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'articles_students_users_id',
        'comments_id',
    ];
}

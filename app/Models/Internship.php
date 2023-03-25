<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;
    protected $fillable = [
        'employers_users_id',
        'title',
        'photo',
        'date_start',
        'date_end',
        'description',
        'contact_person',
        'phone',
        'extension',
        'email',
        'requirement',
        'link',
    ];
}

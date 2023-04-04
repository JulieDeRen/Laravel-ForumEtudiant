<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'users_id';
    protected $fillable = [
        'users_id',
        'birthday',
        'presentation',
        'programs_id',
        'degrees_id',
    ];
}

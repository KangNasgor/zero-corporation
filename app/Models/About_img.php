<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about_img extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'image',
        'name',
        'role',
        'status',
    ];
}

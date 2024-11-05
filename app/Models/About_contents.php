<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About_contents extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'value',
        'status',
        'created_at',
        'updated_at',
    ];
}

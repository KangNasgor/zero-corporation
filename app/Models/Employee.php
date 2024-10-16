<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'age',
        'salary',
        'status',
        'created_at',
        'updated_at'
    ];
    public function products(): HasMany {
        return $this->hasMany(Products::class);
    }
}
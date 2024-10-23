<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dashboard_content extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id',
        'description',
        'modal_description',
        'status',
        'image',
    ];
    public function product():BelongsTo{
        return $this->belongsTo(Products::class);
    }
}
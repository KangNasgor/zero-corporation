<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'status',
        'handler_id',
    ];
    public function handler(): BelongsTo{
        return $this->belongsTo(Employee::class);
    }

}

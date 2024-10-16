<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'status',
    ];
    public function employee(): BelongsTo{
        return $this->belongsTo(Employee::class);
    }

}

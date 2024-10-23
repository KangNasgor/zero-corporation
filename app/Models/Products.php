<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Employee;

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
    public function content(): HasMany{
        return $this->hasMany(Dashboard_content::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'image',
        'blogpages_id',
        'status',
    ];
    public function blogpage(): HasOne{
        return $this->hasOne(Blogpage::class);
    }
}

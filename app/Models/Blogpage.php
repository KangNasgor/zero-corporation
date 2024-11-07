<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Blogpage extends Model
{
    use HasFactory;
    public function blog(): HasOne{
        return $this->hasOne(Blog::class);
    }
}

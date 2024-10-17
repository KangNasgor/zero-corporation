<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'password',
        'role_id',
        'status',
    ];
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     *
     *
     * @param string|array $roles
     * @return bool
     */
    public function hasRole($roles)
    {
        if(!$this->role){
            return false;
        }
        if(is_array($roles)){
            return in_array($this->role_id->name, $roles);
        }
        return $this->role_id->name === $roles;
    }
}

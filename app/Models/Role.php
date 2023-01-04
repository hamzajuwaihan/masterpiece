<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function user_roles()
    {
        return $this->hasMany(User_Role::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles');
    }

    

}

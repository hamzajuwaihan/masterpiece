<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsToMany(User::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(Sub_Category::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
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
    
    public function type()
    {
        return $this->belongsTo(CourseType::class);
    }
    public function instructors()
    {
        return $this->belongsToMany(Instructor_Course::class, 'instructor_courses', 'user_id');
    }
    

    public function materials()
    {
        return $this->hasMany(Material::class,'course_id');
    }
}

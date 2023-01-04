<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'course_id',
        'position'
    ];
    public function material()
    {
        return $this->belongsTo(Sub_Category::class);
    }
}

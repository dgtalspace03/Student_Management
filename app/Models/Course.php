<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'original_price',
        'category_id',
        'thumbnail',
        'level',
        'slug'

    ];
    public function category() : BelongsTo {
        return $this->belongsTo(Categories::class,'category_id');
    }
    public function lessons():HasMany{
        return $this->hasMany(Lesson::class,'course_id');
    }
    public function all_assigned_course():HasMany{
        return $this->hasMany(CourseTeacherAssignment::class,'course_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        return $this->hasMany(Lesson::class,'course_id')->orderBy('position', 'asc');
    }
    public function teachers(){
        return $this->belongsToMany(User::class, 'course_teacher_assignments', 'course_id', 'teacher_id');
    }
    public function students():BelongsToMany{
        return $this->belongsToMany(User::class,'enrollments','course_id','user_id')->withTimestamps();
    }
    
}

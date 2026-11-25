<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
     protected $fillable = [
        'course_id',
        'user_id',
        'order_id'
    ];
    public function student():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }
    public function course():BelongsTo{
        return $this->belongsTo(Course::class,'course_id');
    }
    public function order():BelongsTo{
        return $this->belongsTo(Order::class,'order_id');
    }
}

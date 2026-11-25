<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model

{
    protected $fillable = [
        'user_id',
        'course_id',
        'stripe_session_id',
        'currency',
        'amount',
        'stripe_payment_intent_id',
        'status'

    ];
    protected function casts(): array
    {
        return [
            
            'status' => OrderStatus::class,
        ];
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'user_id');
    }
    public function course():BelongsTo{
        return $this->belongsTo(Course::class,'course_id');
    }
}

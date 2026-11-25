<?php

namespace App\Http\Controllers;

use App\Enum\OrderStatus;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Order;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    protected StripeService $stripe;
    function __construct(StripeService $stripe)
    {
        $this->stripe = $stripe;
    }
    public function checkout($course_id)
    {
        $course = Course::findOrFail($course_id);
        $user = Auth::user();
        $existing_enrollment=Enrollment::where('user_id', $user->id)->where('course_id', $course->id)->exists();
        if ($existing_enrollment) {
        return redirect()->route('course-details', $course->slug)
            ->with('error', 'You are already enrolled in this course.');
    }
        
        $order = Order::create([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'amount' => $course->price * 100,
            'currency' => 'usd'
        ]);
        $session=$this->stripe->checkout($order);


        return redirect($session->url);
    }
    public function success(Request $request)
    {
       $sessionId = $request->query('session_id');
    abort_unless($sessionId, 404);

    $order = Order::with('course')
        ->where('stripe_session_id', $sessionId)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    return view('payment.success', [
        'order'  => $order,
        'course' => $order->course,
    ]);
    
    }
   public function cancel(Request $request)
{
    $order = Order::with('course')
        ->where('id', $request->query('order'))
        ->where('user_id', Auth::id())
        ->first();
    $order->status=OrderStatus::Cancelled;
    $order->save();
    return view('payment.cancel', [
        'order'  => $order,
        'course' => $order?->course,
    ]);
}
}

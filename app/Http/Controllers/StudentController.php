<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Services\StripeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Invoice;

class StudentController extends Controller
{
protected StripeService $stripe;
    function __construct(StripeService $stripe)
    {
        $this->stripe = $stripe;
    }
 public function CourseDetails($slug){
   $invoice=$this->stripe->client()->invoices->retrieve('in_1UgQhaAlHQ4SUaR55rFrwle4');
  
    $course=Course::where('slug',$slug)->firstOrFail();
    $student_enrolled=$course->students()->where('users.id',Auth::id())->first()!=null;
   
    $duration=Lesson::where('course_id',$course->id)->sum('duration');
   $hour=(int)($duration/60);
   $minute=$duration%60;
  
    return view('course-details',compact('course','hour','minute','student_enrolled'));
 }
}

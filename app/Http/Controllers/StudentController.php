<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
 public function CourseDetails($slug){
    $course=Course::where('slug',$slug)->firstOrFail();
    $student_enrolled=$course->students()->where('users.id',Auth::id())->first()!=null;
   
    $duration=Lesson::where('course_id',$course->id)->sum('duration');
   $hour=(int)($duration/60);
   $minute=$duration%60;
   
    return view('course-details',compact('course','hour','minute','student_enrolled'));
 }
}

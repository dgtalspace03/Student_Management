<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
 public function CourseDetails($slug){
    $course=Course::where('slug',$slug)->firstOrFail();
    return view('course-details',compact('course'));
 }
}

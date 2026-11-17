<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function ShowAssignedCourses(){
        return view('teacher.index');
    }
    public function ShowCourseDetails($id){
        return view('teacher.course-details');
    }
}

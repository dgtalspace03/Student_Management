<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ShowCourse(){
     
            return view('admin.course');     
    }
    public function ShowCourseTeacher($id){
        return view('admin.course-teacher');
    }
    public function ShowTeacher(){
        return view('admin.teacher');
    }
    public function CourseLesson(){
        return view('admin.course-lesson');
    }
}

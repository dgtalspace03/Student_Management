<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseTeacherAssignment;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function ShowAssignedCourses()
    {
        $teacher = Auth::user();
        return view('teacher.index', compact('teacher'));
    }
    public function ShowCourseDetails($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $assigned_course=CourseTeacherAssignment::where([
            'course_id'=>$course->id,
            'teacher_id'=>Auth::id()
        ])->firstOrFail();
        

        $duration = Lesson::where('course_id', $course->id)->sum('duration');
        $hour = (int)($duration / 60);
        $minute = $duration % 60;
        return view('teacher.course-details', compact('course', 'hour','minute'));
    }
}

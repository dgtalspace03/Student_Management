<?php

use App\Models\Course;
use App\Models\Roles;
use App\Models\User;

 function total_student(){
        $student_role = Roles::where('slug', 'student')->firstOrFail();

        return User::where('role_id', $student_role->id)->count();
 }
 function total_teacher(){
        $teacher_role = Roles::where('slug', 'teacher')->firstOrFail();

        return User::where('role_id', $teacher_role->id)->count();
 }
 function total_course(){
    return Course::count();
 }
?>
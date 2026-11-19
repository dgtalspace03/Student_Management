<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'setLocale',
    'student'
])->controller(StudentController::class)
->group(function () {
    Route::view('/', 'index')->name('home');

    Route::get('/course/{slug}', 'CourseDetails')->name('course-details');
});

Route::prefix('admin')
    ->middleware(['admin'])
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/',function(){
            return redirect()->route('admin-course');
        });
        Route::get('/course', 'ShowCourse')->name('admin-course');
        Route::get('/course/create','CreateCoursePage')->name('admin-course-create');
        Route::post('/course/create','CreateCourse')->name('admin-course-create-post');
        Route::get('/course/{slug}/teachers','ShowCourseTeacher')->name('admin-course-teacher');
        Route::post('/course/{course_id}/teacher/assign','AssaignCourseTeacher')->name('admin-course-teacher-assign');
        Route::post('/course/{course_id}/teacher/remove/{teacher_id}','RemoveCourseTeacher')->name('admin-course-teacher-remove');
        Route::get('/course/{slug}/lesson',"CourseLesson")->name("admin-course-lesson");
        Route::post('/course/{id}/lesson/create','CreateLesson')->name("admin-course-lesson-create");
        Route::get('/teacher','ShowTeacher')->name('admin-teacher');
        Route::view('/teacher/create','admin.create-teacher')->name('admin-teacher-create');
        Route::post('/teacher/create','CreateTeacher')->name('admin-teacher-create-post');
        Route::get('/categories','ShowCategories')->name('admin-categories');
        Route::post('/categories/create','CreateCategories')->name('admin-categories-create');
        Route::post('/categories/delete/{id}','DeleteCategories')->name('admin-categories-delete');

    });
Route::prefix('teacher')
        ->middleware(['teacher'])
        ->controller(TeacherController::class)
        ->group(function(){
        Route::get('/','ShowAssignedCourses')->name('teacher');
        Route::get('/course/{slug}','ShowCourseDetails')->name('teacher-course-details');
        });
Route::post('/lang/{la}', function ($la) {
    if ($la == 'bn' || $la == 'en') {
        Session::put('lang', $la);
    }
    return redirect()->back();
})->name('setLanguage');

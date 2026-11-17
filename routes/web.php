<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'setLocale'
])->group(function () {
    Route::view('/', 'welcome')->name('home');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/course/{slug}', function ($slug) {
        $arr = array_filter(config('constant.courses'), fn($st) => $st['slug'] === $slug);
        if (count($arr) == 0) abort(404, "course not found");

        $course = reset($arr);
        return view('course-details', compact('course'));
    })->name('course-details');
});

Route::prefix('admin')
    ->middleware(['admin'])
    ->controller(AdminController::class)
    ->group(function () {
        Route::get('/',function(){
            return redirect()->route('admin-course');
        });
        Route::get('/course', 'ShowCourse')->name('admin-course');
        Route::view('/course/create','admin.course-create')->name('admin-course-create');
        Route::get('/course/{id}/teachers','ShowCourseTeacher')->name('admin-course-teacher');
        Route::get('/course/{id}/lesson',"CourseLesson")->name("admin-course-lesson");
        Route::get('/teacher','ShowTeacher')->name('admin-teacher');
        Route::view('/teacher/create','admin.create-teacher')->name('admin-teacher-create');

    });
Route::prefix('teacher')
        ->middleware(['teacher'])
        ->controller(TeacherController::class)
        ->group(function(){
        Route::get('/','ShowAssignedCourses')->name('teacher');
        Route::get('/course/{id}','ShowCourseDetails')->name('teacher-course-details');
        });
Route::post('/lang/{la}', function ($la) {
    if ($la == 'bn' || $la == 'en') {
        Session::put('lang', $la);
    }
    return redirect()->back();
})->name('setLanguage');

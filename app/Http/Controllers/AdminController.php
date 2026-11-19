<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Mail\NewUser;
use App\Models\Categories;
use App\Models\Course;
use App\Models\CourseTeacherAssignment;
use App\Models\Lesson;
use App\Models\Roles;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Laravel\Jetstream\Jetstream;


class AdminController extends Controller
{
    public function ShowCourse()
    {
        $all_courses = Course::all();

        return view('admin.course', compact('all_courses'));
    }
    public function CreateCoursePage()
    {
        $all_categories = Categories::all();
        return view('admin.course-create', compact('all_categories'));
    }
    public function CreateCourse(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:100'
        ]);
        $title = $request->input('title');
        $slug = Str::slug($title);

        $request->merge([
            'slug' => $slug
        ]);
        $request->validate([

            'description' => 'required|string|min:20|max:400',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0|max:100000000',
            'original_price' => 'required|numeric|min:0|max:100000000',
            'level' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'slug' => 'required|unique:courses,slug'
        ], [
            'slug.unique' => 'This name already exists. Please choose another name.'
        ]);

        try {


            $description = $request->input('description');
            $category_slug = $request->input('category');
            $price = $request->input('price');
            $original_price = $request->input('original_price');
            $thumbnail = $request->file('thumbnail');
            $level = $request->input('level');

            $category = Categories::where('slug', $category_slug)->firstOrFail();

            $thumbnail_url = $thumbnail->store('thumbnail', 'public');

            Course::create([
                'title' => $title,
                'description' => $description,
                'category_id' => $category->id,
                'level' => $level,
                'original_price' => $original_price,
                'price' => $price,
                'thumbnail' => $thumbnail_url,
                'slug' => $slug
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }

        return redirect(route('admin-course'));
    }
    public function ShowCourseTeacher($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $teacher_role = Roles::where('slug', 'teacher')->firstOrFail();
        $unassigned_teacher = User::where('role_id', $teacher_role->id)->whereDoesntHave('all_assigned_course', function ($q) use ($course) {
            $q->where('course_id', $course->id);
        })->get();

        return view('admin.course-teacher', compact('unassigned_teacher', 'course'));
    }
    public function AssaignCourseTeacher(Request $request, $course_id)
    {
        $request->validate([
            'teacher_id' => "required"
        ]);
        $teacher_id = $request->input('teacher_id');
        $teacher_role = Roles::where('slug', 'teacher')->firstOrFail();
        $teacher = User::where([
            [
                'role_id',
                '=',
                $teacher_role->id
            ],
            [
                'id',
                '=',
                $teacher_id
            ]
        ])->firstOrFail();
        $course=Course::findOrFail($course_id);
        CourseTeacherAssignment::create([
        'course_id'=>$course->id,
        'teacher_id'=>$teacher->id
        ]);
        return redirect()->back();
    }
    public function RemoveCourseTeacher($course_id,$teacher_id){
        $assigned_record=CourseTeacherAssignment::where([
            'course_id'=>$course_id,
            'teacher_id'=>$teacher_id
        ])->firstOrFail();
        $assigned_record->delete();
        return redirect()->back();
    }
    public function ShowTeacher()
    {
        $teacher_role = Roles::where('slug', 'teacher')->firstOrFail();
        $all_teachers = User::where('role_id', $teacher_role->id)->get();
        return view('admin.teacher', compact('all_teachers'));
    }
    public function CreateTeacher(Request $request, CreateNewUser $create_new_user)
    {
        $teacher = $create_new_user->create($request->all(), 'teacher');
        if ($teacher->id) {
            return redirect(route('admin-teacher'));
        }
        return redirect()->back();
    }
    public function CourseLesson($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('admin.course-lesson', compact('course'));
    }
    public function CreateLesson(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $request->validate([
            'title' => 'required|string|min:4|max:100',
            'duration' => 'numeric|min:1|max:1000'
        ]);
        $title = $request->input('title');
        $duration = $request->input('duration');
        Lesson::create([
            'title' => $title,
            'duration' => $duration,
            'course_id' => $course->id
        ]);
        return redirect(route('admin-course-lesson', $course->slug));
    }

    public function ShowCategories()
    {
        $all_categories = Categories::all();
        return view('admin.categories', compact('all_categories'));
    }
    public function CreateCategories(Request $request)

    {
        $request->validate([
            'name' => 'required|string|min:3|max:30'
        ]);
        $name = $request->input('name');

        $slug = Str::slug($name);

        $request->merge([
            'slug' => $slug
        ]);

        $request->validate([
            'slug' => 'required|unique:categories,slug'
        ], [
            'slug.unique' => 'This name already exists. Please choose another name.'
        ]);
        Categories::create([
            'name' => $name,
            'slug' => $slug
        ]);
        return redirect(route('admin-categories'));
    }
    public function DeleteCategories($id){
        $category=Categories::findOrFail($id);
        $category->delete();
        return redirect()->back();

    }
}

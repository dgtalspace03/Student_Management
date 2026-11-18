<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
          
            'description' => 'required|string|min:20|max:300',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0|max:100000000',
            'original_price' => 'required|numeric|min:0|max:100000000',
            'level' => 'required|string',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'slug' => 'required|unique:courses,slug'
        ],[
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
                'slug'=>$slug
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }

        return redirect(route('admin-course'));
    }
    public function ShowCourseTeacher($id)
    {
        return view('admin.course-teacher');
    }
    public function ShowTeacher()
    {
        return view('admin.teacher');
    }
    public function CourseLesson($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('admin.course-lesson',compact('course'));
    }
    public function CreateLesson(Request $request,$id) {
        $course=Course::findOrFail($id);
        $request->validate([
        'title'=>'required|string|min:4|max:100',
        'duration'=>'numeric|min:1|max:1000'
        ]);
        $title=$request->input('title');
        $duration=$request->input('duration');
        Lesson::create([
        'title'=>$title,
        'duration'=>$duration,
        'course_id'=>$course->id
        ]);
    return redirect(route('admin-course-lesson',$course->slug));
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
}

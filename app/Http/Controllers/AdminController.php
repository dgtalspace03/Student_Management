<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Jetstream\DeleteUser;
use App\Enum\OrderStatus;
use App\Enum\UserStatus;
use App\Mail\NewCourse;
use App\Mail\NewUser;
use App\Models\Categories;
use App\Models\Course;
use App\Models\CourseTeacherAssignment;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Order;
use App\Models\Roles;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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

            $course = Course::create([
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
            return redirect()->back()->with('error', 'Failed to add course');
        }
        $student_role = Roles::where('slug', 'student')->firstOrFail();
        $students = User::where('role_id', $student_role->id)->get();
        foreach ($students as $student) {
            Mail::to($student->email)->queue(new NewCourse($course));
        }
        return redirect(route('admin-course'))->with('success', 'Course Added Successfully');
    }
    public function EditCoursePage($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $all_categories = Categories::all();
        return view('admin.course-edit', compact('all_categories', 'course'));
    }
    public function EditCourse(Request $request, $slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();





        $request->validate([
            'title' => 'required|string|min:3|max:100',
            'description' => 'required|string|min:20|max:400',
            'category' => 'required|string',
            'price' => 'required|numeric|min:0|max:100000000',
            'original_price' => 'required|numeric|min:0|max:100000000',
            'level' => 'required|string',
            'thumbnail' => 'image|mimes:jpg,jpeg,png,webp|max:5120',

        ]);

        try {

            $title = $request->input('title');
            $description = $request->input('description');
            $category_slug = $request->input('category');
            $price = $request->input('price');
            $original_price = $request->input('original_price');

            $level = $request->input('level');

            $category = Categories::where('slug', $category_slug)->firstOrFail();
            $thumbnail_url = $course->thumbnail;

            if ($request->hasFile('thumbnail')) {
                Storage::disk('public')->delete($course->thumbnail);
                $thumbnail = $request->file('thumbnail');
                $thumbnail_url = $thumbnail->store('thumbnail', 'public');
            }
            $course->update([
                'title' => $title,
                'description' => $description,
                'category_id' => $category->id,
                'level' => $level,
                'original_price' => $original_price,
                'price' => $price,
                'thumbnail' => $thumbnail_url,
            ]);
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', 'Failed to edit course');
        }

        return redirect(route('admin-course'))->with('success', 'Course Edited Successfully');
    }
    public function ShowCourseTeacher($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $teacher_role = Roles::where('slug', 'teacher')->firstOrFail();
        $unassigned_teacher = User::where('role_id', $teacher_role->id)->whereDoesntHave('courses', function ($q) use ($course) {
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
        $course = Course::findOrFail($course_id);
        CourseTeacherAssignment::create([
            'course_id' => $course->id,
            'teacher_id' => $teacher->id
        ]);
        return redirect()->back();
    }
    public function RemoveCourseTeacher($course_id, $teacher_id)
    {
        $assigned_record = CourseTeacherAssignment::where([
            'course_id' => $course_id,
            'teacher_id' => $teacher_id
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
    public function DeleteTeacher($id, DeleteUser $delete_user)
    {
        try {
            $teacher = User::findOrFail($id);
            $delete_user->delete($teacher);
            return redirect(route('admin-teacher'))->with('success', "Teacher Deleted Successfully");
        } catch (\Throwable $th) {
            return redirect(route('admin-teacher'))->with('error', "Failed to Delete Teacher");
        }
    }

    public function ShowStudent(){
        $st_role=Roles::where('slug','student')->firstOrFail();
        $students=User::where('role_id',$st_role->id)->get();

        return view('admin.student',compact('students'));
    }
    public function Toggle_Student_Status($id){
        $student=User::findOrFail($id);
        if($student->status===UserStatus::ACTIVATED){
            $student->status=UserStatus::DEACTIVATED;
        }else{
            $student->status=UserStatus::ACTIVATED;
        }
        $student->save();
        return redirect()->back()->with('success','Successfully changed student status');
    }
    public function CourseLesson($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('admin.course-lesson', compact('course'));
    }
    public function CreateLesson(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $position = Lesson::where('course_id', $course->id)->max('position') + 1;
        $request->validate([
            'title' => 'required|string|min:4|max:100',
            'duration' => 'numeric|min:1|max:1000'
        ]);
        $title = $request->input('title');
        $duration = $request->input('duration');
        Lesson::create([
            'title' => $title,
            'duration' => $duration,
            'course_id' => $course->id,
            'position' => $position
        ]);
        return redirect(route('admin-course-lesson', $course->slug));
    }
    public function UpLesson(Request $request, $course_id, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $max_position = Lesson::where('course_id', $course_id)->max('position');
        $cur_pos = $lesson->position;
        if ($lesson->position != 1) {
            $prev_lesson = Lesson::where([
                'course_id' => $course_id,
                'position' => $cur_pos - 1
            ])->firstOrFail();
            $lesson->position = $cur_pos - 1;
            $prev_lesson->position = $cur_pos;
            $lesson->save();
            $prev_lesson->save();
        }
        return redirect()->back();
    }
    public function DownLesson($course_id, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $max_position = Lesson::where('course_id', $course_id)->max('position');
        $cur_pos = $lesson->position;
        if ($lesson->position != $max_position) {
            $next_lesson = Lesson::where([
                'course_id' => $course_id,
                'position' => $cur_pos + 1
            ])->firstOrFail();
            $lesson->position = $cur_pos + 1;
            $next_lesson->position = $cur_pos;
            $lesson->save();
            $next_lesson->save();
        }
        return redirect()->back();
    }

    public function DeleteLesson($id)
    {


        try {
            DB::transaction(function () use ($id) {
                $lesson = Lesson::findOrFail($id);
                $position = $lesson->position;
                Lesson::where('course_id', $lesson->course_id)
                    ->where('position', '>', $position)
                    ->decrement('position');
                $lesson->delete();
            });

            return redirect()->back()->with('success', 'Lesson Deleted Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Failed to delete lesson');
        }
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
    public function DeleteCategories($id)
    {
        $category = Categories::findOrFail($id);
        $course_count = count($category->courses);
        if ($course_count > 0) {
            return redirect()->back()->with('error', "This category is associated with $course_count course you can not delete it");
        }
        $category->delete();
        return redirect()->back()->with('success', "Category Deleted Successfully/");
    }

    public function ShowOrder(){
        $orders=Order::orderBy('created_at','desc')->get();
        $total_revenue=Order::where('status',OrderStatus::Paid)->sum('amount');
        $statuses=OrderStatus::cases();
        return view('admin.orders',compact('orders','total_revenue','statuses'));
    }

    public function ShowEnrollment(){
        $enrollments=Enrollment::orderBy('created_at','desc')->get();
        return view('admin.enrollments',compact('enrollments'));
    }
}

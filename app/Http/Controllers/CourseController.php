<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Bulletin;

class CourseController extends Controller
{
    public function index()
    {
        return view('course', [
            "title" => "Course",
            "active" => "course",
            //"posts" => pertanyaanPost::all()
            "posts" => Course::latest()->get()
        ]);
    }

    public function show(Course $course)
    {
        return view('singleCourse', [
            "title" => "Single Post",
            "active" => "course",
            "post" => $course
        ]);
    }

    public function create()
    {
        return view('course.posts.create', [
            "title" => "Create New Course",
            "active" => "home",
        ]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title" => 'required|max:255',
            'slug' => 'required|unique:courses',
            'body' => 'required' 
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Course::create($validatedData);
        return redirect('/course')->with('success', 'New course has been added!');
    }

    public function destroy(Course $course)
    {
        Course::destroy($course->id);
        return redirect('/course')->with('success', 'Course deleted!');
    }

    public function edit(Course $courses)
    {
        return view('course.posts.edit', [
            "title" => "Edit Course",
            "active" => "course",
            "post" => $courses
        ]);
    }

    public function update(Request $request, Course $courses)
    {
        $rules = ([
            "title" => 'required|max:255',
            'body' => 'required' 
        ]);

        if($request->slug != $courses->slug)
        {
            $rules['slug'] = 'required|unique:courses';
        }

        $validatedData=$request->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Course::where('id', $courses->id)->update($validatedData);
        return redirect('/course')->with('success', 'Course updated!');
    }
}

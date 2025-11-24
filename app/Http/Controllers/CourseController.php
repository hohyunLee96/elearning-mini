<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;

class CourseController extends Controller
{
    public function __construct(
        private CourseService $courseService
    ) {}

    public function index()
    {
        $courses = $this->courseService->listCourses();

        return view('courses.index', compact('courses'));
    }

    public function show(Course $course)
    {
        [$course, $enrolled] = $this->courseService
            ->getCourseAndEnrollStatus($course, auth()->user());

        return view('courses.show', compact('course', 'enrolled'));
    }
}

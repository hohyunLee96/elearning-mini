<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\EnrollmentService;

class EnrollmentController extends Controller
{
    public function __construct(
        private EnrollmentService $enrollmentService
    ) {}

    public function store(Course $course)
    {
        $user = auth()->user();

        $this->enrollmentService->enrollInCourse($course, $user);

        return response()->json([
            'status'  => 'ok',
            'message' => 'You are enrolled in this course.',
        ]);
    }

    public function destroy(Course $course)
    {
        $user = auth()->user();

        $removed = $this->enrollmentService->unenrollFromCourse($course, $user);

        if ($removed) {
            return response()->json([
                'status'  => 'ok',
                'message' => 'You have been deregistered from this course.',
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'You were not enrolled in this course.',
        ], 400);
    }
}

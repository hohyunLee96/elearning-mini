<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use App\Repositories\EnrollmentRepository;

class CourseService
{
    public function __construct(
        private EnrollmentRepository $enrollmentRepository
    ) {}

    public function listCourses()
    {
        return Course::all();
    }

    public function getCourseAndEnrollStatus(Course $course, ?User $user): array
    {
        $course->load('lessons');

        $enrolled = false;

        if ($user) {
            $enrolled = $this->enrollmentRepository
                ->isUserEnrolled($course->id, $user->id);
        }

        return [$course, $enrolled];
    }
}

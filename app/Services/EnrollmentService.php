<?php

namespace App\Services;

use App\Models\Course;
use App\Models\User;
use App\Repositories\EnrollmentRepository;

class EnrollmentService
{
    public function __construct(
        private EnrollmentRepository $enrollmentRepository
    ) {}

    public function enrollInCourse(Course $course, User $user)
    {
        return $this->enrollmentRepository
            ->createEnrollment($course->id, $user->id);
    }

    public function unenrollFromCourse(Course $course, User $user): bool
    {
        return $this->enrollmentRepository->deleteEnrollment($course->id, $user->id);
    }
}

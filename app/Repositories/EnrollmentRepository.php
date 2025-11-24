<?php

namespace App\Repositories;

use App\Models\Enrollment;

class EnrollmentRepository
{
    public function isUserEnrolled(int $courseId, int $userId): bool
    {
        return Enrollment::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->exists();
    }

    public function createEnrollment(int $courseId, int $userId): Enrollment
    {
        return Enrollment::firstOrCreate(
            [
                'course_id' => $courseId,
                'user_id'   => $userId,
            ],
            [
                'enrolled_at' => now(),
            ]
        );
    }

    public function deleteEnrollment(int $courseId, int $userId): bool
    {
        return Enrollment::where('course_id', $courseId)
            ->where('user_id', $userId)
            ->delete() > 0;
    }
}

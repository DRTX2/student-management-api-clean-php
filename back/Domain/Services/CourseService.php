<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Entities\Course;


interface Course_service
{
    public function getCourseById(int $id): ?Course;
    public function getAllCourses(): array;
    public function addCourse(Course $course): void;
    public function updateCourse(Course $course): void;
    public function deleteCourse(int $id): void;
}

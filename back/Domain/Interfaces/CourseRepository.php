<?php
declare(strict_types=1);
namespace App\Domain\Interfaces;

use App\Domain\Entities\Course;

interface Course_repository{
    public function findById(int $id): ?Course;
    public function fetchAll(): array;
    public function save(Course $course): void;
    public function delete(int $id): void;
}
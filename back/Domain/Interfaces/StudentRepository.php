<?php
declare(strict_types=1);

namespace App\Domain\Interfaces;
use App\Domain\Entities\Student;

interface StudentRepository
{
    public function findByDni(string $dni): ?Student;
    public function fetchAll(): array;
    public function create(Student $student):void;
    public function update(string $dni, Student $student):void;
    public function delete(string $dni):void;
}
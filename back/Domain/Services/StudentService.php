<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Entities\Student;
use App\Domain\Interfaces\StudentRepository;
use PDOException;

class StudentService
{
    private StudentRepository $repository;
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }
    public function getStudentByDni(string $dni): ?Student
    {
        return $this->repository->findByDni($dni);
    }
    public function getAllStudents(): array
    {
        return $this->repository->fetchAll();
    }
    public function createStudent(Student $student): void
    {
        $savedStudent = $this->repository->findByDni($student->getDni());
        if ($savedStudent) 
            throw new PDOException("Student already exists");
        $this->repository->create($student);
    }
    public function updateStudent(string $dni, Student $student)
    {
        $studentToUpdate = $this->repository->findByDni($student->getDni());
        if (!$studentToUpdate) 
            throw new PDOException("Student should exists to update");
        $this->repository->update($dni,$student);
    }

    public function deleteStudent(string $dni): void
    {
        $this->repository->delete($dni);
    }
}

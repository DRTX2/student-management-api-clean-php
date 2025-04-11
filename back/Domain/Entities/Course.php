<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use InvalidArgumentException;

class Course
{
    private ?int $id;
    private string $code;
    private array $students;
    private Professor $professor;

    public function __construct(string $code, Professor $professor, array $students = [], ?int $id = null)
    {
        // the third paramether it's an array that init empty if we don't starter it.
        // the fourth paramether it's an optional paramether that can be null, ?=null
        $this->id = $id;
        $this->code = $code;
        $this->students = $students;
        $this->professor = $professor;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function setCode(string $code)
    {
        $this->code = $code;
    }
    public function getProfessor(): Professor
    {
        return $this->professor;
    }

    public function setProfessor(Professor $professor): void
    {
        $this->professor = $professor;
    }

    public function getStudents(): array
    {
        return $this->students;
    }
    public function setStudents(array $students): void
    {
        foreach ($students as $student) {
            if (!$student instanceof Student)
                throw new InvalidArgumentException("All elements in students array needs be an Student");
        }
        $this->students = $students;
    }
    // public function addStudent(Student $student): void {
    //     $this->students[] = $student;
    // }

    public function __toString(): string
    {
        return "Course: {$this->code}, Professor: {$this->professor}, Students: " . implode(", ", array_map(function ($student) {
            return (string)$student;
        }, $this->students));
    }
}

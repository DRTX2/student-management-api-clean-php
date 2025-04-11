<?php

namespace Application\UseCases\Course;

use App\Domain\Entities\Course;
use App\Domain\Interfaces\Course_repository;

class CreateCourseUseCase
{
    private Course_repository $courseRepository;

    public function __construct(Course_repository $courseRepository) {
        $this->courseRepository = $courseRepository;
    }

    public function execute($code, $professor){
        $course=new Course(
            $code,
            $professor
        );
        $this->courseRepository->addCourse($course);
    }
}

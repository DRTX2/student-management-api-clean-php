<?php
declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Entities\Professor;

interface Professor_service{
    function getProsfessorByDni($dni):?Professor;
    function getAllProfessors():array;
    function addProfessor(Professor $professor):void;
    function updateProfessor(Professor $professor):void;
    function deleteProfessor($id):void;
    
}
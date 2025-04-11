<?php
declare(strict_types=1);
namespace App\Domain\Interfaces;

use App\Domain\Entities\Professor;

interface Professor_repository
{
    public function findByDni($dni): ?Professor;
    public function fetchAll(): array;
    public function save(Professor $professor): void;
    public function delete($id): void;
}
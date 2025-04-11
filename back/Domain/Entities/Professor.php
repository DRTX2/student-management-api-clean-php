<?php

declare(strict_types=1);

namespace App\Domain\Entities;

class Professor
{
    private ?int $id;
    private string $dni;
    private string $name;
    private string $surname;
    private string $phone;
    private string $address;

    public function __construct(string $dni, string $name, string $surname, string $phone = "", string $address = "", ?int $id = 0)
    {
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->address = $address;
    }

    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }
    public function getFullName()
    {
        return $this->name . ' ' . $this->surname;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($address): void
    {
        $this->address = $address;
    }
    public function __toString()
    {
        return "Professor: {$this->name} {$this->surname}, DNI: {$this->dni}, Phone: {$this->phone}, Address: {$this->address}";
    }
}

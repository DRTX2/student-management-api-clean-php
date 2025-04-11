<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use InvalidArgumentException;

class Student
{
    private ?int $id;
    private string $dni;
    private string $name;
    private string $surname;
    private string $phone;
    private string $address;
    public function __construct(string $dni, string $name, string $surname, string $phone = "", string $address = "", ?int $id=0)
    {
        $this->validate($dni, $name,$surname);
        $this->dni = $dni;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
        $this->address = $address;
        $this->id = $id;
    }
    public function validate($dni, $name,$surname){
        if(empty($dni) || empty($name) || empty($surname))
        throw new  InvalidArgumentException("Any student should have an dni, name and surname");
    }
    public function getId(){
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getDni(): string
    {
        return $this->dni;
    }
    public function setDni($dni): void
    {
        $this->dni = $dni;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getSurname(): string
    {
        return $this->surname;
    }
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    public function getFullName(): string
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

    public function getAddress(): string
    {
        return $this->address;
    }
    public function setAddress($address): void
    {
        $this->address = $address;
    }
}

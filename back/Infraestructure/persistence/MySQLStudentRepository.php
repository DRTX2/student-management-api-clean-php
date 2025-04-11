<?php

declare(strict_types=1);

namespace App\Infraestructure\Persistence;

use App\Domain\Entities\Student;
use App\Domain\Interfaces\StudentRepository;
use PDO;
use PDOException;

class MySQLStudentRepository implements StudentRepository
{
    private PDO $connection;
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function findByDni(string $dni): ?Student{
        $sql="SELECT * FROM students WHERE dni=:dni";
        $stmt=$this->connection->prepare($sql);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!$data) return null;

        return new Student(
            $data['dni'],
            $data['name'],
            $data['surname'],
            $data['phone'],
            $data['address'],
            $data['id']
        );
    }
    public function fetchAll(): array{
	    $sql="SELECT * FROM students";
	    $stmt=$this->connection->prepare($sql);
	    $stmt->execute();
	    $studentsRows=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $students=[];
        foreach($studentsRows as $student){
            $students[]=new Student(
        $student['dni'],
        $student['name'],
        $student['surname'],
        $student['phone'],
        $student['address'],
        $student['id']
        );
        }
        return $students;
    }

    public function create(Student $student): void{
        $sql="INSERT INTO students(dni, name, surname, phone, address) VALUES(:dni, :name, :surname, :phone, :address)";
        
        $stmt=$this->connection->prepare($sql);
        
        $stmt->bindParam(":dni",$student->getDni(),PDO::PARAM_STR);
        $stmt->bindParam(":name",$student->getName(),PDO::PARAM_STR);
        $stmt->bindParam(":surname",$student->getSurname(),PDO::PARAM_STR);
        $stmt->bindParam(":phone",$student->getPhone(),PDO::PARAM_STR);
        $stmt->bindParam(":address",$student->getAddress(),PDO::PARAM_STR);
        
        if(!$stmt->execute()){
            $errorInfo=$stmt->errorInfo();
            throw new PDOException("Student registration went wrong: ".$errorInfo[2]); // 0->sqlstatus code, 1->specific driver code, 2->legible error
        }
        
        $student->setId(self::$connection->lastInsertId());
    }

    public function update(string $dni, Student $student): void{
        $sql=  "UPDATE students 
                SET name=:name, 
                surname=:surname, 
                phone=:phone,
                address=:address
                WHERE dni=:dni";

        $stmt=$this->connection->prepare($sql);

        $stmt->bindParam(":name",$student->getName(), PDO::PARAM_STR); 
        $stmt->bindParam(":surname",$student->getSurname(), PDO::PARAM_STR);
        $stmt->bindParam(":phone",$student->getPhone(), PDO::PARAM_STR);
        $stmt->bindParam(":address",$student->getPhone(), PDO::PARAM_STR);
        $stmt->bindParam(":dni",$dni, PDO::PARAM_STR);
        
        $operationResult=$stmt->execute();
        
        if(!$operationResult)
            throw new PDOException("Student can not be inserted");
    }

    public function delete($dni): void
    {
        $sql = 'DELETE FROM students WHERE dni=:dni';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(':dni', $dni, PDO::PARAM_STR);
        if (!$stmt->execute())
            throw new PDOException("Student can not be deleted");
    }

}

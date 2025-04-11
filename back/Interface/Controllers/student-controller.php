<?php

declare(strict_types=1);

namespace App\Interface\Controllers;

use App\Domain\Entities\Student;
use App\Domain\Services\StudentService;
use App\Infraestructure\Persistence\MySQLStudentRepository;
use App\Infraestructure\Persistence\PdoConnection;
use Exception;

$studentService = new StudentService(new MySQLStudentRepository(PdoConnection::connect()));

try {
    $inputData = file_get_contents('php://input');
    $data = json_decode($inputData, true);
    header("Content-Type: application/json");
    $response = null;

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if (!empty($_GET["dni"])){
                $student = $studentService->getStudentByDni($_GET["dni"]);
                $response["students"] =$student?[$student]:[];
            }else {
                $response["students"] = $studentService->getAllStudents();
            }
            http_response_code(200);
            break;
        case 'POST':
            // then i need change the dni parameter
            $student = new Student(
                $data['dni'],
                $data['name'],
                $data['surname'],
                $data['phone'],
                $data['address']
            );
            $studentService->createStudent($student);
            $response["students"] =$student;
            $response["message"] ="Student created succesfully";
            http_response_code(201);
            break;
        case 'PUT':
            $student = new Student(
                $data['dni'],
                $data['name'],
                $data['surname'],
                $data['phone'],
                $data['address']
            );
            $studentService->updateStudent($_GET["dni"], $student);
            $response["students"] =$student;
            $response["message"] ="Student updated succesfully";
            http_response_code(200);
            break;
        case 'DELETE':
            $dni = $_GET["dni"];
            if (!$dni)
                throw new Exception("DNI is required to delete a student");
            $studentService->deleteStudent($dni);
            $response["message"] ="Student deleted succesfully";
            http_response_code(200);
            break;
        default:
            http_response_code(405);
            echo json_encode(['message' => 'Method not allowed']);
            return;
    }
    echo json_encode($response);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'message' => 'Something went wrong', 
        'err' => $e->getMessage()
    ]);
}

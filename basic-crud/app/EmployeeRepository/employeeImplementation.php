<?php

namespace App\EmployeeRepository;

use App\EmployeeRepository\employeeInterface;
use App\Models\Employee;

class employeeImplementation implements employeeInterface
{
    public function store($data)
    {
        $createTable = Employee::create($data);
        return $createTable;
    }

    public function getEmployees()
    {
        $employees = Employee::all();
        return $employees;
    }

    public function updateEmployee($id, $data)
    {
        $updatedEmployee = $id->update($data);
        return $updatedEmployee;
    }

    public function deleteEmployee($id)
    {
        $deletedEmployee = $id->delete();
        return $deletedEmployee;
    }
}

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
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function deleteEmployee($id)
    {
        $deletedEmployee = Employee::findOrFail($id);
        $deletedEmployee->delete();
        return $deletedEmployee;
    }
}

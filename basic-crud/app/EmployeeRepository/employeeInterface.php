<?php

namespace App\EmployeeRepository;

interface employeeInterface
{
    public function store($data);
    public function getEmployees();
    public function updateEmployee($id, $data);
    public function deleteEmployee($id);
}

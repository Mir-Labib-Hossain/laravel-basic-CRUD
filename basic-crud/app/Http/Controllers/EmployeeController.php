<?php

namespace App\Http\Controllers;

use App\EmployeeRepository\employeeInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $repositoryinterface;
    public function __construct(employeeInterface $repositoryinterface)
    {
        $this->repositoryinterface = $repositoryinterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            $data = $request->validate(
                [
                    'name' => 'required|string',
                    'address' => 'required|string',
                    'phone' => 'required|string'
                ]
            );
            $createTable = $this->repositoryinterface->store($data);
            return response()->json(['data' => $createTable]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'status' => 500]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function getEmployees()
    {
        try {
            $getEmployees = $this->repositoryinterface->getEmployees();
            return response()->json(['data' => $getEmployees]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'status' => 500]);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateEmployee(string $id, Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'address' => 'required|string',
                'phone' => 'required|string'
            ]);

            $updateEmployee = $this->repositoryinterface->updateEmployee($id, $data);
            return response()->json(['data' => $updateEmployee]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Employee not found', 'status' => 404]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'status' => 500]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteEmployee(string $id)
    {
        try {
            $deleteEmployee = $this->repositoryinterface->deleteEmployee($id);
            return response()->json(['data' => $deleteEmployee]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Employee not found', 'status' => 404]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'status' => 500]);
        }
    }
}

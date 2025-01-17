<?php

namespace Modules\Employee\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Employee\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index()
    {
        $employees = Employee::all();

        return response()->json([
            'message' => 'Employees retrieved successfully.',
            'data' => $employees
        ], 200); // 200 OK status code
    }

    /**
     * Store a newly created employee in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|unique:employees',
            'email' => 'nullable|email|unique:employees',
            'password' => ['required', Password::defaults()],
            'employee_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'designation_id' => 'required|integer',
            'cnic' => 'required|string|max:15',
            'postal_addr' => 'required|string|max:500',
            'contact_numb' => 'required|string|max:15',
            'department_id' => 'required|integer',
            'user_category_id' => 'required|integer',
            'region_id' => 'required|integer',
            'city_id' => 'required|integer',
            'emp_status' => 'required|string|max:50',
            'group_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'week_of_days' => 'required|array',
            'week_of_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['week_of_days'] = json_encode($validatedData['week_of_days']);

        $employee = Employee::create($validatedData);

        $user = User::create([
            'name' => $validatedData['user_name'],
            'email' => $validatedData['email'],
            'role_id' => $validatedData['designation_id'],
            'password' => $validatedData['password'],
            'employee_id' => $employee->id,
        ]);

        return response()->json([
            'message' => 'Employee created successfully.',
            'data' => $employee
        ], 201); // 201 Created status code
    }

    /**
     * Display the specified employee.
     */
    public function show(Employee $employee)
    {
        return response()->json([
            'message' => 'Employee retrieved successfully.',
            'data' => $employee
        ], 200);
    }

    /**
     * Update the specified employee in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'user_name' => 'required|string|max:255|unique:employees,user_name,' . $employee->id,
            'email' => 'nullable|email|unique:employees',
            'password' => ['required', Password::defaults()],
            'employee_name' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'designation_id' => 'required|integer',
            'cnic' => 'required|string|max:15',
            'postal_addr' => 'required|string|max:500',
            'contact_numb' => 'required|string|max:15',
            'department_id' => 'required|integer',
            'user_category_id' => 'required|integer',
            'region_id' => 'required|integer',
            'city_id' => 'required|integer',
            'emp_status' => 'required|string|max:50',
            'group_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'week_of_days' => 'required|array',
            'week_of_days.*' => 'string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
        ]);

        $validatedData['week_of_days'] = json_encode($validatedData['week_of_days']);

        $employee->update($validatedData);

        return response()->json([
            'message' => 'Employee updated successfully.',
            'data' => $employee
        ], 200);
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return response()->json([
            'message' => 'Employee deleted successfully.'
        ], 200);
    }
}

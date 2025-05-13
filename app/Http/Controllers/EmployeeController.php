<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string',
            'hire_date' => 'required|date',
            'salary' => 'required|numeric',
        ]);

        Employee::create([
            'employee_id' => 'E' . strtoupper(Str::random(6)),
            'name' => $request->name,
            'position' => $request->position,
            'hire_date' => $request->hire_date,
            'salary' => $request->salary,
            'status' => 'Active',
        ]);

        return redirect()->back()->with('success', 'Employee added successfully.');
    }

    public function archive(Employee $employee)
    {
        $employee->update(['status' => 'Inactive']);
        return redirect()->back()->with('success', 'Employee archived.');
    }

    public function restore(Employee $employee)
    {
        $employee->update(['status' => 'Active']);
        return redirect()->back()->with('success', 'Employee restored.');
    }
}

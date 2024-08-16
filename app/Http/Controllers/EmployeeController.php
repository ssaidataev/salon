<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'skills' => 'nullable|string',
            'phone' => 'nullable|string',
             ]);

        $employee = new Employee;
        $employee->name = $request->name;
        $employee->contact_info = $request->contact_info;
        $employee->skills = $request->skills;
        $employee->phone = $request->phone;

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $employee->photo = $path;
        }

        $employee->save();

        return redirect()->route('employees.index')->with('success', 'Сотрудник успешно создан.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'nullable|string',
            'photo' => 'nullable|string',
            'skills' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        $employee->update($request->all());

        if ($request->hasFile('photo')) {
            $employee->update(['photo' => $request->file('photo')->store('photos', 'public')]);
        }

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}

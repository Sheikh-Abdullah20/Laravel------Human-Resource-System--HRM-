<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::all();
        
        return view("employees.index",compact("employees"));
    }

    public function create()
    {
        $departments = Department::all();
        return view("employees.create",compact("departments"));
    }

    
    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'employee_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'employee_dob' => 'required|date',
            'date_of_hiring' => 'required|date',
            'department_id' => 'required|numeric',
            'employee_position' => 'required|min:3',

        ]);

        $create = Employee::create($validated_req);
        if($create){
            Toastr()->success("Employee Created Successfully");
            return redirect()->route('employee.index');
        }else{
            Toastr()->error("Failed to Create Employee");
            return redirect()->back();
        }
    }

    

   
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        return view("employees.edit",compact('employee',"departments"));
    }

   
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'employee_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'employee_dob' => 'required|date',
            'date_of_hiring' => 'required|date',
            'department_id' => 'required|numeric',
            'employee_position' => 'required|min:3',

        ]);

        $employee = Employee::find($id);
        if(!empty($employee)){
            $update = $employee->update($validated_req);
            if($update){
                Toastr()->success("Employee Updated Successfully");
                return redirect()->route('employee.index');
            }else{
                Toastr()->error("Failed to Update Employee");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Employee Not Found");
            return redirect()->back();
        }

        
    }

    
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        if(!empty($employee)){
            $delete = $employee->delete();
            if($delete){
                Toastr()->success("Employee Deleted Successfully");
                return redirect()->route('employee.index');
            } else{
                Toastr()->error("Failed to Delete Employee");
                return redirect()->back();
            }
        } else{
            Toastr()->error("Employee Not Found");
            return redirect()->back();
        }
    }
}

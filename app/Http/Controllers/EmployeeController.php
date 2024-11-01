<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Schedule;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::all();
        
        return view("Employees.employee_list.index",compact("employees"));
    }

    public function create()
    {
        $departments = Department::all();
        $schedules = Schedule::all();
        $positions = Position::all();
        return view("Employees.employee_list.create",compact("departments","schedules","positions"));
    }

    
    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'employee_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'employee_dob' => 'required|date',
            'date_of_hiring' => 'required|date',
            'department_id' => 'required|numeric',
            'employee_position' => 'required|numeric',
            'employee_schedule' => 'required|numeric',
        ]);

        $employeeId = rand(000000000,99999999);
        $validated_req['employee_id'] = $employeeId;
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
        $schedules = Schedule::all();
        $positions = Position::all();
        return view("Employees.employee_list.edit",compact('employee',"departments","schedules","positions"));
    }

   
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'employee_name' => 'required|min:3',
            'father_name' => 'required|min:3',
            'employee_dob' => 'required|date',
            'date_of_hiring' => 'required|date',
            'department_id' => 'required|numeric',
            'employee_position' => 'required|numeric',
            'employee_schedule' => 'required|numeric',

        ]);

        $employeeId = rand(000000000,99999999);
        $validated_req['employee_id'] = $employeeId;

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


    public function deletebyselection(Request $request){

        $ids = $request->input("employee_ids");

        $delete = Employee::whereIn('id',$ids)->delete();

        if($delete){
            return response()->json([
                'status' => true,
                'message' => 'Employees deleted successfully'
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => 'Failed to delete employees'
            ]);
        }
        \Log::info($ids);

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

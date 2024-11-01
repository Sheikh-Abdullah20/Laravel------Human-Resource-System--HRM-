<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use Illuminate\Http\Request;

class EmployeeScheduleController extends Controller
{

    public function index()
    {
        $employees = Employee::all();
        return view("Employees.employee_schedule.index",compact("employees"));
    }  

    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $schedules = Schedule::all();
        return view("Employees.employee_schedule.edit",compact("employee","schedules"));
    }


    public function update(Request $request, string $id)
    {

        $validated_req = $request->validate([
            'employee_schedule' => 'required|numeric',
        ]);

        $employee = Employee::find($id);

        if(!empty($employee)){
           $update =  $employee->update($validated_req);

           if($update){
            Toastr()->success("Employee Schedule has been updated");
            return redirect()->route('employeeschedule.index');
           }else{
            Toastr()->error("Failed to update Employee Schedule");
            return redirect()->back();
           }
        }else{
            Toastr()->error("Employee not found");
            return redirect()->back();
        }

    }
}

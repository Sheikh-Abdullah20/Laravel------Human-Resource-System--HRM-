<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OverTime;
use Illuminate\Http\Request;

class OverTimeController extends Controller
{
    
    public function index()
    {
        $overtimes = OverTime::all();
        return view("Employees.overtime.index",compact("overtimes"));
    }

    public function create()
    {
        $employees = Employee::all();
        return view("Employees.overtime.create",compact("employees"));
    }

    
    public function store(Request $request)
    {
     $validated_req  = $request->validate([
        'employee_id'=> 'required|numeric',
        'hourly_rate' => 'required|numeric',
        'total_overtime_hours' => 'required|numeric',
     ]);

     $total_overtime_pay = $validated_req['hourly_rate'] * $validated_req['total_overtime_hours'];
     $validated_req['total_overtime_pay'] = $total_overtime_pay; 

     $create = OverTime::create($validated_req);
     if($create){
        Toastr()->success("Overtime created successfully");
        return redirect()->route("overtime.index");
     }else{
        Toastr()->error("Failed to create Overtime");
        return redirect()->back();
     }
    }

    
   

   
    public function edit(string $id)
    {
        $overtime = OverTime::find($id);
        $employees = Employee::all();
        return view("Employees.overtime.edit",compact("overtime","employees"));
    }

    
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'employee_id'=> 'required|numeric',
            'hourly_rate' => 'required|numeric',
            'total_overtime_hours' => 'required|numeric',
        ]);

        $total_overtime_pay = $validated_req['hourly_rate'] * $validated_req['total_overtime_hours'];
        $validated_req['total_overtime_pay'] = $total_overtime_pay;

        $overtime = OverTime::find($id);
        if(!empty($overtime)){
            $update = $overtime->update($validated_req);
            if($update){
                Toastr()->success("Overtime updated successfully");
                return redirect()->route("overtime.index");
            }else{
                Toastr()->error("Failed to update Overtime");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Overtime Not Found");
            return redirect()->route("overtime.index");
        }  
    }


    public function deletebyselection(Request $request){
        $ids = $request->input("overtime_ids");
        $delete = Overtime::whereIn('id',$ids)->delete();
        if($delete){
            return response()->json([
                'status' => true,
                'message' => "overtime deleted successfully"
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => "Failed to delete overtime"
            ]);
        }
    }

   
    public function destroy(string $id)
    {
        $overtime = OverTime::find($id);
        if(!empty($overtime)){
            $overtime->delete();
            Toastr()->success("Overtime has Been Deleted Successfully");
            return redirect()->route("overtime.index");
        }else{
            Toastr()->error("Overtime Not Found");
            return redirect()->route("overtime.index");
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
   
    public function index()
    {
        $departments = Department::all();
        return view('deparments.index',compact("departments"));
    }

   
    public function create()
    {
        return view('deparments.create');
    }

 
    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'department_name' => 'required|min:3'
        ]);

        $create = Department::create($validated_req);
        if($create){
            Toastr()->success("Deparment created successfully");
            return redirect()->route('department.index');
        }else{
            Toastr()->error("Failed to create deparment");
            return redirect()->back();
        }
    }


   
    public function edit(string $id)
    {
        $department = Department::find($id);
        return view('deparments.edit',compact('department'));
    }

  
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'department_name' => 'required|min:3'
        ]); 

        $department = Department::find($id);
        if($department){
            $department->update($validated_req);
            Toastr()->success("Deparment updated successfully");
            return redirect()->route('department.index');
        }else{
            Toastr()->error("Failed to update deparment");
            return redirect()->back();
        }
    }

    public function deletebyselection(Request $request){

        $ids = $request->input('department_ids');
        $delete = Department::whereIn('id',$ids)->delete();
        if($delete){
            return response()->json([
                'status' => true,
                'message' => "Selected Department has been deleted"
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Failed to delete selected department"
            ]);
        }
    }

    
    public function destroy(string $id)
    {
        $deparment = Department::find($id);
        if($deparment){
            $deparment->delete();
            Toastr()->success("Deparment deleted successfully");
            return redirect()->route('department.index');
        }
    }
}

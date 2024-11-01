<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    
    public function index()
    {
        $schedules = Schedule::all();
        return view("schedules.index",compact("schedules"));
    }

   
    public function create()
    {
        return view("schedules.create");
    }

    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'name' => 'required|min:3',
            'checkin' => 'required|date_format:H:i',
            'checkout' => 'required|date_format:H:i'
        ]);

        $create = Schedule::create($validated_req);
        if($create){
            Toastr()->success("Schedule created successfully");
            return redirect()->route('schedule.index');
        }else{
            Toastr()->error("Failed to create schedule");
            return redirect()->back();
        }
    }


 
    public function edit(string $id)
    {
        $schedule = Schedule::find($id);
        return view("schedules.edit",compact("schedule"));
    }


    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'name' => 'required|min:3',
            'checkin' => 'required|date_format:H:i',
            'checkout' => 'required|date_format:H:i'
        ]);

        $schedule = Schedule::find($id);
        if(!empty($schedule)){
            $update = $schedule->update($validated_req);
            if($update){
                Toastr()->success("Schedule updated successfully");
                return redirect()->route('schedule.index');
            }else{
                Toastr()->error("Failed to update schedule");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Schedule not found");
            return redirect()->back();
        }
    }


    public function deletebyselection(Request $request){
        $ids = $request->input("overtime_ids");
        $delete = Schedule::whereIn('id',$ids)->delete();
        if($delete){
            return response()->json([
                'status' => true,
                'message' => "Schedule deleted successfully"
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => "Failed to delete Schedule"
            ]);
        }
    }
 
    public function destroy(string $id)
    {
        $schedule = Schedule::find($id);
        if(!empty($schedule)){
            $delete = $schedule->delete();
            if($delete){
                Toastr()->success("Schedule deleted successfully");
                return redirect()->route('schedule.index');
            }else{
                Toastr()->error("Failed to delete schedule");
                return redirect()->back();
            }

        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::all();
        return view("positions.index",compact("positions")); 
    }

 
    public function create()
    {
        return view("positions.create");
    }


    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'position_name' => 'required|min:3',
            'rate_per_hour' => 'required|numeric'
        ]);

        $create = Position::create($validated_req);
        if($create){
            Toastr()->success("Position created successfully");
            return redirect()->route('position.index');
        }else{
            Toastr()->error("Failed to create position");
            return redirect()->back();
        }

    }


    
    public function edit(string $id)
    {
        $position = Position::find($id);
        return view("positions.edit", compact("position"));
    }

   
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'position_name' => 'required|min:3',
            'rate_per_hour' => 'required|numeric'
        ]);

        $position = Position::find($id);
        if(!empty($position)){
            $update = $position->update($validated_req);

            if($update){
                Toastr()->success("Position updated successfully");
                return redirect()->route('position.index');
            }else{
                Toastr()->error("Failed to update position");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Position not found");
            return redirect()->back();
        }
    }

    public function deletebyselection(Request $request){
        $ids = $request->input("position_ids");

        $delete = Position::whereIn('id',$ids)->delete();


        if($delete){
            return response()->json([
                'status' => true,
                'message' => "Position deleted successfully"
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => "Failed to delete position"
            ]);
        }
    }

  
    public function destroy(string $id)
    {
        $position = Position::find($id);
        if(!empty($position)){
            $delete = $position->delete();
            if($delete){
                Toastr()->success("Position deleted successfully");
                return redirect()->route('position.index');
            } else{
                Toastr()->error("Failed to delete position");
                return redirect()->back();
            }
        } else{
            Toastr()->error("Position not found");
            return redirect()->back();
        }
    }
}

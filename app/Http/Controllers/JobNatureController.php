<?php

namespace App\Http\Controllers;

use App\Models\JobNature;
use Illuminate\Http\Request;

class JobNatureController extends Controller
{

    public function index()
    {
        $job_natures = JobNature::all();
        return view("job_nature.index", compact("job_natures"));
    }

    public function create()
    {
        return view("job_nature.create");
    }

    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'job_nature_title' => 'required',
        ]);

        $create = JobNature::create($validated_req);
        if ($create) {
            Toastr()->success("Job Nature has been created");
            return redirect()->route('jobNature.index');
        } else {
            Toastr()->error("Failed to create Job Nature");
            return redirect()->back();
        }
    }


    public function edit(string $id)
    {
        $job_nature = JobNature::find($id);
        return view("job_nature.edit", compact("job_nature"));
    }

    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'job_nature_title' => 'required',
        ]);

        $job_nature = JobNature::find($id);
        if(!empty($job_nature)){
            $update = $job_nature->update($validated_req);
            if ($update) {
                Toastr()->success("Job Nature has been updated");
                return redirect()->route('jobNature.index');
            } else {
                Toastr()->error("Failed to update Job Nature");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Job Nature not found");
            return redirect()->back();
        }
    }


    public function deletebyselection(Request $request){
        $ids = $request->input("job_nature_ids");
        $job_nature = JobNature::whereIn('id',$ids)->delete();
        if($job_nature){
            return response()->json([
                'status' => true,
                'message' => 'Jobnature has been deleted'
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => 'Failed to delete Jobnature'
            ]);
        }
    }

    public function destroy(string $id)
    {
        $job_nature = JobNature::find($id);
        if(!empty($job_nature)){
            $delete = $job_nature->delete();
            if ($delete) {
                Toastr()->success("Job Nature has been deleted");
                return redirect()->route('jobNature.index');
            } else {
                Toastr()->error("Failed to delete Job Nature");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Job Nature not found");
            return redirect()->back();
        }
    }
}

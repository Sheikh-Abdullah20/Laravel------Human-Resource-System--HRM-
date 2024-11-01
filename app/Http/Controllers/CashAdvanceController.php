<?php

namespace App\Http\Controllers;

use App\Models\CashAdvance;
use App\Models\Employee;
use Illuminate\Http\Request;

class CashAdvanceController extends Controller
{
   
    public function index()
    {
        $cashAdvances = CashAdvance::all();
        return view("Employees.cash_advance.index",compact("cashAdvances"));
    }

  
    public function create()
    {
        $employees = Employee::all();
        return view("Employees.cash_advance.create",compact("employees"));
    }

 
    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'employee_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment_status' => 'required',
        ]);

        $cashAdvance = CashAdvance::create($validated_req);

        if($cashAdvance){
            Toastr()->success("Cash Advance created successfully");
            return redirect()->route('cashAdvance.index');
        } else{
            Toastr()->error("Failed to create Cash Advance");
            return redirect()->back();
        }
    }

 

    public function edit(string $id)
    {
        $cashAdvance = CashAdvance::find($id);
        $employees = Employee::all();
        return view("Employees.cash_advance.edit",compact("cashAdvance","employees"));
    }

    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'employee_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment_status' => 'required',
        ]);

        $cashAdvance = CashAdvance::find($id);
        if(!empty($cashAdvance)){
            $update = $cashAdvance->update($validated_req);

            if($update){
                Toastr()->success("Cash Advance updated successfully");
                return redirect()->route('cashAdvance.index');
            }else{
                Toastr()->error("Failed to update Cash Advance");
                return redirect()->back();
            }
        }
    }

    public function deletebyselection(Request $request){
        $ids = $request->input("cashAdvance_ids");
        $cashAdvances = CashAdvance::whereIn('id',$ids)->delete();

        if($cashAdvances){
            return response()->json([
                'status' => true,
                'message' => 'Cash Advance(s) deleted successfully'
            ]);
        }else{
            return response()->json([
               'status' => false,
               'message' => 'Failed to delete Cash Advance(s)'
            ]);
        }
    }

    public function destroy(string $id)
    {
        $cashAdvance = CashAdvance::find($id);
        if(!empty($cashAdvance)){
            $delete = $cashAdvance->delete();

            if($delete){
                Toastr()->success("Cash Advance deleted successfully");
                return redirect()->route('cashAdvance.index');
            }else{
                Toastr()->error("Failed to delete Cash Advance");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Cash Advance not found");
            return redirect()->back();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    
    public function index()
    {
        $loans = Loan::all();
        return view('Employees.loan.index', compact('loans'));
    }

   
    public function create()
    {
        $employees = Employee::all();
        return view("Employees.loan.create",compact("employees"));
    }

    
    public function store(Request $request)
    {
        $validated_req = $request->validate([
            'employee_id' => 'required|numeric',
            'opening_balance' => 'required|numeric',
            'payment_amount' => 'nullable|numeric',
            'deduction_amount' => 'nullable|numeric',
            'loan_status' => 'required'
        ]);   

        $closing_balance = $validated_req['opening_balance'] - $validated_req['payment_amount'] - $validated_req['deduction_amount'];

        $validated_req['closing_balance'] = $closing_balance;
        $validated_req["payment_amount"] = $validated_req['payment_amount'] ?? 0;
        $validated_req["deduction_amount"] = $validated_req['deduction_amount'] ?? 0;

        $create = Loan::create($validated_req);
        if($create){
            Toastr()->success("Loan created successfully");
            return redirect()->route('loan.index');
        }else{
            Toastr()->error("Failed to create loan");
            return redirect()->back();
        }

    }


    public function edit(string $id)
    {
        $loan = Loan::find($id);
        $employees = Employee::all();
        return view("Employees.loan.edit", compact('loan','employees'));
    }

   
    public function update(Request $request, string $id)
    {
        $validated_req = $request->validate([
            'employee_id' => 'required|numeric',
            'opening_balance' => 'required|numeric',
            'payment_amount' => 'nullable|numeric',
            'deduction_amount' => 'nullable|numeric',
            'loan_status' => 'nullable'
        ]);   

        $closing_balance = $validated_req['opening_balance'] - $validated_req['payment_amount'] - $validated_req['deduction_amount'];
        
        $validated_req['closing_balance'] = $closing_balance < 0 ? 0 : $closing_balance;
        $validated_req["payment_amount"] = $validated_req['payment_amount'] ?? 0;
        $validated_req["deduction_amount"] = $validated_req['deduction_amount'] ?? 0;

        
        $loan = Loan::find($id);
        if($loan->loan_status !== "Pending"){
           $status =  $validated_req['payment_amount'] >= $validated_req['opening_balance'] ? "Received_From_Employee" : $validated_req['loan_status'];
           $validated_req['loan_status'] = $status;
        }
        if(!empty($loan)){
            $update = $loan->update($validated_req);
            if($update){
                Toastr()->success("Loan updated successfully");
                return redirect()->route('loan.index');
            }else{
                Toastr()->error("Failed to update loan");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Loan not found");
            return redirect()->back();
        }
    }


    public function deletebyselection(Request $request){
        $ids = $request->input('loan_ids');
            $loan = Loan::whereIn('id',$ids)->delete();
            if($loan){
               return response()->json([
                    'status' => true,
                    'message' => 'Loan(s) deleted successfully'
               ]); 
            }else{
                return response()->json([
                   'status' => false,
                   'message' => 'Failed to delete loan(s)'
               ]);
            }
        
    }
   
    public function destroy(string $id)
    {
        $loan = Loan::find($id);
        if(!empty($loan)){
            $delete = $loan->delete();
        
            if($delete){
                Toastr()->success("Loan deleted successfully");
                return redirect()->route('loan.index');
            }else{
                Toastr()->error("Failed to delete loan");
                return redirect()->back();
            }
        }else{
            Toastr()->error("Loan not found");
            return redirect()->back();
        }
    }
}

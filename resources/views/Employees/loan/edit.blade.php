@extends('layouts.app')

@section("title","Loan")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Edit Loan</h2>
                    <a href="{{ route('loan.index') }}" class="btn btn-outline-primary">Back To Loan</a>
                   </div>
                  
                   <form action="{{ route('loan.update',$loan) }}" method="POST" class="w-50">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="employee_name" class="col-form-label">Employee</label>
                        <select class="custom-select" type="text" name="employee_id" id="employee_id">
                            <option value="" hidden>Select Employee </option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $employee->id == $loan->employee_id ? "selected" : ''  }}>{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="opening_balance" class="col-form-label">Opening Balance *</label>
                        <input class="form-control" type="text" name="opening_balance" id="opening_balance" value="{{ $loan->opening_balance }}">
                        @error('opening_balance')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_amount" class="col-form-label">Payment Amount </label>
                        <input class="form-control" type="text" name="payment_amount" id="payment_amount" value="{{ $loan->payment_amount }}">
                        @error('payment_amount')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deduction_amount" class="col-form-label">Deduction_amount</label>
                        <input class="form-control" type="text" name="deduction_amount" id="deduction_amount" value="{{ $loan->deduction_amount }}">
                        @error('deduction_amount')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="loan_status" class="col-form-label">Loan Status</label>
                        <select class="custom-select" type="text" name="loan_status" id="loan_status">
                            <option value="" hidden>Select Loan Status </option>

                            <option value="Pending" {{ $loan->loan_status == "Pending" ? "selected" : '' }} >pending</option>

                            <option value="Issued_To_Employee" {{ $loan->loan_status == "Issued_To_Employee" ? "selected" : '' }} >Issued To Employee</option>

                            <option value="Received_From_Employee" {{ $loan->loan_status == "Received_From_Employee" ? "selected" : '' }} >Received From Employee</option>
                        </select>
                        @error('loan_status')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary" type="submit">Update Loan</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
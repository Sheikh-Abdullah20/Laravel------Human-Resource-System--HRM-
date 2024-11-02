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
                    <h2 class="display-5">Create Loan</h2>
                    <a href="{{ route('loan.index') }}" class="btn btn-outline-primary">Back To Loan</a>
                   </div>
                  
                   <form action="{{ route('loan.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="employee_name" class="col-form-label">Employee</label>
                        <select class="custom-select" type="text" name="employee_id" id="employee_id">
                            <option value="" hidden>Select Employee </option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="opening_balance" class="col-form-label">Opening Balance *</label>
                        <input class="form-control" type="text" name="opening_balance" id="opening_balance" value="{{ old('opening_balance') }}">
                        @error('opening_balance')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="payment_amount" class="col-form-label">Payment Amount </label>
                        <input class="form-control" type="text" name="payment_amount" id="payment_amount" value="{{ old('payment_amount') }}">
                        @error('payment_amount')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deduction_amount" class="col-form-label">Deduction_amount</label>
                        <input class="form-control" type="text" name="deduction_amount" id="deduction_amount" value="{{ old('deduction_amount') }}">
                        @error('deduction_amount')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    

                    <div class="form-group">
                        <label for="loan_status" class="col-form-label">Loan Status</label>
                        <select class="custom-select" type="text" name="loan_status" id="loan_status">
                            <option value="" hidden>Select Loan Status </option>
                            <option value="Pending">pending</option>
                            <option value="Issued_To_Employee">Issued To Employee</option>
                            <option value="Received_From_Employee">Received From Employee</option>
                        </select>
                        @error('loan_status')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary" type="submit">Create Loan</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
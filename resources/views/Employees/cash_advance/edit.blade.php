@extends('layouts.app')

@section("title","Cash Advance")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Edit Cash Advance</h2>
                    <a href="{{ route('cashAdvance.index') }}" class="btn btn-outline-primary">Back To Cash Advance</a>
                   </div>
                  
                   <form action="{{ route('cashAdvance.update',$cashAdvance) }}" method="POST" class="w-50">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="employee_name" class="col-form-label">Employee</label>
                        <select class="custom-select" type="text" name="employee_id" id="employee_id">
                            <option value="" hidden>Select Employee </option>
                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}" {{ $cashAdvance->employee_id == $employee->id ? "selected" : '' }} >{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="amount" class="col-form-label">Amount</label>
                        <input class="form-control" type="text" name="amount" id="amount" value="{{ $cashAdvance->amount }}">
                        @error('amount')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="employee_name" class="col-form-label">Employee</label>
                        <select class="custom-select" type="text" name="payment_status" id="payment_status">
                            <option value="" hidden>Select Payment Status </option>
                            <option value="Pending" {{ $cashAdvance->payment_status == "Pending" ? "selected" : '' }} >pending</option>
                            <option value="Issued_To_Employee" {{ $cashAdvance->payment_status == "Issued_To_Employee" ? "selected" : '' }} >Issued To Employee</option>
                            <option value="Received_From_Employee" {{ $cashAdvance->payment_status == "Received_From_Employee" ? "selected" : '' }} >Received From Employee</option>
                        </select>
                        @error('payment_status')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary" type="submit">Update Cash Advance</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
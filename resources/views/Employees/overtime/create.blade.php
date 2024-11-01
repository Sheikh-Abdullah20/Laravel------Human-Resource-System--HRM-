@extends('layouts.app')

@section("title","OverTime")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Create OverTime</h2>
                    <a href="{{ route('overtime.index') }}" class="btn btn-outline-primary">Back To OverTimes</a>
                   </div>
                  
                   <form action="{{ route('overtime.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="employee_id" class="col-form-label">Employee Name</label>
                        <select class="custom-select" type="text" name="employee_id" id="employee_id" style="cursor: pointer;">
                            <option value="" hidden>Select Employee</option>

                            @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->employee_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_id')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="hourly_rate" class="col-form-label">Hourly Rate</label>
                        <input class="form-control" type="text" name="hourly_rate" id="hourly_rate" value="{{ old('hourly_rate') }}">
                        @error('hourly_rate')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="total_overtime_hours" class="col-form-label">Total Overtime Hours</label>
                        <input class="form-control" type="text" name="total_overtime_hours" id="total_overtime_hours" value="{{ old('total_overtime_hours') }}">
                        @error('total_overtime_hours')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>



                    <button class="btn btn-outline-primary" type="submit">Create OverTime</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
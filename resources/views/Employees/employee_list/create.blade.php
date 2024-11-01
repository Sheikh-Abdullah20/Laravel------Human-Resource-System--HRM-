@extends('layouts.app')

@section("title","Employee")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Create Employee</h2>
                    <a href="{{ route('employee.index') }}" class="btn btn-outline-primary">Back To Employees</a>
                   </div>
                  
                   <form action="{{ route('employee.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="employee_name" class="col-form-label">Employee Name</label>
                        <input class="form-control" type="text" name="employee_name" id="employee_name" value="{{ old('employee_name') }}">
                        @error('employee_name')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="father_name" class="col-form-label">Father Name</label>
                        <input class="form-control" type="text" name="father_name" id="father_name" value="{{ old('father_name') }}">
                        @error('father_name')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="employee_dob" class="col-form-label">Employee Date of Birth</label>
                        <input class="form-control" type="text" name="employee_dob" id="employee_dob" value="{{ old('employee_dob') }}">
                        @error('employee_dob')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hiring_date" class="col-form-label">Date Of Hiring</label>
                        <input class="form-control" type="text" name="date_of_hiring" id="hiring_date" value="{{ old('hiring_date') }}">
                        @error('date_of_hiring')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="department_id" class="col-form-label">Department</label>
                        <select class="custom-select" type="text" name="department_id" id="department_id" style="cursor: pointer;">
                            <option value="" hidden>Select Department </option>
                            @foreach($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                            @endforeach
                        </select>
                        @error('department_id')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="employee_position" class="col-form-label">Position</label>
                        <select class="custom-select" type="text" name="employee_position" id="employee_position">
                            <option value="" hidden>Select Position</option>

                            @foreach ($positions as $position )
                                <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                            @endforeach
                        </select>
                        @error('employee_position')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="employee_schedule" class="col-form-label">Schedule</label>
                        <select class="custom-select" type="text" name="employee_schedule" id="employee_schedule" style="cursor: pointer;">
                            <option value="" hidden>Select Schedule </option>
                            @foreach($schedules as $schedule)
                                <option value="{{ $schedule->id }}">{{ $schedule->name . " "}}   {{ $schedule->checkin . " - ". $schedule->checkout }}</option>
                            @endforeach
                        </select>
                        @error('employee_schedule')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    


                    <button class="btn btn-outline-primary" type="submit">Create Employee</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
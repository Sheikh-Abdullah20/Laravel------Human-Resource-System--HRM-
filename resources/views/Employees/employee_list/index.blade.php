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
                    <h2 class="display-5">Employees</h2>
                    <a href="{{ route('employee.create') }}" class="btn btn-outline-primary">Create Employee</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="Employee_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all">   
                                        </th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Father Name</th>
                                        <th>Employee DOB</th>
                                        <th>Date Of Hiring</th>
                                        <th>Department</th>
                                        <th>Employee Position</th>
                                        <th>Employee Schedule</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $employee->id }}">  
                                        </td>
                                        <td>{{ $employee->employee_id }}</td>
                                        <td>{{ $employee->employee_name }}</td>
                                        <td>{{ $employee->father_name }}</td>
                                        <td>{{ $employee->employee_dob }}</td>
                                        <td>{{ $employee->date_of_hiring }}</td>
                                        <td>{{ $employee->department->department_name }}</td>
                                        <td>{{ $employee->position->position_name ?? "No Position Assigned"}}</td>
                                        <td>{{ $employee->schedule->formatted_times['checkin'] . " - ". $employee->schedule->formatted_times['checkout'] ?? "No Schedule Assigned"}}</td>
                                        <td>{{ $employee->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('employee.edit',$employee) }}">Edit</a>
                                                <form action="{{ route('employee.destroy',$employee) }}" method="POST" onclick="return confirm('are You sure you want to delete this employee?')">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="dropdown-item" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
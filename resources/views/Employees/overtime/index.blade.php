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
                    <h2 class="display-5">OverTimes</h2>
                    <a href="{{ route('overtime.create') }}" class="btn btn-outline-primary">Create OverTime</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="overtime_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all"> 
                                        </th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>hourly_rate</th>
                                        <th>total_overtime_hour</th>
                                        <th>total_overtime_pay</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($overtimes as $overtime)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $overtime->id }}">  
                                        </td>
                                        <td>{{ $overtime->overtime_employee->employee_id }}</td>
                                        <td>{{ $overtime->overtime_employee->employee_name }}</td>
                                        <td>{{ $overtime->hourly_rate}}</td>
                                        <td>{{ $overtime->total_overtime_hours}}</td>
                                        <td>{{ $overtime->total_overtime_pay}}</td>
                                        <td>{{ $overtime->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('overtime.edit',$overtime) }}">Edit</a>
                                                <form action="{{ route('overtime.destroy',$overtime) }}" method="POST" onclick="return confirm('are You sure you want to delete this overtime?')">
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
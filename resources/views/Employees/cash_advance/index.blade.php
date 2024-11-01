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
                    <h2 class="display-5">Cash Advances</h2>
                    <a href="{{ route('cashAdvance.create') }}" class="btn btn-outline-primary">Create Cash Advance</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="cash_advance_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all">   
                                        </th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>         
                                        <th>Amount</th>
                                        <th>Payment Status</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cashAdvances as $cash)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $cash->id }}">  
                                        </td>
                                        <td>{{ $cash->employee->employee_id ?? "No ID Found" }}</td>
                                        <td>{{ $cash->employee->employee_name }}</td>
                                        <td>{{ $cash->amount }}</td>
                                        <td>
                                            @if($cash->payment_status === "Pending")
                                             <span class="badge badge-danger p-2">Pending</span>
                                             
                                             @elseif($cash->payment_status === "Issued_To_Employee")
                                             <span class="badge badge-warning p-2">Issued To Employee</span>

                                             @elseif($cash->payment_status === "Received_From_Employee")
                                             <span class="badge badge-success p-2">Received From Employee</span>
                                             
                                            @endif
                                        </td>
                                        <td>{{ $cash->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('cashAdvance.edit',$cash) }}">Edit</a>
                                                <form action="{{ route('cashAdvance.destroy',$cash) }}" method="POST" onclick="return confirm('are You sure you want to delete this Cash Advance?')">
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
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
                    <h2 class="display-5">Loans</h2>
                    <a href="{{ route('loan.create') }}" class="btn btn-outline-primary">Create Loan</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="loan_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all">   
                                        </th>
                                        <th>Employee ID</th>
                                        <th>Employee Name</th>
                                        <th>Opening  Balance</th>         
                                        <th>Payment Amount</th>
                                        <th>Deduction Amount</th>
                                        <th>Closing Balance</th>
                                        <th>Loan Status</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loans as $loan)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $loan->id }}">  
                                        </td>
                                        <td>{{ $loan->employee->employee_id ?? "No ID Found" }}</td>
                                        <td>{{ $loan->employee->employee_name }}</td>
                                        <td>{{ $loan->opening_balance }}</td>
                                        <td>{{ $loan->payment_amount }}</td>
                                        <td>{{ $loan->deduction_amount }}</td>
                                        <td>{{ $loan->closing_balance }}</td>
                                        <td>
                                            @if($loan->loan_status === "Pending")
                                             <span class="badge badge-danger p-2">Pending</span>
                                             
                                             @elseif($loan->loan_status === "Issued_To_Employee")
                                             <span class="badge badge-warning p-2">Issued To Employee</span>

                                             @elseif($loan->loan_status === "Received_From_Employee")
                                             <span class="badge badge-success p-2">Received From Employee</span>
                                             
                                            @endif
                                        </td>
                                        <td>{{ $loan->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('loan.edit',$loan) }}">Edit</a>
                                                <form action="{{ route('loan.destroy',$loan) }}" method="POST" onclick="return confirm('are You sure you want to delete this Loan?')">
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
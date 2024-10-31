@extends('layouts.app')

@section("title","Department")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Departments</h2>
                    <a href="{{ route('department.create') }}" class="btn btn-outline-primary">Create Department</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="Department_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departments as $department)

                                    <tr>
                                        <td>{{ $department->department_name }}</td>
                                        <td>{{ $department->created_at->format("Y-m-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('department.edit',$department) }}">Edit</a>
                                                <form action="{{ route('department.destroy',$department) }}" method="POST">
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
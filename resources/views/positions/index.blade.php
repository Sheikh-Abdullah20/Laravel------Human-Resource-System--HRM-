@extends('layouts.app')

@section("title","Position")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Positions</h2>
                    <a href="{{ route('position.create') }}" class="btn btn-outline-primary">Create Position</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="position_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all"> 
                                        </th>
                                        <th>Position Title</th>
                                        <th>hourly_rate</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($positions as $position)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $position->id }}">  
                                        </td>
                                        <td>{{ $position->position_name }}</td>
                                        <td>{{ $position->rate_per_hour}}</td>
                                        <td>{{ $position->created_at->format("Y-m-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('position.edit',$position) }}">Edit</a>
                                                <form action="{{ route('position.destroy',$position) }}" method="POST" onclick="return confirm('are You sure you want to delete this position?')">
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
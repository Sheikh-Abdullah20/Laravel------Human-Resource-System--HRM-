@extends('layouts.app')

@section("title","Schedule")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">Schedules</h2>
                    <a href="{{ route('schedule.create') }}" class="btn btn-outline-primary">Create Schedule</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="schedule_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all">   
                                        </th>
                                        <th>Schedule Name</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($schedules as $schedule)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $schedule->id }}">  
                                        </td>
                                        <td>{{ $schedule->name }}</td>
                                        <td>{{ $schedule->formatted_times['checkin']}}</td>
                                        <td>{{ $schedule->formatted_times['checkout']}}</td>
                                        <td>{{ $schedule->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('schedule.edit',$schedule) }}">Edit</a>
                                                <form action="{{ route('schedule.destroy',$schedule) }}" method="POST" onclick="return confirm('are You sure you want to delete this schedule?')">
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
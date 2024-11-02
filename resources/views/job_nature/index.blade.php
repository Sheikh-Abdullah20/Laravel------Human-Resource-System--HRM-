@extends('layouts.app')

@section("title","Job Nature")

@section('content')

<div class="main-content-inner">
    <div class="row">
        <!-- table primary start -->
        <div class="col-lg-12 mt-5">
            <div class="card">
                <div class="card-body">
                   <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="display-5">job Natures</h2>
                    <a href="{{ route('jobNature.create') }}" class="btn btn-outline-primary">Create Job Nature</a>
                   </div>
                    <div class="single-table mt-5">
                        <div class="data-tables">
                            <table id="jobNature_table" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th></th>
                                        <th>
                                            <input type="checkbox" class="form-control" id="select_all">   
                                        </th>
                                        <th>Job Nature Title</th>
                                        <th>Date</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($job_natures as $job)

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="checkbox" class="form-control each_select" value="{{ $job->id }}">  
                                        </td>
                                        <td>{{ $job->job_nature_title }}</td>
                                        <td>{{ $job->created_at->format("Y-M-d") }}</td>
                                        <td>
                                            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform:translate3d(15px, 43px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                <a class="dropdown-item" href="{{ route('jobNature.edit',$job) }}">Edit</a>
                                                <form action="{{ route('jobNature.destroy',$job) }}" method="POST" onclick="return confirm('are You sure you want to delete this job Nature?')">
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
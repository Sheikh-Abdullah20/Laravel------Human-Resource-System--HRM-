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
                    <h2 class="display-5">Create Job Nature</h2>
                    <a href="{{ route('jobNature.index') }}" class="btn btn-outline-primary">Back To Job Nature</a>
                   </div>
                  
                   <form action="{{ route('jobNature.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="job_nature_title" class="col-form-label">Job Nature Title *</label>
                        <input class="form-control" type="text" name="job_nature_title" id="job_nature_title" value="{{ old('job_nature_title') }}">
                        @error('job_nature_title')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <button class="btn btn-outline-primary" type="submit">Create Job Nature</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
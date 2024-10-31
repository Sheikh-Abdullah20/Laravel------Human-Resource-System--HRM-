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
                    <h2 class="display-5">Edit Departments</h2>
                    <a href="{{ route('department.index') }}" class="btn btn-outline-primary">Back To Departments</a>
                   </div>
                  
                   <form action="{{ route('department.update',$department) }}" method="POST" class="w-50">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="Department_name" class="col-form-label">Department Name</label>
                        <input class="form-control" type="text" name="department_name" id="Department_name" value="{{ $department->department_name }}">
                        @error('department_name')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary" type="submit">Update Department</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
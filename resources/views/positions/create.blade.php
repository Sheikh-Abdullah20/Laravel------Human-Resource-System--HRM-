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
                    <h2 class="display-5">Create Position</h2>
                    <a href="{{ route('position.index') }}" class="btn btn-outline-primary">Back To Positions</a>
                   </div>
                  
                   <form action="{{ route('position.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="position_name" class="col-form-label">Position Title</label>
                        <input class="form-control" type="text" name="position_name" id="position_name" value="{{ old('position_name') }}">
                        @error('position_name')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="rate_per_hour" class="col-form-label">Hourly Rate</label>
                        <input class="form-control" type="text" name="rate_per_hour" id="rate_per_hour" value="{{ old("rate_per_hour") }}">
                        @error('rate_per_hour')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button class="btn btn-outline-primary" type="submit">Create Position</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
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
                    <h2 class="display-5">Create Schedule</h2>
                    <a href="{{ route('schedule.index') }}" class="btn btn-outline-primary">Back To Schedules</a>
                   </div>
                  
                   <form action="{{ route('schedule.store') }}" method="POST" class="w-50">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-form-label">Schedule Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                        @error('name')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="timepicker" class="col-form-label">Check-in</label>
                        <input class="form-control" type="text" name="checkin" id="timepicker" value="{{ old('checkin') }}">
                        @error('checkin')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="timepicker2" class="col-form-label">Check-out</label>
                        <input class="form-control" type="text" name="checkout" id="timepicker2" value="{{ old('checkout') }}">
                        @error('checkout')  
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <button class="btn btn-outline-primary" type="submit">Create Schedule</button>
                   </form>

                </div>
            </div>
        </div>
</div>

@endsection
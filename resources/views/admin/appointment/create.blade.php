@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 custom-form">
                <h2 class="mb-5">Accept Appointment Request</h2>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Patient Name:{{$requestedAppointment->patient_name}}</h5>
                        <h5 class="mt-3">Patient Mobile:{{$requestedAppointment->mobile_number}}</h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Doctor Name:{{$requestedAppointment->doctor->name}}</h5>
                        <h5  class="mt-3">Schedule:({{$requestedAppointment->schedule}}) টা</h5>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.appointment.store') }}" class="row g-3 mt-3">
                    @csrf
                    <input type="hidden" name='appointment_id' value="{{$requestedAppointment->id}}">
                    <div class="col-md-6 mt-5">
                        <label class="form-label">Give Serial</label>
                        <input type="text" name="serial_no"
                            class="form-control  @error('serial_no') is-invalid @enderror" placeholder="Serial number" required>
                        @error('serial_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button mt-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

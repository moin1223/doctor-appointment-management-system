@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-11 custom-form">
            <h4>Edit Doctor</h4>
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            <form method="POST" action="{{ route('admin.doctor.update',[$dataItem->id])}}" class="row g-3 mt-3">
                    @csrf
                    @method('put')
                    <div class="col-md-8">
                        <label class="form-label">Name</label>
                        <input type="text" name="name"  value="{{ $dataItem->name }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="moin">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Specialist</label>
                        <input type="text" name="specialist"   value="{{ $dataItem->specialist }}"
                            class="form-control  @error('specialist') is-invalid @enderror" placeholder="uddin">
                        @error('specialist')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-8">
                        <label class="form-label">Mobilen Nmber</label>
                        <input type="number" name="mobile_number" value="{{ $dataItem->mobile_number }}"
                            class="form-control  @error('mobile_number') is-invalid @enderror">
                        @error('mobile_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                <div class="col-12">
                    <button type="submit" class="button mt-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

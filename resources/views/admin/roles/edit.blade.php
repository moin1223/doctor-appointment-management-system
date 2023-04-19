@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-11 custom-form">
            <h4>Edit Role</h4>
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
            <form method="POST" action="{{ route('role.update',[$role->id])}}" class="row g-3 mt-3">
                    @csrf
                    @method('put')
                <div class="col-md-8">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$role->name}}" >
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                </div>
                <div class="col-8">
                    <button type="submit" class="button mt-2">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

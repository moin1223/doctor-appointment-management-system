@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 custom-form">
                <h4>Add User</h4>
                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
                <form method="POST" action="{{ route('user.store') }}" class="row g-3 mt-3">
                    @csrf
                    <div class="col-md-4">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror" placeholder="moin">
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name"
                            class="form-control  @error('last_name') is-invalid @enderror" placeholder="uddin">
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input name="email" type="email"
                            class="form-control  @error('email') is-invalid @enderror" placeholder="moin@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label for="inputPassword4" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="inputPassword4"
                            placeholder="******">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="submit" class="button mt-2">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 user-table">
                <div>
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{session()->get('message')}}.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                </div>
                <h4 class="table-title">Role: <span class="text-dark">{{ $role->name }}</span></h4>
                <h5 class="mt-5">Permissions:</h5>
                <form method="POST" action="{{ route('role.gived-permission-store', [$role->id]) }}">
                    @csrf
                    <div class="row mt-1 ms-3">
                        @foreach ($permissions as $permission)
                            <div class="col-md-3 mt-3 form-check">

                                <input class="form-check-input" name="permissions[]" type="checkbox"
                                    value="{{ $permission->name}}"
                                    @foreach ($rolePermissions as $rolepermission)

                                    {{ $permission->id == $rolepermission->id ? 'checked' : '' }} @endforeach>
                                <label for="flexCheckChecked">
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-4 ms-3">

                    </div>
                    <div class="col-12 mt-5">
                        <button type="submit" class="button mt-2">Asign</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

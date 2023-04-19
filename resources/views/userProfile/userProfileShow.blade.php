@extends('layouts.app')
@section('content')

    <!----------------- content start ---------------------->
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-11 custom-form">
                <h4>My Profile</h4>

                <form method="POST" enctype="multipart/form-data"
                    action="{{ route('profile.update', [$user->id]) }}"class="row g-3 mt-3">
                    @csrf
                    @method('put')
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}

                    <div class="d-flex align-items-center">
                        <div class="col-md-2">
                            @if (is_null($user->image))
                                <img class="profile-img" src="{{ asset('images/avatar.png') }}" alt="">
                            @else
                                <img class="profile-img" src="{{ asset('images/users/' . $user->image) }}" alt="">
                            @endif
                        </div>
                        <div class="col-md-3 ms-2">
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-5 mt-5">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" value="{{ $user->first_name }}"
                            class="form-control @error('first_name') is-invalid @enderror" placeholder="moin" disabled>
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-5 mt-5">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" value="{{ $user->last_name }}"
                            class="form-control  @error('last_name') is-invalid @enderror" placeholder="uddin" disabled>
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

{{-- 
                    <div class="col-md-5">
                        <label class="form-label">Date Of Birth</label>
                        <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}"
                            class="form-control @error('date_of_birth') is-invalid @enderror" disabled>
                        @error('date_of_birth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Blood Group</label>
                        <select class="form-select @error('blood_group') is-invalid @enderror" name="blood_group" disabled>
                            <option value="" selected>Choose...</option>
                            <option value="A+"{{ $user->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                            <option value="A-"{{ $user->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                            <option value="B+"{{ $user->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                            <option value="B-"{{ $user->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                            <option value="O+"{{ $user->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                            <option value="O-"{{ $user->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                            <option value="AB+"{{ $user->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                            <option value="AB-"{{ $user->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                        </select>
                        @error('blood_group')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-10">
                        <label class="form-label">Address</label>
                        <input type="text" name="address" value="{{ $user->address }}"
                            class="form-control @error('address') is-invalid @enderror" placeholder="Lohagara,Chittagong"
                           >
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-5 mt-4">
                        <select class="form-select js-example-basic-single @error('division') is-invalid @enderror" 
                            name="division">
                            <option value="" selected>Division...</option>
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}"
                                    {{ $user->division_id == $division->id ? 'selected' : '' }}>{{ $division->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('division')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-5 mt-4">
                        <select class="form-select js-example-basic-single @error('district') is-invalid @enderror"
                            name="district">
                            <option value="" selected>District...</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ $user->district_id == $district->id ? 'selected' : '' }}>{{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('district')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-5  @error('gender') is-invalid @enderror">
                        <p>Gender</p>
                        <div class="form-check-inline ">
                            <input disabled class="form-check-input" type="radio" name="gender" value="male"
                                {{ $user->gender == 'male' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Male
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input disabled class="form-check-input" type="radio" name="gender" value="female"
                                {{ $user->gender == 'female' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Female
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <input disabled class="form-check-input" type="radio" name="gender" value="others"
                                {{ $user->gender == 'others' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Others
                            </label>
                        </div>

                    </div>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="col-md-5">
                        <label class="form-label">User Type</label>
                        <select class="form-select  @error('user_type') is-invalid @enderror" name="user_type" disabled>
                            <option value="" selected>Choose...</option>
                            <option value="donor" {{ $user->user_type == 'donor' ? 'selected' : '' }}>Donor</option>
                            <option value="seeker" {{ $user->user_type == 'seeker' ? 'selected' : '' }}>Seeker</option>
                        </select>
                        @error('user_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 mt-4">
                        <label class="form-label">Phone</label>
                        <div>
                            <input id="phone" minlength="8" maxlength="16" name="phone" value="{{ $user->phone }}"
                            class="form-control phone-input all-role @error('phone') is-invalid @enderror" type="tel"
                            onkeypress="return onlyNumberKey(event)">
                            
                        </div>
                    </div>
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror --}}








                    <div class="col-10">
                        <label for="inputEmail4" class="form-label">Email</label>
                        <input name="email" type="email" value="{{ $user->email }}" disabled
                            class="form-control  @error('email') is-invalid @enderror" placeholder="moin@gmail.com">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-12 mt-4">
                        <button type="submit" class="button mt-2">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

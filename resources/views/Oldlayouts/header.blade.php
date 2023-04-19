<nav class="navbar header navbar-expand-lg py-4 px-4">
    <div class="d-flex align-items-center">
        <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
        {{-- <h2 class="fs-2 m-0">Dashboard</h2> --}}
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">


                <div class=" text-dark dropdown-toggle" type="button" id="dropdownMenuButton1"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    @if (is_null(auth()->user()->image))
                                <img class="nav-profile-img" src="{{ asset('images/avatar.png') }}" alt="">
                            @else
                                <img class="nav-profile-img" src="{{ asset('images/users/' . auth()->user()->image) }}" alt="">
                            @endif
                     {{ auth()->user()->first_name }}
                </div>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>


            </li>
        </ul>
    </div>
</nav>
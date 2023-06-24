<div id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>Doctor</div>
    <div class="list-group list-group-flush my-3">
        <a href="{{ route('dashboard') }}"class="list-group-item list-group-item-action bg-transparent active"><i
                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        @role('admin')
            <div class="sidebar-dropdown mt-3 mb-4">
                <button class="dropdown-btn fw-bold ms-3">
                    <div class="d-flex justify-content-between">
                        <span>
                            <i class="fas fa-users me-2"></i>
                            Users
                        </span>
                        <i class="fa fa-angle-down pe-2 me-5"></i>
                    </div>
                </button>
                <div class="list-group dropdown-container bg-primary">
                    <a class="list-group-item pt-3" href="{{ route('user.index') }}">List</a>
                    <a class="list-group-item py-0" href="{{ route('user.create') }}">Create</a>
                </div>
            </div>

            <div class="sidebar-dropdown mt-3 mb-4">
                <button class="dropdown-btn fw-bold ms-3">
                    <div class="d-flex justify-content-between">
                        <span>
                            <i class="fas fa-chart-line me-2"></i>
                            Doctors
                        </span>
                        <i class="fa fa-angle-down pe-2 me-5"></i>
                    </div>
                </button>
                <div class="list-group dropdown-container bg-primary">
                    <a class="list-group-item pt-3" href="{{ route('admin.doctor.index') }}">List</a>
                    <a class="list-group-item py-0" href="{{ route('admin.doctor.create') }}">Create</a>
                </div>
            </div>
            <div class="sidebar-dropdown mt-3 mb-4">
                <button class="dropdown-btn fw-bold ms-3">
                    <div class="d-flex justify-content-between">
                        <span>
                            <i class="fas fa-chart-line me-2"></i>
                           Appointment
                        </span>
                        <i class="fa fa-angle-down pe-2 me-5"></i>
                    </div>
                </button>
                <div class="list-group dropdown-container bg-primary">
                    <a class="list-group-item pt-3" href="{{ route('admin.appointment.index') }}">Requested Appointment</a>
                    {{-- <a class="list-group-item py-0" href="{{ route('admin.doctor.create') }}">Create</a> --}}
                </div>
            </div>
            <div class="sidebar-dropdown mt-3 mb-4">
                <button class="dropdown-btn fw-bold ms-3">
                    <div class="d-flex justify-content-between">
                        <span>
                            <i class="fas fa-chart-line me-2"></i>
                            Roles
                        </span>
                        <i class="fa fa-angle-down pe-2 me-5"></i>
                    </div>
                </button>
                <div class="list-group dropdown-container bg-primary">
                    <a class="list-group-item pt-3" href="{{ route('role.index') }}">List</a>
                    <a class="list-group-item py-0" href="{{ route('role.create') }}">Create</a>
                </div>
            </div>

            <div class="sidebar-dropdown mt-3 mb-4">
                <button class="dropdown-btn fw-bold ms-3">
                    <div class="d-flex justify-content-between">
                        <span>
                            <i class="fas fa-chart-line me-2"></i>
                            Permissions
                        </span>
                        <i class="fa fa-angle-down pe-2 me-5"></i>
                    </div>
                </button>
                <div class="list-group dropdown-container bg-primary">
                    <a class="list-group-item pt-3" href="{{ route('permission.index') }}">List</a>
                    <a class="list-group-item py-0" href="{{ route('permission.create') }}">Create</a>
                </div>
            </div>
        @endrole

    </div>
</div>

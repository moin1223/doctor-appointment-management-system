@extends('layouts.app')
@section('content')
    <!-- User_table -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 user-table table-responsive">
                <div class="d-flex justify-content-between">
                    <h4 class="text-dark">Requested Appointmnet</h4>
                    {{-- <div class="createSegment">
                        <a class="btn dim_button create_new" href="{{ route('role.create') }}"> <i
                                class="fa-regular fa-plus"></i> Create New</a>
                    </div> --}}


                </div>
                        <table class="table mt-5 table-borderless">
                            <thead class="table-head">
                                <tr class="text-center">
                                    <th class="p-3" scope="col">Serial</th>
                                    <th class="p-3" scope="col">Patient Name</th>
                                    <th class="p-3" scope="col">Doctor Name</th>
                                    <th class="p-3" scope="col">Schedule</th>
                                    <th class="p-3" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach ( $requestedAppointments as $requestedAppointment)
                        <tr class="text-center">
                            <td class="p-3">{{$loop->index+1}}</td>
                            <td class="p-3">{{$requestedAppointment->patient_name}}</td>
                            <td class="p-3">{{$requestedAppointment->doctor->name}}</td>
                            <td class="p-3">({{$requestedAppointment->schedule}}) টা</td>
                            <td class="action-icons d-flex justify-content-center p-3">
                                <a class="me-1 btn btn-primary" href="{{ route('admin.appointment.create', [$requestedAppointment->id]) }}">
                                    Accept
                               </a>
                            {{-- <td class="action-icons d-flex justify-content-center p-3">
                                <a class="me-1 btn btn-success" href="{{ route('admin.appointment.create', [$requestedAppointment->id]) }}">
                                    Edit
                               </a> --}}


                                <form method="post" action="{{ route('admin.appointment.destroy', [$requestedAppointment->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="show-confirm btn btn-danger">
                                         Cancel</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mt-5">{{ $requestedAppointments->links() }}</div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.show-confirm').click(function(event) {
            // console.log('click')
            let form = $(this).closest('form');
            event.preventDefault()

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        })
    </script>



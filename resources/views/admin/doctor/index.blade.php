@extends('layouts.app')
@section('content')
    <!-- User_table -->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11 user-table">
                <div class="d-flex justify-content-between">
                    <h4 class="table-title">Doctors</h4>
                    {{-- <a class="create-user" href={{ route('user.create') }}>Create New User</a> --}}
                    <div class="createSegment">
                        <a class="btn dim_button create_new" href="{{ route('admin.doctor.create') }}"> <i
                                class="fa-regular fa-plus"></i> Create New</a>
                    </div>

                </div>
           
                <table class="table mt-5 table-borderless">
                    <thead class="table-head">
                        <tr class="text-center">
                            <th class="p-3" scope="col">Serial</th>
                            <th class="p-3" scope="col">Full Name</th>
                            <th class="p-3" scope="col">Specialist</th>
                            <th class="p-3" scope="col">Mobile number</th>
                            <th class="p-3" scope="col">Actions</th>            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contentData as $data)
                            <tr class="text-center">
                                {{-- <td>{{$loop->index+1}}</td> --}}
                                <td class="p-3">{{$loop->index+1}}</td>
                                <td class="p-3">{{ $data->name }}</td>
                                <td class="p-3">{{ $data->specialist }}</td>
                                <td class="p-3">+{{ $data->mobile_number }}</td>
                                <td class="action-icons d-flex justify-content-center p-3">
                                    <a class="edit me-1" href="{{ route('admin.doctor.edit', [$data->id]) }}"><i
                                            class="fa-solid fa-pen-to-square btn btn-primary"></i></a>
                                    <form method="post" action="{{ route('admin.doctor.destroy', [$data->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="show-confirm"><i
                                            class="fa-solid fa-trash btn btn-danger"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row mt-5">{{ $contentData->links() }}</div>
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

@append

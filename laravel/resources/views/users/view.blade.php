@extends('layouts.app')

@section('title' , 'Certificate Generator')
@section('content')

<h1 class="text-center">Users</h1>
<div class="container mt-5 ">
    @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <div class="table-responsive shadow p-3 bg-white rounded ">
   <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('user.destroy' , $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type ="submit" class="btn btn-danger">Delete</button>
                        </form>

                        {{-- This is for modal --}}
                        {{-- <form action={{  }} method="POST" style="dislay:inline;">

                        </form> --}}

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Open Modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Generate Certificate</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('user.certificate', $user->id) }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="userid" value="{{ $user->id }}">
                                            <label for="lesson1">Select Title</label>
                                            <select class="form-control" id="lesson1" name="lessonid">
                                                <option value="">Select a lesson...</option>
                                                @foreach ($lessons as $lesson)
                                                    <option value="{{ $lesson->id }}">{{ $lesson->lesson }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" name="create" class="btn btn-primary">Create</button>
                                        </div>
                                        </form>



                                </div>
                            </div>
                        </div>
                    </div>
                    </td>


                </tr>
                @endforeach

            </tbody>


        </table>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection

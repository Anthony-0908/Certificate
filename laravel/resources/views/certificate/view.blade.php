@extends('layouts.app')

@section('title' , 'Certificate Generator')
@section('content')

<h1 class="text-center">Users</h1>
<div class="container mt-5 ">
    <a clas="btn btn-primary mt-2"></a>
    <div class="table-responsive shadow p-3 bg-white rounded ">
        <table id="myTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Lesson</th>
                    <th>Action</th>
                    <th>Created</th>
                    <th>Updated</th>

                </tr>
            </thead>

            <tbody>

                @foreach ($certificates as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->first_name. ' ' . $item->user->last_name}}</td>
                    <td>{{ $item->lesson->lesson }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('download-pdf', $item->id) }}" class="btn btn-primary">Download Certificate</a>
                    </td>
                </tr>



                @endforeach

            </tbody>


        </table>
    </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>

<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection

@extends('layouts.app')

@section('title' , 'Certificate Generator')
@section('content')

<h1 class="text-center">Users</h1>
<div class="container mt-5 ">
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

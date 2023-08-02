@extends('layouts.app')

@section('title' , 'Certificate Generator')
@section('content')

<h1 class="text-center">Certificates</h1>
<div class="container mt-5 ">
    <div class="table-responsive shadow p-3 bg-white rounded ">
        <table id="myTable">
            <thead>
                <tr>
                    <th>lesson</th>
                    <th>Speaker Name</th>
                    <th>Position </th>
                    <th>Time duration</th>
                    <th>date given</th>
                    <th>Name signature</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($lessons as $lesson)
                <tr>
                    <td>{{ $lesson->lesson }}</td>
                    <td>{{ $lesson->speaker_name}}</td>
                    <td>{{ $lesson->position  }}</td>
                    <td>{{ $lesson->time_duration }}</td>
                    <td>{{ $lesson->date_given }}</td>
                    <td>{{ $lesson->name_signature }}</td>
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

@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- <input type="text" value="{{ $user->id }}"> --}}
        <div class="form-group">
            <label for="title">FirstName</label>
            <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">LastName</label>
            <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">
        </div>
        <div class="form-group">
            <label for="due_date">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">

        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" >
        </div>
        <button type="submit" name="edit"  class="btn btn-primary">Update Task</button>
    </form>
@endsection

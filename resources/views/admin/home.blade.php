@extends('layout')
@section('title', 'Washingmashing | Admin')

@section('content')
    <div>
        <h1>Admin</h1><br>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#logoutModal"
            onclick="event.stopPropagation();">
            Logout
        </button>
    </div>
@endsection

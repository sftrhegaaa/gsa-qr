@extends('admin.layouts.app')

@section('title', 'Create User')
@section('page-title', 'Add New User')

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('admin.users') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
@endsection

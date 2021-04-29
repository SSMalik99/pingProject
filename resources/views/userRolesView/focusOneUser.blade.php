@extends('layouts.app')
@section('content')
@auth
    <div class="container bg-dark" >
        <div class="card text-center">
            <div class="card-header ">
              {{ ucwords('User Profile') }}
            </div>
            <div class="card-body">
              <h5 class="card-title">{{ ucwords($user->name) }}</h5>
              <p class="card-text">{{ ucwords($user->name) }} is working on the profile of {{ Str::ucfirst($user->userRoles->role_name) }}</p>
              <a href="/deleteUser/{{ $user->user_id }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Remove User</a>
              <a href="/editUserPassword/{{ $user->user_id }}" class="btn btn-sm btn-secondary">Edit PassWord</a>
              <a href="/editUser/{{ $user->user_id }}" class="btn btn-sm btn-success">Edit Profile</a>
              <a href="/pingProject/showAllUsers" class="btn btn-sm btn-primary">Go Back</a>
            </div>
            <div class="card-footer text-muted">
              Member From: {{ $user->created_at }}
            </div>
          </div>
    </div>
    @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
    @endpush
@endauth
    
@endsection
@extends('layouts.app')
@section('content')
@auth
    <div class="row">
        <div class="col-md-2">
            <x-userRolefilter />
        </div>
        <div class="col-md-10">
            <table class="table">
                <thead>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>category</th>
                    <th>Acction</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <th><a href="/pingProject/focusUser/{{ $user->user_id }}">{{ $user->user_id }}</a></th>
                            <td><a href="/pingProject/focusUser/{{ $user->user_id }}">{{ ucwords($user->name) }}</a></td>
                            <th>{{ strtoupper($user->email) }}</th>
                            <th>{{ Str::ucfirst($user->userRoles->role_name) }}</th>
                            <th>
                                <a href="/deleteUser/{{ $user->user_id }}" onclick="return confirmDelete()" class="btn btn-sm btn-danger">Delete</a>
                                <a href="/editUser/{{ $user->user_id }}" class="btn btn-sm btn-secondary">Edit</a>
                            </th>
                        </tr>    
                    @endforeach                    
                </tbody>
            </table>
        </div>
    </div>
    @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>
    @endpush
@endauth
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        @auth
        @if (!empty($userRoles))
        <div style="text-align: center;font-weight:bold;" class="text-primary">Currently Users Role</div>
            <table class="table">
                <thead class="text-danger">
                    <th>Role id</th>
                    <th>Role name</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($userRoles as $userRole)
                        <tr>
                            <td>{{ $userRole->role_id }}</td>
                            <td>{{ $userRole->role_name }}</td>
                            <td>
                                <a href="/editThisUserRole/{{ $userRole->role_id }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="/removeThisRole/{{ $userRole->role_id }}" class="btn btn-sm btn-danger" onclick="return confirmDelete()">Remove</a>
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <div class="alert alert-warning">
            Oh nooo there is no Role available.
        </div>
        @endif
        <hr>
        <form action="/addThisRole" method="POST">
            @csrf
            <div class="mb-3">
                <label for="inputRole" class="form-label">Enter New Role</label>
                <input type="text" class="form-control" id="inputRole" name="inputRole" aria-describedby="inputRole" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        @endauth
        @push('script')
        <script src="{{ asset('js/customApp.js') }}"></script>  
        @endpush
    </div>
@endsection
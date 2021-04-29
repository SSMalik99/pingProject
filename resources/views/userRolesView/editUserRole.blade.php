@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('editThisRole') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="hidden" class="form-control" id="InputRoleId" name="InputRoleId" aria-describedby="InputRoleId" value="{{ $role->role_id }}">
            <label for="editInputRole" class="form-label">Enter Role name</label>
            <input type="text" class="form-control" id="editInputRole" name="editInputRole" aria-describedby="inputRole" value="{{ $role->role_name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')


        {{-- form start --}}

        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h5>Edit User</h5>
                <hr class="dropdown-divider">
                <form method="post" action={{ route('users.update', $user->id) }}>
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control text-white" id="email" value={{ $user->email }}
                            placeholder="name@example.com" name="email" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white" name="name" id="name"
                            value={{ $user->name }} placeholder="Enter Name" required>
                        <label for="name">Name</label>
                    </div>
                    <select class="form-select form-select-sm mb-3" required value={{ $user->type }} name="type"
                        aria-label=".form-select-sm example">
                        @if ($user->type == 'admin')
                            <option value="admin" selected>Admin</option>
                            <option value="user">User</option>
                        @else
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        @endif
                    </select>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
            {{-- form end --}}

        </div>
    @endsection

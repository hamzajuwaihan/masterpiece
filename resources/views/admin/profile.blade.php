@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')




        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h3>Profile info</h3>
                <hr class="dropdown-divider">
                <form method="post" action={{ route('profile.update', $user->id) }}>
                    @method('PUT')
                    @csrf
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control text-white" id="email" value={{ $user->email }}
                            placeholder="Enter your email here" name="email" required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control text-white" name="name" id="name"
                            value={{ $user->name }} placeholder="Enter Name" required>
                        <label for="name">Name</label>
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagem mb-2">Profile image</label><br>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control -white" name="password" id="password"
                            placeholder="Enter your new password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control text-white" name="password_confirmation"
                            id="password_confirmation" placeholder="Confirm your new password">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        @endsection

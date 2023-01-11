@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')




        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h5>Edit Category</h5>
                <hr class="dropdown-divider">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3 mt-3">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $category->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $category->description }}</textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <br />
                        <img src="{{ asset('images/' . $category->image) }}" alt="" width="100px"
                            height="100px" class="mb-3">
                        <br />
                    </div>

                    <div class="form-group mb-3">
                        <label for="image">Change Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>


        </div>
    @endsection

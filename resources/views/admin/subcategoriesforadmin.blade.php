@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')




        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>All Sub-Categories</h5>
                    <!-- add trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Sub category
                    </button>

                    <!-- Modal -->
                    <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog  centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new category</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('subcategories.store') }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control bg-white" id="name"
                                                name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <input type="text" class="form-control bg-white" id="description"
                                                name="description">
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <select class="form-select bg-white" aria-label="Default select example"
                                                id="type" name="course_type">
                                                <option selected>Open this select menu</option>
                                                @foreach ($courseTypes as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="parent_id" class="form-label">Main Category</label>
                                            <input class="form-control bg-white" autocomplete="off" list="datalistOptions"
                                                id="exampleDataList" name="category_id" placeholder="Type to search...">

                                            <datalist id="datalistOptions">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="form-group mb-3" id="instructors-container">
                                            <div class="d-flex mb-3">
                                                <h4>Instructors</h4>
                                                <button type="button" id="add-instructor" class="btn btn-info ms-auto">Add
                                                    more
                                                    instructors</button>

                                            </div>
                                            <div class="d-flex mt-3">
                                                <label>Instructor name:</label>
                                                <br>
                                                <input type="text" list="instructor-names" autocomplete="off"
                                                    name="instructors[]" class="form-control mb-3 me-2"
                                                    placeholder="Type to search..." />

                                            </div>
                                        </div>
                                        <div class="d-flex">

                                            <datalist id="instructor-names">
                                                @foreach ($instructors as $instructor)
                                                    <option value="{{ $instructor->user->id }}">
                                                        {{ $instructor->user->name }}
                                                    </option>
                                                @endforeach
                                            </datalist>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control" id="image" name="image">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="dropdown-divider">
                @foreach ($categories as $category)
                    <h5 class="text-white mb-3 mt-3">{{ $category->name }}</h5>
                    @if (count($category->subCategories) > 0)
                        <table class="table-responsive table text-start align-middle table-bordered table-hover mb-0">
                            <thead>


                                <tr class="text-white">
                                    <th scope="col">Name</th>
                                    <th scope="col">description</th>
                                    <th scope="col">image</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->subCategories as $sub)
                                    <tr>
                                        <td>{{ $sub->name }}</td>
                                        <td>{{ $sub->description }}</td>
                                        <td>
                                            <img src="{{ asset('images/' . $sub->image) }}" alt=""
                                                style="width: 100px; height: 100px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('subcategories.edit', $sub->id) }}"
                                                class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#DeleteModal{{ $sub->id }}">
                                                Delete
                                            </button>
                                            <div class="modal fade" id="DeleteModal{{ $sub->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-dark">
                                                        <form method="POST"
                                                            action="{{ route('subcategories.destroy', $sub->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    {{ $sub->name }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Deleting this sub category will delete all the material in
                                                                it!
                                                                Are you
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <hr>
                    @else
                        <h6 class="text-white text-center mb-3">No Sub Categories for this one!</h6>
                        <hr>
                    @endif
                @endforeach


            </div>


        </div>
    @endsection

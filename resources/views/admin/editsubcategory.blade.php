@extends('admin.app')




@section('content')
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <form class="d-none d-md-flex ms-4">
                <input class="form-control bg-dark border-0" type="search" placeholder="Search">
            </form>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-envelope me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Message</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src={{ asset('admin/img/user.jpg') }} alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src={{ asset('admin/img/user.jpg') }} alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <div class="d-flex align-items-center">
                                <img class="rounded-circle" src={{ asset('admin/img/user.jpg') }} alt=""
                                    style="width: 40px; height: 40px;">
                                <div class="ms-2">
                                    <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                    <small>15 minutes ago</small>
                                </div>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all message</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fa fa-bell me-lg-2"></i>
                        <span class="d-none d-lg-inline-flex">Notificatin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Profile updated</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">New user added</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item">
                            <h6 class="fw-normal mb-0">Password changed</h6>
                            <small>15 minutes ago</small>
                        </a>
                        <hr class="dropdown-divider">
                        <a href="#" class="dropdown-item text-center">See all notifications</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src={{ asset('admin/img/user.jpg') }} alt=""
                            style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">John Doe</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="#" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <form>
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h5>Edit Category</h5>
                <hr class="dropdown-divider">
                <form action="{{ route('subcategories.update', $subCategory->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3 mt-3">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $subCategory->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Category Description</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $subCategory->description }}</textarea>
                    </div>

                    <div class="form-group mb-3" id="instructors-container">

                        <div class="d-flex mb-3">
                            <h4>Instructors</h4>
                            <button type="button" id="add-instructor" class="btn btn-info ms-auto">Add more
                                instructors</button>

                        </div>
                        @foreach ($instructorCourses as $instructor)
                            <div class="d-flex">
                                <label>Instructor name:</label>
                                <br>
                                <input type="text" list="instructor-names" name="instructors[]"
                                    class="form-control mb-3 me-2" value="{{ $instructor->id }}"
                                    placeholder="Type to search..." />
                                <button type="button" class="remove-button btn btn-outline-primary"
                                    style="height: 38px; width: 80px;">Remove</button>
                            </div>
                        @endforeach
                        <div class="d-flex">

                            <datalist id="instructor-names">
                                @foreach ($instructors as $instructor)
                                    <option value="{{ $instructor->id }}">
                                        {{ $instructor->name }}
                                    </option>
                                @endforeach
                            </datalist>
                        </div>

                    </div>

                    <div class="form-group mb-3">
                        <label for="">Image</label>
                        <br />
                        <img src="{{ asset('images/' . $subCategory->image) }}" id="image" alt=""
                            width="100px" height="100px" class="mb-3">
                        <br />
                    </div>

                    <div class="form-group mb-3">
                        <label for="file-input">Change Image</label>
                        <input type="file" class="form-control" name="image" id="file-input">
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <h5>material for {{ $subCategory->name }}</h5>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('materials.create', ['subcategory' => $subCategory->id]) }}"
                            class="btn btn-primary float-end">Add Material</a>
                    </div>
                    @if (count($subCategory->materials) > 0)
                        <table class="table table-bordered draggable">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">position</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategory->materials as $material)
                                    <tr data-id="{{ $material->id }}" draggable="true">
                                        <td>{{ $material->title }}</td>
                                        <td class="position">{{ $material->position + 1 }}</td>
                                        <td>
                                            <a href="{{ route('materials.edit', $material->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $material->id }}">
                                                    Delete
                                                </button>
                                                <div class="modal fade" id="exampleModal{{ $material->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content bg-dark">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Delete {{ $material->title }}
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form
                                                                action="{{ route('materials.destroy', $material->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete this material?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Close
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Delete
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <h6>No material yet!</h6>
                    @endif

                </div>


            </div>

        @endsection

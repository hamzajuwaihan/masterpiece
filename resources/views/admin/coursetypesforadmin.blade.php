@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')




        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>All course types</h5>
                    <!-- add trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add course type
                    </button>

                    <!-- Modal -->
                    <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabelAdd"
                        aria-hidden="true">
                        <div class="modal-dialog  centered">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabelAdd">Add new course type</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <form method="POST" action="{{ route('courseTypes.store') }}"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control bg-white" id="name"
                                                name="name">
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
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-white">
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseTypes as $courseType)
                                <tr>
                                    <td>{{ $courseType->name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#editModal{{ $courseType->id }}">
                                            Edit
                                        </button>
                                        <form action="{{ route('courseTypes.update', $courseType->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal fade" id="editModal{{ $courseType->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-dark">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                {{ $courseType->name }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="name" class="form-label">Name</label>
                                                                <input type="text" class="form-control bg-white"
                                                                    id="name" name="name"
                                                                    value="{{ $courseType->name }}">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Edit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $courseType->id }}">
                                            Delete
                                        </button>

                                        <form action="{{ route('courseTypes.destroy', $courseType->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal fade" id="deleteModal{{ $courseType->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-dark">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                                                                {{ $courseType->name }}</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Deleting this course type will delete all the sub categories,
                                                            are
                                                            you sure you want to delete?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>
@endsection

@extends('admin.app')




@section('content')
    <div class="content">
        @include('admin.layout.navbar')



        <div class="container-fluid pt-4 px-4">
            <div class="bg-secondary rounded h-100 p-4">
                <h5>Add Material for {{ $subCategory->name }}</h5>
                <hr class="dropdown-divider">
                <div id="editing-aria">
                    <form action="{{ route('materials.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $subCategory->id }}">
                        <label for="title" class="mb-1">Title</label>
                        <input type="text" name="title" class="form-control mb-3" placeholder="Enter Title">
                        <textarea id="editor" class="text-dark" name="content">This is some sample content.</textarea>
                        <button class="btn btn-primary mt-3" type="submit">Submit</button>

                    </form>

                </div>
            </div>


        </div>

        <script src="../js/custom.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                    },

                })
                .then(editor => {
                    console.log(editor);
                })
                .catch(error => {
                    console.log(error);
                });
        </script>
    @endsection

@extends('layouts.app')

@section('hero')
    @parent
    <div class="container-fluid pt-5 bg-primary hero-header" style="padding-bottom: 0;margin-bottom:0;">
        <div class="container my-5 pt-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Courses</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href={{ route('index') }}>Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><a class="text-white"
                                    href={{ route('courses.index') }}>Courses</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">{{ $course->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Projects Start -->
    <div class="container-xxl pb-5">
        <div class="container pb-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="text-center mb-5">{{ $course->name }}</h1>

                <p class="text-center">Instructor:
                    @foreach ($course->instructors as $instructor)
                        {{ $instructor->user }}@if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </p>



                <p class="text-center">{{ $course->description }}</p>
            </div>

        </div>

    </div>


    <div class="container">
        <div class="card-deck">
            <div class="row justify-content-center">
                @foreach ($course->materials as $material)
                    <div class="card col-md-3 col-xl-4 m-2 col-sm-12 p-0" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $material->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ \Carbon\Carbon::parse($material->created_at)->format('Y-m-d') }}
                            </h6>

                        </div>
                        <div class="d-grid">
                            <a href="{{ route('show.related.materials', ['courseId' => $course->id, 'materialId' => $material->id]) }}" class="btn btn-primary m-0 ">View</a>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>
        <!-- Projects End -->
    @endsection

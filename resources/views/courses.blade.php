@extends('layouts.app')

@section('hero')
    @parent
    <div class="container-fluid py-5 bg-primary hero-header">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated slideInDown">Courses</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href={{ route('index') }}>Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Courses</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 px-lg-5">
            <div class="wow fadeInUp" data-wow-delay="0.1s">
                <p class="section-title text-secondary justify-content-center"><span></span>Our Courses<span></span></p>
                <h1 class="text-center mb-5">Recently Completed Courses</h1>
            </div>
            <div class="search">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search for courses" aria-label="Search for courses"
                        aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                </div>
            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">All</li>
                        @foreach ($courseTypes as $item)
                            <li class="mx-2" data-filter=".{{ str_replace(' ', '', trim($item->name)) }}">
                                {{ $item->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($courses as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ str_replace(' ', '', trim($item->type->name)) }} wow fadeInUp"
                        data-wow-delay="0.1s">
                        <div class="rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset("images/$item->image") }}" alt="">

                            </div>
                            <div class="bg-light p-4">
                                <p class="text-primary fw-medium mb-2">{{ $item->name }}</p>
                                <h5 class="lh-base mb-0">{{ $item->description }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <h2 id="coming-soon" style="display: none;" class="text-center fs-5 text-primary">
                    Coming Soon ..!
                </h2>
            </div>
        </div>
    </div>
    <!-- Projects End -->
@endsection

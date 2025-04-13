@extends('layouts.index', ['title' => 'Courses'])
@section('content')
    <div class="container-fluid">
        <!-- Page Header Start -->
        <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center">
                <h1 class="display-5 text-white animated slideInDown mb-4">Courses</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                        <li class="breadcrumb-item text-light active" aria-current="page">Courses</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Courses Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" >
                    <h6 class="text-primary text-uppercase mb-2">Trending Courses</h6>
                    <h1 class="display-6 mb-4">Our Courses Upskill Your Understanding of the Bible</h1>
                </div>
                <div class="row g-4 justify-content-center">
                    @foreach ($courses as $course)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                                <div class="text-center p-4 pt-0">
                                    <div class="d-inline-block bg-primary text-white fs-5 py-1 px-4 mb-4">{{'Free'}}</div>
                                    <h5 class="mb-3">{{$course->title}}</h5>
                                    <div class="d-flex justify-content-between mb-0">
                                        <span class="small"><i class="fa fa-clock text-primary me-2"></i> {{ $course->estimate_duration }}Hrs</span>
                                        <span class="small"><i class="fa fa-clone text-primary me-2"></i> {{ $course->modules->count() }} Modules</span>
                                    </div>
                                </div>
                                <div class="position-relative mt-auto">
                                    <img class="img-fluid" src="{{$course->cover}}" alt="">
                                    <div class="courses-overlay">
                                        <a class="btn btn-outline-primary border-2" href="/courses/{{ $course->slug }}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Courses End -->
            </div>
        </div>
    </div>
@endsection
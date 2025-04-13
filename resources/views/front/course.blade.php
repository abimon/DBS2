@extends('layouts.index', ['title' => $course->title])
@section('content')
    <div class="container-fluid">
        <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s" style="background-image: url(<?php echo $course->cover;?>);">
            <div class="container text-center" >
                <h1 class="display-5 text-white animated slideInDown mb-4">{{$course->title}}</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-white" href="/courses">Courses</a></li>
                        <li class="breadcrumb-item text-light active" aria-current="page">{{$course->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container-xxl py-6">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-primary text-uppercase mb-2">{{$course->title}}</h6>
                    <h1 class="display-6 mb-4">Our Courses Upskill Your Understanding of the Bible</h1>
                </div>
                <div class="">
                    <?php echo html_entity_decode($course->description);?>
                </div>
            </div>
        </div>
    </div>
@endsection
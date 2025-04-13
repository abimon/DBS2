@extends('layouts.index', ['title' => $course->title])
@section('content')
    <div class="container-fluid">
        <div class="container-fluid page-header py-6 my-6 mt-0 wow fadeIn" data-wow-delay="0.1s"
            style="background-image: url(<?php echo $course->cover;?>);">
            <div class="container text-center">
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
        <div class="container-xxl">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="display-6 mb-4">Course Description</h1>
                        <?php echo html_entity_decode($course->description);?>
                    </div>
                    @if($course->curriculum != null)
                        <div class="col-md-6">
                            <h1 class="display-6 mb-4">Course Curriculum</h1>
                            <?php echo html_entity_decode($course->curriculum);?>
                            <h2 class="display-12">{{ $course->modules->count() }} Modules</h2>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <button class="btn btn-primary">Enroll</button>
    </div>
@endsection
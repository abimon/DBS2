@extends('layouts.index', ['title' => $enroll->course->title])
@section('content')
    <div class="container-fluid">
        <!-- Page Header Start -->
        <div class="container-fluid page-header p-5 my-4 mt-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center">
                <h1 class="display-5 text-white animated slideInDown mb-4 text-uppercase">{{$enroll->course->title}}</h1>
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
        <div class="container-xxl">
            <div class="container" style="min-height: 70vh;;">
                <div class="row">
                    <div class="col-md-4 card p-3">
                        @foreach ($enroll->course->modules as $id => $module)
                            <div class="form-check text-dark">
                                <input class="form-check-input" type="radio" disabled {{ $id >= $enroll->progress ? 'checked' : '' }}>
                                <label class="">
                                    {{$module->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-8">
                        <?php
                            $less = $enroll->course->modules;
                            $lesson = null;
                            foreach ($less as $key => $module) {
                                if ($key == $enroll->progress) {
                                    $lesson = $module;
                                }
                            }
                            if (!$lesson) {
                                if ($less->count() == 0) {
                                    echo "There is no lesson available";
                                } else {
                                    echo html_entity_decode("<div>You have completed all lessons</div><a class='btn btn-outline-primary border-2' href='/courses'>Back to Courses</a>");
                                }
                            } else {
                                echo html_entity_decode($lesson->title);
                                echo html_entity_decode($lesson->content);
                                
                            }
                        ?>
                        @if ($enroll->progress < $enroll->course->modules->count() - 1) 
                            <a class='btn btn-outline-primary border-2' href='/study/next'>Next Lesson</a>
                        @else 
                            <a class='btn btn-outline-primary border-2' href='/courses'>Back to Courses</a>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
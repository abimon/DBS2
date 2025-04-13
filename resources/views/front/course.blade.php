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
                            <?php    echo html_entity_decode($course->curriculum);?>
                            <h2 class="display-12">{{ $course->modules->count() }} Modules</h2>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary btn-lg" onclick="enroll(<?php echo $course->id;?>)">Enroll</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        // Ajax submit course id to route enroll/store using post method
        function enroll(course_id) {
            $.ajax({
                url: "{{ route('enroll.store') }}",
                type: "POST",
                data: {
                    course_id: course_id,
                    _token: "{{ csrf_token() }}",
                    user_id:'{{ Auth()->user()->id }}'
                },
                success: function (data) {
                    alert(data.message);
                    // window.location.href = "{{ route('enroll.index') }}";
                },
                error: function (data) {
                    alert(data.responseJSON.message);
                }
            });
        }
    </script>
@endsection
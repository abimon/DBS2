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
                                <button class="btn btn-primary btn-lg"
                                    onclick="enroll(<?php    echo $course->id;?>)">Enroll</button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal for successifully enrolling in the course -->
    <div class="modal fade" id="enrollModal" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Enroll in the course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="display-6 text-center">
                        <div id="message"></div>
                        <i class="fas fa-exclamation-circle fa-3x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="enrollModalsuccess" tabindex="-1" aria-labelledby="enrollModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Enroll in the course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">
                    <div class="display-6 text-center text-success">
                        <div>Enrolled successifully</div>
                        <i class="fas fa-check-circle fa-3x"></i>
                    </div>
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
                    user_id: '{{ Auth()->user()->id }}'
                },
                success: function (data) {
                    $('#enrollModalsuccess').modal('show');
                    setTimeout(function () {
                        $('#enrollModalsuccess').modal('hide');
                    }, 3000);
                },
                error: function (data) {
                    document.getElementById('modal-body').style.color = 'red';
                    document.getElementById('message').innerHTML = data.responseJSON.message;
                    $('#enrollModal').modal('show');
                    setTimeout(function () {
                        $('#enrollModal').modal('hide');
                    }, 3000);
                }
            });

        }
    </script>
@endsection
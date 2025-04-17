@extends('layouts.app', ['title' => 'My Courses'])
@section('content')
    <div class="container mt-3" style="min-height:80vh;">
        <div class="d-flex justify-content-between mb-2">
            <h4>Courses</h4>
        </div>

        <div class="container">
            @foreach ($enrolls as $enroll)
                <div class="card">
                    <div class="card-body" style="color:black;">
                        <h5 class="card-title text-uppercase">{{ $enroll->course->title }}</h5>
                        <div class="row mb-2">
                            <div class="col-md-3">
                                <b>Duration</b><br>
                                {{ $enroll->course->duration }} Hrs
                            </div>
                            <div class="col-md-3">
                                <b>Instructed by</b><br>{{$enroll->course->instructor->name}}
                            </div>
                            <div class="col-md-3">
                                <b>Modules</b><br>
                                {{ $enroll->course->modules->count() }}
                            </div>
                            <div class="col-md-3">
                                <b>Progress</b><br>
                                {{ $enroll->progress }}%
                            </div>
                        </div>
                        <div class="card-text">
                            <?php    echo html_entity_decode($enroll->course->description); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteCourses{{$enroll->course->id}}"
                                class="btn btn-sm btn-danger">Quit the Course</button>
                            <a href="{{route('course.show', $enroll->course->id)}}" class="btn btn-sm btn-primary ms-3">Continue...</a>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="modal fade" id="deleteCourses{{$enroll->course->id}}" tabindex="-1" aria-labelledby="addCoursesLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Quit from {{$enroll->course->name}} Course</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{route('enroll.update', $enroll->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Disenrolled">
                                <div class="modal-body">
                                    <p>Are you sure you want to quit from this Course?</p>
                                    <p>If yes, kindly share why you want to...</p>
                                    <textarea name="comment" id="" cols="30" rows="10" class="form-control" required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Quit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
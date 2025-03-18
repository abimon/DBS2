@extends('layouts.app',['title'=>'Courses'])
@section('content')
<div class="container mt-3" style="min-height:80vh;">
    <div class="d-flex justify-content-between mb-2">
        <h4>Courses</h4>
        <a href="{{ route('course.create',['theme_id'=>$theme->id]) }}" class="btn btn-primary">Add New Course</a>
    </div>
    
    <div class="container">
        @foreach ($theme->courses as $course)
        <div class="card">
            <div class="card-body" style="color:black;">
                <h5 class="card-title text-uppercase">{{ $course->title }}</h5>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <b>Duration</b><br>
                        {{ $course->duration }} Hrs
                    </div>
                    <div class="col-md-4">
                        <b>Instructed by</b><br>{{$course->instructor->name}}
                    </div>
                    <div class="col-md-4">
                        <b>Modules</b><br>
                        {{ $course->modules->count() }}
                    </div>
                </div>
                <div class="card-text" >
                    <?php echo html_entity_decode($course->description); ?>
                </div>
                <div class="modal-footer">
                    <a href="{{route('course.show', $course->id)}}" class="btn btn-sm btn-primary me-3">Modules</a>
                    <a class="btn btn-sm btn-info me-3" href="{{ route('course.edit',$course->id) }}">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deleteCourses{{$course->id}}" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="modal fade" id="deleteCourses{{$course->id}}" tabindex="-1" aria-labelledby="addCoursesLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete {{$course->name}} Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('course.destroy',$course->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this Course?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app',['title'=>'Modules'])
@section('content')
<div class="container mt-3" style="min-height:80vh;">
    <div class="d-flex justify-content-between mb-2">
        <h4>Modules</h4>
        <a href="{{ route('module.create',['course_id'=>$course->id]) }}" class="btn btn-primary">Add New module</a>
    </div>
    
    <div class="container">
        @foreach ($course->modules as $module)
        <div class="card">
            <div class="card-body" style="color:black;">
                <h5 class="card-title text-uppercase">{{ $module->title }}</h5>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <b>Parent Course</b><br>
                        {{ $course->title }}
                    </div>
                    <div class="col-md-4">
                        <b>Instructed by</b><br>{{$course->instructor->name}}
                    </div>
                    <div class="col-md-4">
                        <b>Quizzes</b><br>
                        {{ $module->quizes->count() }}
                    </div>
                </div>
                <div class="card-text" >
                    <?php echo html_entity_decode($module->content); ?>
                </div>
                <div class="modal-footer">
                    <a href="{{route('module.show', $module->id)}}" class="btn btn-sm btn-primary me-3">Quizzes</a>
                    <a class="btn btn-sm btn-info me-3" href="{{ route('module.edit',$module->id) }}">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletemodules{{$module->id}}" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="modal fade" id="deletemodules{{$module->id}}" tabindex="-1" aria-labelledby="addmodulesLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete {{$module->name}} module</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('module.destroy',$module->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this module?</p>
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
@extends('layouts.app',['title'=>'quizs'])
@section('content')
<div class="container mt-3" style="min-height:80vh;">
    <div class="d-flex justify-content-between mb-2">
        <h4>{{ $module->title }} Quizzes</h4>
        <a href="{{ route('quiz.create',['module_id'=>$module->id]) }}" class="btn btn-primary">Add New quiz</a>
    </div>
    
    <div class="container">
        @foreach ($module->quizes as $quiz)
        <div class="card">
            <div class="card-body" style="color:black;">
                <h5 class="card-title text-uppercase">{{ $quiz->title }}</h5>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <b>Parent module</b><br>
                        {{ $module->title }}
                    </div>
                    <div class="col-md-4">
                        <b>Instructed by</b><br>{{$module->course->instructor->name}}
                    </div>
                    <div class="col-md-4">
                        <b>Questions</b><br>
                        {{ $quiz->questions->count() }}
                    </div>
                </div>
                <div class="card-text" id="description-{{$quiz->id}}">
                    <?php echo html_entity_decode($quiz->description); ?>
                </div>
                <div class="modal-footer">
                    <a href="{{route('quiz.show', $quiz->id)}}" class="btn btn-sm btn-primary me-2">Questions</a>
                    <a class="btn btn-sm btn-info me-2" href="{{ route('quiz.edit',$quiz->id) }}">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletequizs{{$quiz->id}}" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="modal fade" id="deletequizs{{$quiz->id}}" tabindex="-1" aria-labelledby="addquizsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete {{$quiz->name}} Quiz</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('quiz.destroy',$quiz->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this quiz?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
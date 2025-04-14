@extends('layouts.app', ['title' => 'Questions'])
@section('content')
    <div class="container mt-3" style="min-height:80vh;">
        <div class="d-flex justify-content-between mb-2">
            <h4>{{ $quiz->title }} Questions</h4>
            <a href="{{ route('question.create', ['quiz_id' => $quiz->id]) }}" class="btn btn-primary"><i
                    class="fa fa-plus"></i> Question</a>
        </div>

        <div class="container">
            {{ $quiz->description }}
            @if($quiz->questions->count() > 0)
                <form action="{{ route('attempt.store') }}" method="post" name="attempt">
                    @csrf
                    @foreach ($quiz->questions as $key => $question)
                        <div class="card">
                            <div class="card-body" style="color:black;">
                                <div class="card-text" id="description-{{$question->id}}">
                                    <div class="d-flex justify-content-between">
                                        <b>Question {{ $key + 1 }}</b>
                                        <div>
                                            <a href="{{ route('question.edit', $question->id)}}"
                                                class="fa fa-pen text-primary me-2"></a>
                                            <i class="fa fa-trash text-danger me-2" type="button" data-bs-toggle="modal"
                                                data-bs-target="#deletequestions{{$question->id}}"></i>
                                            <i class="fa fa-plus text-success" type="button" data-bs-toggle="modal"
                                                data-bs-target="#addanswers{{$question->id}}"></i>
                                        </div>
                                    </div>
                                    <?php        echo html_entity_decode($question->question); ?>
                                    <div class="offset-2">
                                        <input type="hidden" name="question[]" value="{{ $question->id }}">
                                        @foreach ($question->answers as $answer)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="{{ $answer->id }}"
                                                    name="answer[{{ $question->id }}][]" {{ old('answer[]') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="answer">
                                                    {{ $answer->answer}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                    @endforeach
            @endif
        </div>
    </div>
    @foreach ($quiz->questions as $question)
        <div class="modal fade" id="deletequestions{{$question->id}}" tabindex="-1" aria-labelledby="addquestionsLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete question</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('question.destroy', $question->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this question?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addanswers{{$question->id}}" tabindex="-1" aria-labelledby="addanswersLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{route('answer.store', ['question_id' => $question->id])}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add answers</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="answer">Answer</label>
                                <input type="text" class="form-control" id="answer" name="answer" required>
                            </div>
                            <div class="ps-3 form-check">
                                <input class="form-check-input" type="checkbox" name="correct_answer" id="correct_answer"
                                    value="1" style="margin-right: 0px;">
                                <label class="form-check-label" for="correct_answer">Correct?</label>
                                <small id="correct_answerHelp" class="form-text text-muted">Tick this if the answer
                                    is correct.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Answer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
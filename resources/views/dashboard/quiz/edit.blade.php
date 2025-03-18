@extends('layouts.dashboard', ['title' => 'Edit Quiz'])
@section('dashboard')
    <div class="container">
        <form action="{{route('quiz.store', ['lesson_id' => $lesson_id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="description" class="form-label"><b>Description</b></label>
                    <textarea class="form-control" id="post" name="description" rows="3" maxlength="3">{{ $quiz->description }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
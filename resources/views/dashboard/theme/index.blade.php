@extends('layouts.app',['title'=>'themes'])
@section('content')
<div class="container mt-3" style="min-height:80vh;">
    <div class="d-flex justify-content-between mb-2">
        <h4>Themes</h4>
        <a href="{{ route('theme.create') }}" class="btn btn-info">Add New theme</a>
    </div>
    
    <div class="container">
        @foreach ($themes as $theme)
        <div class="card">
            <div class="card-body" style="color:black;">
                <h5 class="card-title text-uppercase">{{ $theme->title }}</h5>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <b>Duration</b><br>
                        {{ $theme->duration }} days
                    </div>
                    <div class="col-md-4">
                        <b>Managed by</b><br>{{$theme->author->name}}
                    </div>
                    <div class="col-md-4">
                        <b>Courses</b><br>
                        {{ $theme->courses->count() }}
                    </div>
                </div>
                <div class="card-text">
                    <?php echo html_entity_decode($theme->description); ?>
                </div>
                <div class="modal-footer">
                    <a href="{{route('theme.show', $theme->id)}}" class="btn btn-sm btn-primary me-3">Courses</a>
                    <a class="btn btn-sm btn-info me-3" href="{{ route('theme.edit',$theme->id) }}">Edit</a>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletethemes{{$theme->id}}" class="btn btn-sm btn-danger">Delete</button>
                </div>
            </div>
        </div>
        <hr>
        <div class="modal fade" id="deletethemes{{$theme->id}}" tabindex="-1" aria-labelledby="addthemesLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete {{$theme->name}} theme</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('theme.destroy',$theme->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            <p>Are you sure you want to delete this theme?</p>
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
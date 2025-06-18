@extends('layouts.index', ['title' => $module->course->title])
@section('content')
    <div class="container-fluid">
        <!-- Page Header Start -->
        <div class="container-fluid page-header p-5 my-4 mt-0 wow fadeIn" data-wow-delay="0.1s">
            <div class="container text-center">
                <h1 class="display-5 text-white animated slideInDown mb-4 text-uppercase">{{$module->course->title}}</h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb-item text-light active" aria-current="page"><a class="text-white"
                                href="/courses">Courses</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Page Header End -->
        <!-- Courses Start -->
        <div class="container-xxl">
            <div class="container-fluid" style="min-height: 70vh;;">
                <div class="row">
                    <div class="col-md-4 card p-3">
                        @foreach ($module->course->modules as $id => $mod)
                            <div class="form-check text-dark">
                                <input class="form-check-input" type="radio" disabled {{ $id <= $progress ? 'checked' : '' }}>
                                <label class="">
                                    {{$mod->title}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-md-8">
                        <div class="" id='printable'>
                            <h2>{{ $module->title }}</h2>
                            <div class="text-dark p-2">
                                <?php echo html_entity_decode($module->content);?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            @if (isset($module->previous))
                                <a class='btn btn-outline-primary border-2'
                                    href='/course/study/{{ $module->previous->slug }}'>Previous
                                    Lesson</a>
                            @endif

                            @if (isset($module->next))
                                <a class='btn btn-outline-primary border-2'
                                    href='/course/study/{{ $module->next->slug }}?next=true'>Next Lesson</a>
                            @endif
                        </div>
                        <div class="text-end">
                            <button class="btn btn-secondary" onclick="printPage()">Print</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printPage() {
            var printContents = document.getElementById('printable').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();// Reload to restore the original content
        }
    </script>
@endsection
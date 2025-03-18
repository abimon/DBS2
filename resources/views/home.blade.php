@extends('layouts.app', ['title' => 'Dashboard'])

@section('content')
    <div class="container">
        <!-- Summary Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-md-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-book fa-3x text-dark"></i>
                        <div class="ms-3">
                            <p class="mb-2">Available Courses</p>
                            <h6 class="mb-0">10</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-address-card fa-3x text-dark"></i>
                        <div class="ms-3">
                            <p class="mb-2">Enrolled Courses</p>
                            <h6 class="mb-0">3</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-book-open fa-3x text-dark"></i>
                        <div class="ms-3">
                            <p class="mb-2">Assignments Due</p>
                            <h6 class="mb-0"></h6>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- Summary End -->
    </div>
@endsection
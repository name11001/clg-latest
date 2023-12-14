@extends('admin.layouts.app')
@section('title')
    <title>Admin Dashboard</title>
@endsection
@section('content')
<div class="container">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/ </span>All Information</h4></div>
<div class="col-12 order-3 order-md-2">
    <div class="row d-flex">
      <div class="col-5 mb-4 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">

                <img src="{{asset("images/teacher.png")}}" alt="Credit Card" class="rounded" height="80px" width="80" />
                <h5 class="d-block mb-1">All Teacher</h5>

              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt4"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="{{route('info')}}">View More</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Total</span>
            {{-- <h3 class="card-title text-nowrap mb-2">{{$teachers}}</h3> --}}
          </div>
        </div>
      </div>

      <div class="col-5 mb-4 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">

                <img src="{{asset("images/education.png")}}" alt="Credit Card" class="rounded" height="80px" width="80px" />
                <h5 class="d-block mb-1">All Students</h5>

              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt4"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="{{route('studentinfo')}}">View More</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Total</span>
            {{-- <h3 class="card-title text-nowrap mb-2">{{$students}}</h3> --}}
          </div>
        </div>
      </div>

      <div class="col-5 mb-4 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">

                <img src="{{asset("images/subscribe.png")}}" alt="Credit Card" class="rounded" height="80px" width="80px" />
                <h5 class="d-block mb-1">All Subscribers</h5>

              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt4"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="{{route('user.sub.info')}}">View More</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Total</span>
            {{-- <h3 class="card-title text-nowrap mb-2">{{$subscribe}}</h3> --}}
          </div>
        </div>
      </div>

      <div class="col-5 mb-4 mx-auto">
        <div class="card">
          <div class="card-body">
            <div class="card-title d-flex align-items-start justify-content-between">

                <img src="{{asset("images/subscribe.png")}}" alt="Credit Card" class="rounded" height="80px" width="80px" />
                <h5 class="d-block mb-1">All RequestQuote</h5>

              <div class="dropdown">
                <button
                  class="btn p-0"
                  type="button"
                  id="cardOpt4"
                  data-bs-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                  <a class="dropdown-item" href="{{route('req.info')}}">View More</a>
                </div>
              </div>
            </div>
            <span class="d-block mb-1">Total</span>
            {{-- <h3 class="card-title text-nowrap mb-2">{{$req}}</h3> --}}
          </div>
        </div>
      </div>

    </div>
</div>
</div>
@endsection

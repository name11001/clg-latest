@extends('admin.layouts.app')
@section('title')
    <title>All Teachers Information</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    @if (session('message'))
    <div class="col-md mb-4 mb-md-0">
          <div class="card-body">
            <div class="alert alert-success alert-dismissible" role="alert">
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
          </div>
        </div>
      </div>
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="col-md mb-4 mb-md-0">
              <div class="card-body">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{$error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
            @endif
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span>Teachers Information</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">All Teachers Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($teachers as $teacher)
                <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->name}}</td>
                <td>{{$teacher->department}}</td>
                <td>{{$teacher->email}}</td>
                <td>{{$teacher->phone}}</td>
                <td><img src="{{ asset('storage/' . $teacher->image)}}" height="70px" width="70px"></td>
                <td>
                    <a href="{{route('teachersedit', $teacher->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('deleteprofile', $teacher->id)}}" class="btn btn-danger">Delete</a>
                </td>
                </tr>

                @endforeach


              </tr>

            </tbody>
            {{ $teachers->links() }}
          </table>
        </div>
      </div>
    </div>
@endsection


@extends('admin.layouts.app')
@section('title')
    <title>All Students Information</title>
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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span>Students Information</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">All Student Information</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>college Id</th>
                <th>Image</th>
                <th>name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->college_id}}</td>
                    <td><img src="{{ asset('storage/' . $student->image)}}" height="70px" width="70px"></td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->gender}}</td>
                    <td>
                        <a href="{{route('edit.student',$student->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{route('destroy', $student->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                @endforeach
                {{ $students->links() }}
            </tbody>
          </table>

        </div>
      </div>
@endsection


@extends('admin.layouts.app')
@section('title')
    <title> Request Qutoe</title>
@endsection
@section('content')
<div class="content-wrapper">
    <p class="alert-success">
        <?php
        $message=Session::get('message');
        if($message)
        {
            echo $message;
            Session::put('message',null);
        }
        ?>
    </p>

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4">Pages/ <span class="text-muted fw-light">RequestQuote</h4>

      <!-- Basic Bootstrap Table -->
      <div class="card">
        <h5 class="card-header">All Subscribe</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">First Name</th>
                <th class="text-center">last Name</th>
                <th class="text-center">Course Name</th>
                <th class="text-center">Phone</th>

                <th>Actions</th>
              </tr>
            </thead>
            @foreach($requestinfo as $reqinfo)
            <tbody class="table-border-bottom-0">
                <td class="text-center">{{ $reqinfo->first_name }}</td>
                <td class="text-center">{{ $reqinfo->last_name }}</td>
                <td class="text-center">{{$reqinfo->course_name}}</td>
                <td class="text-center">{{ $reqinfo->phone }}</td>

                <td>
                    <a href="{{route('destroy.req', $reqinfo->id)}}" class="btn btn-danger" class="text-center">Delete</a>
                </td>
              <tr>

              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
@endsection

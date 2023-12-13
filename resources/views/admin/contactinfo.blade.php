@extends('admin.layouts.app')
@section('title')
    <title>Contact Info</title>
@endsection

@section('content')
<div class="content-wrapper">
    <?php
                        $message=Session::get('message');
                        if($message)
                        {
                            echo $message;
                            Session::put('message',null);
                        }
                        ?>
    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></h4>

      <!-- Basic Bootstrap Table -->

      <div class="card">
        <h5 class="card-header">Contact Info</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Subject</th>
                <th style="text-align: center">Message</th>
                <th>Actions</th>
              </tr>
            </thead>
            @foreach($all_contactinfo_info as $v_contactinfo)
            <tbody class="table-border-bottom-0">
                <td style="text-align: center">{{ $v_contactinfo->name }}</td>
                <td style="text-align: center">{{ $v_contactinfo->email }}</td>
                <td style="text-align: center">{{ $v_contactinfo->subject }}</td>
                <td style="text-align: center">{{ $v_contactinfo->message }}</td>

                <td>
                    <a href="{{url('deletecontactinfo', $v_contactinfo->email)}}" class="btn btn-danger">Delete</a>
                </td>
              <tr>

              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
@endsection

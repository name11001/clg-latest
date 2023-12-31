@extends('admin.layouts.app')
@section('title')
<title>Student Dashboard</title>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->
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
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Student </h4>
    <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Add New Student</h5>
        <small class="text-muted float-end">St</small>
      </div>
      <div class="card-body">
        <form  class="row g-3" action="{{ route('add.new.student') }}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="mb-3 col-md-6">
            <label class="form-label" for="basic-icon-default-fullname">College id</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-fullname2" class="input-group-text"
                ><i class='bx bxs-id-card'></i></span>
              <input
                type="text"
                class="form-control"
                id="basic-icon-default-fullname"
                placeholder="Enter your College Id"
                aria-label="id"
                aria-describedby="basic-icon-default-fullname2"
                value="{{old('college_id')}}" name="college_id"
              />
            </div>
          </div>
          <div class="mb-3 col-md-6 ">
            <label class="form-label" for="basic-icon-default-company">Full Name</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-company2" class="input-group-text"
                ><i class='bx bxs-user'></i></span>
              <input
                type="text"
                id="basic-icon-default-company"
                class="form-control"
                placeholder="Full Name"
                aria-label="Full Name"
                aria-describedby="basic-icon-default-company2"
                name="name" value="{{old('name')}}"
              />
            </div>
          </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="basic-icon-default-fullname">Father's Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-fullname2" class="input-group-text"
                    ><i class='bx bxs-user'></i></span>
                  <input
                    type="text"
                    class="form-control"
                    id="basic-icon-default-fullname"
                    placeholder="Father Name"
                    aria-label="Father Name"
                    aria-describedby="basic-icon-default-fullname2"
                    name="f_name" value="{{old('f_name')}}"
                  />
                </div>
              </div>
              <div class="mb-3 col-md-6 ">
                <label class="form-label" for="basic-icon-default-company">Mother's Name</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class='bx bxs-user'></i></span>
                  <input
                    type="text"
                    id="basic-icon-default-company"
                    class="form-control"
                    placeholder="Mother Name"
                    aria-label="Mother Name"
                    aria-describedby="basic-icon-default-company2"
                    name="m_name" value="{{old('m_name')}}"
                  />
                </div>
              </div>

          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Address</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class='bx bxs-building-house'></i></span>
              <input
                type="text"
                id="basic-icon-default-email"
                class="form-control"
                placeholder="Address"
                aria-label=""
                aria-describedby="basic-icon-default-email2"
                name="address" value="{{old('address')}}"
              />
              <span id="basic-icon-default-email2" class="input-group-text">Home Address</span>
            </div>
            <div class="form-text">You can use letters, numbers</div>
          </div>

          <div class="mb-3 col-md-6">
            <label class="form-label" for="basic-icon-default-phone">Phone No</label>
            <div class="input-group input-group-merge">
              <span id="basic-icon-default-phone2" class="input-group-text"
                ><i class="bx bx-phone"></i
              ></span>
              <input
                type="text"
                id="basic-icon-default-phone"
                class="form-control phone-mask"
                placeholder="+880"
                aria-label="+880"
                aria-describedby="basic-icon-default-phone2"
                name="phone" value="{{old('phone')}}"
              />
            </div>
        </div>

        <div class="mb-3 col-md-6">
            <label for="gender" class="form-label">Gender:</label>
            <select  class="form-select" name="gender" id="gender" aria-label="Default select example">
              <option selected>select Gender</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="basic-icon-default-email">Email</label>
            <div class="input-group input-group-merge">
              <span class="input-group-text"><i class="bx bx-envelope"></i></span>
              <input
                type="text"
                id="basic-icon-default-email"
                class="form-control"
                placeholder="@example.com"
                aria-label="@example.com"
                aria-describedby="basic-icon-default-email2"
                name="email" value="{{old('email')}}" required
              />
              <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
            </div>
            <div class="form-text">You can use letters, numbers & periods</div>
          </div>
            <div>
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" type="file" name="image" id="image"  required/>
            @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
          </div>


          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Add New Student</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

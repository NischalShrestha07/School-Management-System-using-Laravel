@extends('student.layout')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
{{-- problem --}}
@endsection
@section('content')


<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Change Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('student.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">

                        {{-- tthese Session are used to print the success notice above for success --}}
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                      @endif

                        {{-- tthese Session are used to print the success notice above  for errors--}}
                        @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{Session::get('error')}}
                        </div>
                        @endif




                        <div class="card-header">
                            <h3 class="card-title">Update Password</h3>
                        </div>


                        <form action="{{route('student.updatePassword')}}" method="POST">
                            @csrf
                            <div class="card-body row">
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Old Password</label>
                                    <input type="password" class="form-control" name='oldPassword' id="exampleInputEmail1"
                                        placeholder="Enter Old Password">

                                        @error('oldPassword')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" class="form-control" name='newPassword' id="exampleInputEmail1"
                                        placeholder="Enter New Password">

                                        @error('newPassword')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" class="form-control" name='confirmPassword' id="exampleInputEmail1"
                                        placeholder="Enter Confirm Password">

                                        @error('confirmPassword')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                    </div>





                </div>




            </div>

        </div>
    </section>

</div>
@endsection
@section(' customJs') <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<script>
    $(function () {
    bsCustomFileInput.init();
  });
@endsection

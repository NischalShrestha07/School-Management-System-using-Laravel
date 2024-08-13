@extends('admin.layout')
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
                    <h1> Update Teacher</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Teacher</li>
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

                        {{-- these Session are used to print the success notice above --}}
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif


                        <div class="card-header">
                            <h3 class="card-title">Update Teacher</h3>
                        </div>


                        <form action="{{route('teacher.update',$teacher->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Teacher Name </label>
                                        <input type="text" class="form-control" name='name' id="exampleInputEmail1"
                                            placeholder="Enter Teacher name" value="{{old('name',$teacher->name)}}">

                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Teacher's Father Name </label>
                                        <input type="text" class="form-control" name='father_name'
                                            id="exampleInputEmail1" placeholder="Enter Teacher's Father Name" value="{{old('father_name',$teacher->father_name)}}">

                                        @error('father_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Teacher Mother's Name </label>
                                        <input type="text" class="form-control" name='mother_name'
                                            id="exampleInputEmail1" placeholder="Enter Teacher's Mother Name" value="{{old('mother_name',$teacher->mother_name)}}">

                                        @error('mother_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Date of Birth</label>
                                        <input type="date" class="form-control" name='dob' id="exampleInputEmail1" value="{{old('dob',$teacher->dob)}}">

                                        @error('dob')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Mobile Number </label>
                                        <input type="text" class="form-control" name='mobno' id="exampleInputEmail1"
                                            placeholder="Enter Teachers Mobile No." value="{{old('mobno',$teacher->mobno)}}">

                                        @error('mobno')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email Address </label>
                                        <input type="text" class="form-control" name='email' id="exampleInputEmail1" placeholder="Enter Email Address"
                                            value="{{old('email',$teacher->email)}}">

                                        @error('email')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror

                                    </div>

                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Teacher</button>
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

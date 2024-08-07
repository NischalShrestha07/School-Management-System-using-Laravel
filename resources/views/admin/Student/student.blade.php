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
                    <h1> Create Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Create Student</li>
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

                        {{-- tthese Session are used to print the success notice above --}}
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif


                        <div class="card-header">
                            <h3 class="card-title">Add Student</h3>
                        </div>


                        <form action="{{route('student.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Select Class</label>
                                        <select name="class_id" class="form-control" id="">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $class)
                                            <option value="{{$class->id}}">{{$class->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('class_id')
                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Admission Date</label>
                                        <input type="date" class="form-control" name="admission_date">

                                        @error('admission_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Select Fee Head</label>
                                        <select name="feehead_id" class="form-control" id="">
                                            <option value="" disabled selected>Select Fee Head</option>
                                            @foreach ($feehead as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('feehead_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student Name </label>
                                        <input type="text" class="form-control" name='name' id="exampleInputEmail1"
                                            placeholder="Enter Student name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student's Father Name </label>
                                        <input type="text" class="form-control" name='father_name'
                                            id="exampleInputEmail1" placeholder="Enter Student's Father Name:">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Student Mother's Name </label>
                                        <input type="text" class="form-control" name='mother_name'
                                            id="exampleInputEmail1">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1"> Date of Birth</label>
                                        <input type="date" class="form-control" name='dob' id="exampleInputEmail1"
                                            placeholder="Enter July Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Mobile Number </label>
                                        <input type="text" class="form-control" name='mobno' id="exampleInputEmail1"
                                            placeholder="Enter August Fee">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Email Address </label>
                                        <input type="text" class="form-control" name='email' id="exampleInputEmail1"
                                            placeholder="Enter Email Address">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Create Password</label>
                                        <input type="text" class="form-control" name='password' id="exampleInputEmail1"
                                            placeholder="Enter Password">
                                    </div>

                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Add Student</button>
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
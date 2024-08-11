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
                    <h1> Subject Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Subject Details</li>
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
                            <h3 class="card-title">Update Subject</h3>
                        </div>


                        <form action="{{route('subject.update',$subjects->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject</label>
                                    <input type="text" class="form-control" value="{{old('name',$subjects->name)}}"
                                        name='name' id="exampleInputEmail1" placeholder="Enter Subject">
                                        @error('name')
                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subject Type</label>
                                    {{-- <input type="text" class="form-control" value="{{old('name',$subjects->type)}}"
                                        name='type' id="exampleInputEmail1" placeholder="Enter Subject Type"> --}}
                                        <select name="type" class="form-control" id="">
                                            <option value="theory" {{$subjects->type}}>Theory</option>
                                            <option value="practical" {{$subjects->type}}>Practical</option>
                                        </select>
                                        @error('type')
                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Subject</button>
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

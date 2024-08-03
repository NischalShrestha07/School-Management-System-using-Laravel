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
                    <h1> Fee Structure</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Fee structure</li>
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
                            <h3 class="card-title">Update Fee Structure</h3>
                        </div>


                        <form action="{{route('feestructure.update',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Select Class</label>
                                        <select name="class_id" class="form-control" id="">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $item)
                                            <option value="{{$item->id}}" {{ old('class_id', $data->
                                                class_id) == $item->id ? 'selected' : '' }}>{{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('class_id')
                                        <p class="text-danger">{{$message}}</p>

                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control" id="">
                                            <option value="" disabled selected>Select Academic Year</option>
                                            @foreach ($academic_year as $item)
                                            <option value="{{$item->id}}" {{ old('academic_year_id', $data->
                                                academic_year_id) == $item->id ? 'selected' : '' }}> {{$item->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                        {{-- ///here is the problem --}}
                                        @error('academic_year_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Select Fee Head</label>
                                        <select name="feehead_id" class="form-control" id="">
                                            <option value="" disabled selected>Select Fee Head</option>
                                            @foreach ($feehead as $item)
                                            <option value="{{$item->id}}" {{ old('feehead_id', $data->feehead_id) ==
                                                $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('feehead_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">April Fee </label>
                                        <input type="text" class="form-control" name='april'
                                            value="{{old('april',$data->april)}}" id="exampleInputEmail1"
                                            placeholder="Enter April Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">May Fee </label>
                                        <input type="text" class="form-control" name='may'
                                            value="{{old('may',$data->may)}}" id="exampleInputEmail1"
                                            placeholder="Enter May Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">June Fee </label>
                                        <input type="text" class="form-control" name='june'
                                            value="{{old('june',$data->june)}}" id="exampleInputEmail1"
                                            placeholder="Enter June Fee">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">July Fee </label>
                                        <input type="text" class="form-control" name='july'
                                            value="{{old('july',$data->july)}}" id="exampleInputEmail1"
                                            placeholder="Enter July Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">August Fee </label>
                                        <input type="text" class="form-control" name='august'
                                            value="{{old('august',$data->august)}}" id="exampleInputEmail1"
                                            placeholder="Enter August Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">September Fee </label>
                                        <input type="text" class="form-control" name='september'
                                            value="{{old('september',$data->september)}}" id="exampleInputEmail1"
                                            placeholder="Enter September Fee">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">October Fee </label>
                                        <input type="text" class="form-control" name='october'
                                            value="{{old('october',$data->october)}}" id="exampleInputEmail1"
                                            placeholder="Enter October Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">November Fee </label>
                                        <input type="text" class="form-control" name='november'
                                            value="{{old('november',$data->november)}}" id="exampleInputEmail1"
                                            placeholder="Enter November Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">December Fee </label>
                                        <input type="text" class="form-control" name='december'
                                            value="{{old('december',$data->december)}}" id="exampleInputEmail1"
                                            placeholder="Enter December Fee">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">January Fee </label>
                                        <input type="text" class="form-control" name='january'
                                            value="{{old('january',$data->january)}}" id="exampleInputEmail1"
                                            placeholder="Enter January Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">February Fee </label>
                                        <input type="text" class="form-control" name='february'
                                            value="{{old('february',$data->february)}}" id="exampleInputEmail1"
                                            placeholder="Enter February Fee">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">March Fee </label>
                                        <input type="text" class="form-control" name='march'
                                            value="{{old('march',$data->march)}}" id="exampleInputEmail1"
                                            placeholder="Enter March Fee">
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Fee Structure</button>
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
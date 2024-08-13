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
                    <h1> Update Assign Subject</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"> Update Assign Subject</li>
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
                            <h3 class="card-title">Update Assign Subject</h3>
                        </div>


                        <form action="{{route('assignSubject.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                               <div class="form-group">
                                <select name="class_id" id="" class="form-control">
                                    <option value="" disabled selected>Select Class</option>
                                    @foreach ($classes as $item)
                                    <option value="{{$item->id}}" {{$assignSubject->class_id == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('class_id')
                                <p class="text-danger">{{$message}}</p>

                                @enderror
                               </div>
                               <div class="form-group">
                                    <select name="subject_id" id="" class="form-control">
                                        <option value="" disabled selected>Select Subject</option>
                                        @foreach ($subjects as $item)
                                        <option value="{{$item->id}}" {{$assignSubject->subject_id== $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>


                                    @error('subject_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>




                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

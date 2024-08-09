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
                    <h1> Update Student</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Update Student</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    -<div class="card card-primary">

                        {{-- these Session are used to print the success notice above --}}
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif


                        <div class="card-header">
                            <h3 class="card-title">Update Student</h3>
                        </div>
                        <form action="{{ route('student.update', $students->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <!-- Class Selection -->
                                    <div class="form-group col-md-4">
                                        <label for="">Select Class</label>
                                        <select name="class_id" class="form-control">
                                            <option value="" disabled selected>Select Class</option>
                                            @foreach ($classes as $item)
                                            <option value="{{ $item->id }}" {{ old('class_id', $students->class_id) ==
                                                $item->id ? 'selected' :
                                                '' }}>
                                                {{ $item->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Academic Year Selection -->
                                    <div class="form-group col-md-4">
                                        <label for="">Select Academic Year</label>
                                        <select name="academic_year_id" class="form-control">
                                            <option value="" disabled selected>Select Academic Year</option>
                                            @foreach ($academic_year as $year)
                                            <option value="{{ $year->id }}" {{ old('academic_year_id', $students->
                                                academic_year_id) == $year->id
                                                ? 'selected' : '' }}>
                                                {{ $year->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('academic_year_id')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Admission Date -->
                                    <div class="form-group col-md-4">
                                        <label for="">Admission Date</label>
                                        <input type="date" class="form-control" name="admission_date"
                                            value="{{ old('admission_date', $students->admission_date) }}">
                                        @error('admission_date')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Student Name -->
                                    <div class="form-group col-md-4">
                                        <label for="name">Student Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="Enter Student Name" value="{{ old('name', $students->name) }}">
                                        @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Father's Name -->
                                    <div class="form-group col-md-4">
                                        <label for="father_name">Student's Father Name</label>
                                        <input type="text" class="form-control" name="father_name" id="father_name"
                                            placeholder="Enter Father's Name"
                                            value="{{ old('father_name', $students->father_name) }}">
                                        @error('father_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Mother's Name -->
                                    <div class="form-group col-md-4">
                                        <label for="mother_name">Student's Mother Name</label>
                                        <input type="text" class="form-control" name="mother_name" id="mother_name"
                                            placeholder="Enter Mother's Name"
                                            value="{{ old('mother_name', $students->mother_name) }}">
                                        @error('mother_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Date of Birth -->
                                    <div class="form-group col-md-4">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" id="dob"
                                            value="{{ old('dob', $students->dob) }}">
                                        @error('dob')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Mobile Number -->
                                    <div class="form-group col-md-4">
                                        <label for="mobno">Mobile Number</label>
                                        <input type="text" class="form-control" name="mobno" id="mobno"
                                            placeholder="Enter Mobile Number"
                                            value="{{ old('mobno', $students->mobno) }}">
                                        @error('mobno')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- Email Address -->
                                    <div class="form-group col-md-4">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Enter Email Address"
                                            value="{{ old('email', $students->email) }}">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Password -->
                                    <div class="form-group col-md-4">
                                        <label for="password">Create Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Enter Password">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update Student</button>
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
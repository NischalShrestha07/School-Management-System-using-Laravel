@extends('admin.layout')
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@endsection
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Fee Structure </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Fee Structure List</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>

                        @endif
                        <div class="card-header">
                            <h3 class="card-title">List of Fee Structure and Features</h3>

                            <form action="">
                                <div class="form-group col-md-4">
                                    <label for="">Select Class</label>
                                    <select name="class_id" class="form-control" id="">
                                        <option value="" disabled selected>Select Class</option>
                                        @foreach ($classes as $item)
                                        <option value="{{$item->id}}" {{$item->id == request('class_id') ?
                                            'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="">Select Academic Year</label>
                                    <select name="academic_year_id" class="form-control" id="">
                                        <option value="" disabled selected>Select Academic Year</option>
                                        @foreach ($academic_year as $item)
                                        <option value="{{$item->id}}" {{$item->id == request('academic_year_id') ?
                                            'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-md-4 form-group">
                                    <button class="btn btn-success" type="submit">Filter Data</button>
                                </div>
                            </form>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Academic Year</th>
                                        <th>Class</th>
                                        {{-- <th>Fee Head</th> --}}
                                        <th>April</th>
                                        <th>May</th>
                                        <th>June</th>
                                        <th>July</th>
                                        <th>August</th>
                                        <th>September</th>
                                        <th>October</th>
                                        <th>November</th>
                                        <th>December</th>
                                        <th>January</th>
                                        <th>February</th>
                                        <th>March</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feestructure as $item)

                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->AcademicYear->name}}</td>
                                        <td>{{$item->Classes->name}}</td>
                                        {{-- <td>{{$item->FeeHead->name}}</td> --}}
                                        {{-- <td>{{$item->created_at}}</td> --}}
                                        <td>{{$item->april}}</td>
                                        <td>{{$item->may}}</td>
                                        <td>{{$item->june}}</td>
                                        <td>{{$item->july}}</td>
                                        <td>{{$item->august}}</td>
                                        <td>{{$item->september}}</td>
                                        <td>{{$item->october}}</td>
                                        <td>{{$item->november}}</td>
                                        <td>{{$item->december}}</td>
                                        <td>{{$item->january}}</td>
                                        <td>{{$item->february}}</td>
                                        <td>{{$item->march}}</td>
                                        {{-- <td>{{$item->created_at}}</td> --}}
                                        <td><a class="btn btn-primary" style="padding: 14px 35px"
                                                href="{{route('feestructure.edit',$item->id)}}">Edit
                                            </a>
                                        </td>

                                        <td>
                                            <form class="btn btn-danger"
                                                action="{{route('feestructure.delete',$item->id)}}"
                                                onclick="return confirm('Are You sure want to delete item?')"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>
@endsection
@section('customJs')
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>

<script src="dist/js/demo.js"></script>

<script>
    $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection

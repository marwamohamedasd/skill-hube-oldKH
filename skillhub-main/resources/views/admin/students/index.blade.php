@extends('admin.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">students</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a  class="btn btn-info"href="{{URL("/")}}">site</a></li>
                <li class="breadcrumb-item"><a href="{{url('dashboard/exams')}}">Exams</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

            <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Bordered Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>verified</th>
                            <th>Action</th>
                        </tr>


                        @foreach($students as $student)

                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->email}}</td>


                            <td>
                                @if($student->email_verified_at !==Null)
                                   <span class="badge bg-success">Yes</span>
                                @else
                                <span class="badge bg-danger">No</span>

                               @endif

                            </td>
<td>
   <a href="{{url("/dashboard/students/show-scores/{$student->id}")}}" class="btn btn-sm btn-success">


    <i class="fas fa-percent"></i>
   </a>
</td>
</tr>
                        @endforeach

                  </tbody>

                </table>

                {{-- <a href="{{url("dashboard/exams/show-questions/$student->id/questions")}}" class="btn btn-sm btn-success">show Questions</a> --}}
                <a href="{{url()->previous()}}" class="btn btn-sm btn-primary">back</a>
            </div>
                <!-- /.box-body -->
            </div>

              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection

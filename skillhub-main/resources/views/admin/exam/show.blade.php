@extends('admin.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$exam->name("en")}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
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
                            <th>Name (en)</th>
                            <td>{{$exam->name("en")}}</td>
                        </tr>
                        <tr>
                            <th>Name (ar)</th>
                            <td>{{$exam->name("ar")}}</td>
                        </tr>
                        <tr>
                            <th>desc (en)</th>
                            <td>{{$exam->desc("en")}}</td>
                        </tr>
                        <tr>
                            <th>Name (ar)</th>
                            <td>{{$exam->desc("ar")}}</td>
                        </tr>

                        <tr>
                            <th>image</th>
                            <td><img  src="{{asset("uploads/$exam->img")}}" height="50px"></td>
                        </tr>
                        <tr>
                            <th>diffculity</th>
                            <td>{{$exam->difficulty}}</td>
                        </tr>
                        <tr>
                            <th>duration_mind</th>
                            <td>{{$exam->duration_mins}}</td>
                        </tr>

                        <tr>
                            <th>Active</th>
                            <td>
                                @if($exam->active)
                                   <span class="badge bg-success">Yes</span>
                                @else
                                <span class="badge bg-danger">No</span>

                               @endif

                            </td>
                        </tr>

                  </tbody>

                </table>

                <a href="{{url("dashboard/exams/show-questions/$exam->id/questions")}}" class="btn btn-sm btn-success">show Questions</a>
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

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
                  <h3 class="box-title">{{$student->name}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name </th>
                            <th>score </th>
                            <th>time</th>
                            <th>At</th>
                            <th>status</th>
                            <th>open  Exam</th>
                        </tr>


                        @foreach($student->exams as $exam)

                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$exam->name("en")}}</td>
                            <td>{{$exam->pivot->score}}</td>
                            <td>{{$exam->pivot->time_mins}}</td>
                            <td>{{$exam->pivot->created_at}}</td>
                            <td>{{$exam->pivot->status}}</td>


                            <td>
                              @if($exam->pivot->status=='closed')
                                   <a href="{{url("dashboard/students/open-exam/{$student->id}/{$exam->id}")}}" class="btn btn-sm btn-success"><i class="fas fa-lock-open"></i></a>
@else

<a href="{{url("dashboard/students/close-exam/{$student->id}/{$exam->id}")}}" class="btn btn-sm btn-danger"><i class="fas fa-lock"></i></a>


                               @endif

                            </td>
{{-- <td>
   <a href="{{url("/")}}}" class="btn btn-sm btn-success">


    <i class="fas fa-percent"></i>
   </a>
</td> --}}
</tr>
                        @endforeach

                  </tbody>

                </table>

                <a href="{{url("dashboard/exams/show-questions/$student->id/questions")}}" class="btn btn-sm btn-success">show Questions</a>
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

@extends('admin.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">{{$exam->name("en")}} Questions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{url('dashboard/exams')}}">Exams</a></li>
                <li class="breadcrumb-item"><a href="{{url("dashboard/exams/show/$exam->id")}}"> show {{$exam->name("en")}}</a></li>
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
@include('admin.inc.errors')

</div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                          <th>ID</th>
                          <th>title</th>
                          <th>options</th>
                          <th>Right Answer</th>
                          <th>actions</th>
                        </tr>
                    </thead>
                 <tbody>
                       @foreach ($exam->questions as $ques)
                          <tr>
                          <td>{{$loop->iteration}}</td>

                         <td class="data-name-en">{{$ques->title}}</td>
                         <td class="data-name-en">
                            {{$ques->option_1}} |<br>
                            {{$ques->option_2}} |<br>
                            {{$ques->option_3}} |<br>
                            {{$ques->option_4}}

                        </td>
                        <td>{{$ques->right_ans}}</td>

<td>
                        <a href="{{url("dashboard/exams/edit-questions/{$exam->id}/{$ques->id}")}}" class="btn btn-sm btn-info">
                            <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{url("dashboard/exams/delete-questions/{$exam->id}/{$ques->id}")}}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                                </a>


                        </td>
                            {{-- <td>

             <a  href="{{url("dashboard/exams/delete/{$exam->id}")}}"  class="btn btn-sm btn-info ">
            <i class="fas fa-edit" ></i>
            </a>

             <a href="{{url("dashboard/exams/delete/{$exam->id}")}}" class="btn btn-sm btn-danger">
            <i class="fas fa-trash"></i>
            </a>

            <a href="{{url("dashboard/exams/toggle/{$exam->id}")}}" class="btn btn-sm btn-secondary">
            <i class="fas fa-toggle-on"></i>
            </a>

           </td> --}}

        </tr>

          @endforeach
     </tbody>
  </table>

                <a href="{{url()->previous()}}" class="btn btn-sm btn-success">Back</a>
                <a href="{{url("dashboard/exams")}}" class="btn btn-sm btn-primary">back to all Exams</a>
            </div>
                <!-- /.box-body -->

              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
</div>

    <!-- /.content -->
  </div>
  @endsection

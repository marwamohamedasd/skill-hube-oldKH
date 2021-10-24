@extends('admin.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row  offset-9 p-2">

          <div class="col-sm-6 offset- bg-info">
<a href="{{url("dashboard/admins/create")}}" class="btn  btn-info">Add New</a>

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

                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>subjcet</th>
                            <th>Action</th>
                        </tr>

   @foreach($messages as $message)

   <td>{{$loop->iteration}}</td>
   <td>{{$message->name}}</td>
   <td>{{$message->email}}</td>
   <td>{{$message->subject??"..."}}</td>


   <td>


  <a href="{{url("dashboard/messages/show/{$message->id}")}}" class="btn btn-sm btn-danger">
    <i class="fas fa-eye"></i>
    </a>
   </td>
</tr>


   @endforeach

  </tbody>
   </table>

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

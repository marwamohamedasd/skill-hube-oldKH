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
                            <th>Role</th>
                            <th>Verified</th>
                            <th>Action</th>
                        </tr>

   @foreach($admins as $admin)

   <td>{{$loop->iteration}}</td>
   <td>{{$admin->name}}</td>
   <td>{{$admin->email}}</td>
   <td>{{$admin->role->name}}</td>
   <td>

    @if($admin->email_verified_at !=Null)
      <span class="badge bg-success">yes</span>
       @else
      <span class="badge bg-danger">No</span>

      @endif
   </td>

   <td>
  @if($admin->role->name=="admin")
    <a href="{{url("dashboard/admins/prompt/{$admin->id}")}}" class="btn btn-sm btn-secondary"><i class="fas fa-level-up-alt"></i></a>

  @else

  <a href="{{url("dashboard/admins/deompt/{$admin->id}")}}" class="btn btn-sm btn-success"><i class="fas fa-level-down-alt"></i></a>

  @endif

  <a href="{{url("dashboard/admins/delete/{$admin->id}")}}" class="btn btn-sm btn-danger">
    <i class="fas fa-trash"></i>
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

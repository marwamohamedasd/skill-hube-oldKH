@extends('admin.layout')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row  offset-9 p-2">

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
                  <table class="table  bg-light table-bordered">
                    <tbody>
                        <tr>
                        <th>Name </th>
                        <td>{{$message->name}}</td>

                       </tr>
                        <tr>
                            <th>Email </th>
                            <td>{{$message->email}}</td>

                        </tr>
                        <tr>
                            <th>subjcet</th>
                            <td>{{$message->title??"..."}}</td>

                        </tr>
                         <tr>
                            <th>body</th>
                       <td>{{$message->body}}</td>

                       </tr>




                </tbody>
               </table>



               </div>
                <!-- /.box-body -->
               </div>
<h3>send Response</h3>
               @include('admin.inc.errors')
               <form method="post" action="{{url("dashboard/admins/messages/response/$message->id")}}">
                @csrf
           <div class="card-body">
         <div class="form-group">
           <label>Title</label>
           <input type="text" class="form-control" name="title">
         </div>

         <div class="form-group">
            <label>Body</label>
            <textarea rows="5"class="form-control" name="body"></textarea>
          </div>
    <div>
    <button type="submit" class="btn btn-success">submit</button>
    <a href="{{url()->previous()}}" class="btn btn-primary">back</a>

    </div>
</form>



</div>
</div>
</div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection

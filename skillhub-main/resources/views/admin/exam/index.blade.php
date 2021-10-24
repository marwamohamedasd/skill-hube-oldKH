@extends('admin/layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a  class="btn btn-info"href="{{URL("/")}}">site</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

<div class="row text-center">

</div>

      <div class="row ">
      <div class="col-md-4">

      </div>

          <div class="col-md-2 offset-6 ">
       <a  href="{{url('dashboard/exams/create')}}"type="button" class="btn btn-warning" >
add new
       </a>

     </div>

        <div class="col-xl-12 ">

            <div class="box">

            <div class="box-body table-responsive no-padding">


    <div class="row">
        <div class="col-md-12">
            @include('admin.inc.errors')
        </div>
    </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                      <th>ID</th>
                      <th>Name(en)</th>
                      <th>Name(ar)</th>
                      <th>Image</th>
                      <th>skill</th>
                      <th>Question no</th>
                      <th>active</th>
                      <th>actions</th>
                    </tr>
                </thead>
             <tbody>
                   @foreach ($exams as $exam)
                      <tr>
                      <td>{{$loop->iteration}}</td>

       {{-- <td class="data-name-ar">{{$exam->name("en")}}</td> --}}
       <td class="data-name-en">{{$exam->name("en")}}</td>
       <td class="data-name-en">{{$exam->name("ar")}}</td>
       <td class="data-name-en"><img src="{{asset("uploads/$exam->img")}}" height="50px"></td>
       <td>
       @if($exam->active)
       <span class="badge bg-success">Yes</span>
       @else
       <span class="badge bg-danger">No</span>
       </td>
       @endif

       <td>{{$exam->questions_no}}</td>
       <td>


        <a  href="{{url("dashboard/exams/show/{$exam->id}")}}"  class="btn btn-sm btn-info ">
            <i class="fas fa-eye" ></i>
         </a>


        <a  href="{{url("dashboard/exams/show-questions/{$exam->id}/questions")}}"  class="btn btn-sm btn-success ">
            <i class="fas fa-question" ></i>
         </a>

         <a  href="{{url("dashboard/exams/edit/{$exam->id}")}}"  class="btn btn-sm btn-info ">
        <i class="fas fa-edit" ></i>
        </a>

         <a href="{{url("dashboard/exams/delete/{$exam->id}")}}" class="btn btn-sm btn-danger">
        <i class="fas fa-trash"></i>
        </a>

        <a href="{{url("dashboard/exams/toggle/{$exam->id}")}}" class="btn btn-sm btn-secondary">
        <i class="fas fa-toggle-on"></i>
        </a>



       </td>

    </tr>
                   @endforeach
                  </tbody>
                  </table>
              </table>
              <div class="d-flex justify-content-center my-3">
              {{$exams->links()}}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  {{-- add new exam modal --}}

  {{-- <div class="modal modal-warning fade" id="add-modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">

              <form action="{{url('dashboard/exams/store')}}" method="post" id="add-exam" enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label >Name(en)</label>
                  <input type="text"  name="name_en"class="form-control"  >
                </div>

                <div class="form-group">
                  <label>Name(ar)</label>
                  <input type="text"  name="name_ar"class="form-control" >
                </div>


                <div class="form-group">
                 <label >Image</label>
                   <div class="input-group">
                <div class="custom-file">
                  <input type="file"   class="custom-file-input" name="img" >
                  <label class="custom-file-label">choose file</label>
                </div>
                <div class="input-group-append">
                 <span class="input-group-text">Upload</span>

               </div>
           </div>
        </div>

              <div class="form-group" data-select2-id="13">
                <label>examegory</label>
                <select class="form-control" id="edit-form-exam-id"  name="exam_id">
                 @foreach($exams as $exam)

                  <option value="{{$exam->id}}">{{$exam->name()}}</option>

                 @endforeach

                </select>
              </div>
            </div>
          </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="add-exam" class="btn btn-info">Submit</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
 --}}


{{-- edit modal --}}

  {{-- <div class="modal modal-warning fade" id="edit-modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
              <form action="{{url('dashboard/exams/update')}}" method="post" id="edit-exam" enctype="multipart/form-data">

              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label >Name(en)</label>
                  <input type="text"  name="name_en"class="form-control" id="edit-form-name-en" >
                </div>
                <div class="form-group">
                  <label>Name(ar)</label>
                  <input type="text"  name="name_ar"class="form-control" id="edit-form-name-ar" >
                </div>
                <div class="form-group">

                <input type="hidden"  name="id"class="form-control" id="edit-form-id" >
              </div>
             <div class="form-group">
                 <label >Image</label>
                   <div class="input-group">
                <div class="custom-file">
                  <input type="file"  id="edit-form-img" class="custom-file-input" name="img" >
                <label class="custom-file-label">choose file</label>
                </div>
                <div class="input-group-append">
                 <span class="input-group-text">Upload</span>
                </div>
               </div>
           </div>
        </div>

              <div class="form-group" data-select2-id="13">
                <label>examegory</label>
                <select class="custom-select  form-control" id="edit-form-exam-id"  name="exam_id">
                 @foreach($exams as $exam)

                  <option value="{{$exam->id}}">{{$exam->name()}}</option>

                 @endforeach

                </select>
            </div>
          </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-exam" class="btn btn-info">Submit</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div> --}}




     @endsection

@section('scripts')

<script>



</script>

@endsection

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
      @include('admin.inc.errors')

      <div class="row ">
      <div class="col-md-4">

      </div>

          <div class="col-md-2 offset-6 ">
       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-modal">
                add new
              </button>

     </div>

        <div class="col-xl-12 ">
            <div class="box">


            <div class="box-body table-responsive no-padding">

             <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Name(en)</th>
                  <th>Name(ar)</th>
                  <th>Active</th>
                  <th>Actions</th>
                </tr>
               @foreach ($cats as $cat)
                  <tr>
                  <td>{{$loop->iteration}}</td>

   <td class="data-name-ar">{{$cat->name("en")}}</td>
   <td class="data-name-en">{{$cat->name("ar")}}</td>
   <td>
   @if($cat->active)
   <span class="badge bg-success">Yes</span>
   @else
   <span class="badge bg-danger">No</span>
   </td>
   @endif
   <td>

    <button class="btn btn-sm btn-info editBtn "   data-id="{{$cat->id}}" data-name-ar="{{$cat->name("ar")}}"  data-name-en="{{$cat->name("en")}}" data-toggle ="modal" data-target="#edit-modal">
    <i class="fas fa-edit" ></i>
    </button>
      <a href="{{url("dashboard/categories/delete/{$cat->id}")}}" class="btn btn-sm btn-danger">
    <i class="fas fa-trash"></i>
    </a>

    <a href="{{url("dashboard/categories/toggle/{$cat->id}")}}" class="btn btn-sm btn-secondary">
    <i class="fas fa-toggle-on"></i>
    </a>
     {{-- <a href="#" class="btn btn-sm btn-info">
    <i class="fas fa-edit"></i>
    </a>
    --}}
   </td>

</tr>
               @endforeach
              </tbody>
              </table>
              <div class="d-flex justify-content-center my-3">
              {{$cats->links()}}
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

  {{-- add new cat modal --}}

  <div class="modal modal-warning fade" id="add-modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
              <form action="{{url('dashboard/categories/store')}}" method="post" id="add-cat">
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
              </div>
              </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="add-cat" class="btn btn-info">Submit</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>



{{-- edit modal --}}

  <div class="modal modal-warning fade" id="edit-modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"></h4>
              </div>
              <div class="modal-body">
              <form action="{{url('dashboard/categories/update')}}" method="post" id="edit-cat">

              @csrf
              <input type="hidden" name="id" id="edit-form-id">
              <div class="box-body">
                <div class="form-group">
                  <label >Name(en)</label>
                  <input type="text"  name="name_en"class="form-control" id="edit-form-name-en" >
                </div>
                <div class="form-group">
                  <label>Name(ar)</label>
                  <input type="text"  name="name_ar"class="form-control" id="edit-form-name-ar" >
                </div>
              </div>
              </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-cat" class="btn btn-info">Submit</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>




@endsection


@section('scripts')

<script>


$(".editBtn").click(function () {

                 let id= $(this).attr('data-id');
                 let nameEn= $(this).attr('data-name-en');
                 let nameAr= $(this).attr('data-name-ar');


                 $('#edit-form-name-en').val(nameEn);
                 $('#edit-form-name-ar').val(nameAr)
                 $("#edit-form-id").val(id);

});


</script>

@endsection

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
       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add-modal">
add new
       </button>

     </div>

        <div class="col-xl-12 ">

            <div class="box">

            <div class="box-body table-responsive no-padding">

                <tr>
   <td>

    <div class="row">
        <div class="col-md-12">
            @include('admin.inc.errors')
        </div>
    </div>
   </td>

                </tr>
                <table class="table table-hover">
                    <tbody><tr>
                      <th>ID</th>
                      <th>Name(en)</th>
                      <th>Name(ar)</th>
                      <th>image</th>
                      <th>Active</th>
                      <th>Actions</th>
                    </tr>
                   @foreach ($skills as $skill)
                      <tr>
                      <td>{{$loop->iteration}}</td>

       {{-- <td class="data-name-ar">{{$skill->name("en")}}</td> --}}
       <td class="data-name-en">{{$skill->name("en")}}</td>
       <td class="data-name-en">{{$skill->name("ar")}}</td>
       <td class="data-name-en"><img src="{{asset("uploads/$skill->img")}}" height="50px"></td>
       <td>
       @if($skill->active)
       <span class="badge bg-success">Yes</span>
       @else
       <span class="badge bg-danger">No</span>
       </td>
       @endif
       <td>

        <button class="btn btn-sm btn-info editBtn "   data-id="{{$skill->id}}" data-cat-id="{{$skill->cat_id}}" data-name-ar="{{$skill->name("ar")}}"  data-name-en="{{$skill->name("ar")}}"  data-img="{{$skill}}"data-toggle ="modal" data-target="#edit-modal">
        <i class="fas fa-edit" ></i>
        </button>
          <a href="{{url("dashboard/skills/delete/{$skill->id}")}}" class="btn btn-sm btn-danger">
        <i class="fas fa-trash"></i>
        </a>

        <a href="{{url("dashboard/skills/toggle/{$skill->id}")}}" class="btn btn-sm btn-secondary">
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
              </table>
              <div class="d-flex justify-content-center my-3">
              {{-- {{$skills->links()}} --}}
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

  {{-- add new skill modal --}}

  <div class="modal modal-warning fade" id="add-modal" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">

              <form action="{{url('dashboard/skills/store')}}" method="post" id="add-skill" enctype="multipart/form-data">
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
                <label>Category</label>
                <select class="form-control" id="edit-form-cat-id"  name="cat_id">
                 @foreach($cats as $cat)

                  <option value="{{$cat->id}}">{{$cat->name()}}</option>

                 @endforeach

                </select>
              </div>
            </div>
          </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="add-skill" class="btn btn-info">Submit</button>
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
              <form action="{{url('dashboard/skills/update')}}" method="post" id="edit-skill" enctype="multipart/form-data">

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
                <label>Category</label>
                <select class="custom-select  form-control" id="edit-form-cat-id"  name="cat_id">
                 @foreach($cats as $cat)

                  <option value="{{$cat->id}}">{{$cat->name()}}</option>

                 @endforeach

                </select>
            </div>
          </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="submit" form="edit-skill" class="btn btn-info">Submit</button>
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
                 let img=$(this).attr('data-img');
                 let catlId= $(this).attr('data-cat-id');

                 $("#edit-form-id").val(id);
                 $('#edit-form-name-en').val(nameEn);
                 $('#edit-form-name-ar').val(nameAr)
                 $("#edit-form-img").val(img);

                 $("#edit-form-cat-id").val(catlId);

});


</script>

@endsection

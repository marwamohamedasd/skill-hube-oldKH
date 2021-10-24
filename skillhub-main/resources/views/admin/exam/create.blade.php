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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
               @include('admin.inc.errors')

            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

       <div class="row text-center">

        <div class="col-md-12 pb-3">
          <form action="{{url('dashboard/exams/store')}}" method="post"  enctype="multipart/form-data">
              @csrf
              <div class="box-body">
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label >Name(en)</label>
                            <input type="text"  name="name_en"class="form-control"  >
                          </div>


                    </div>

        <div class="col-md-6">

         <div class="form-group">
        <label>Name(ar)</label>
        <input type="text"  name="name_ar"class="form-control" >
      </div>
   </div>

   <div class="col-md-6">

    <div class="form-group">
   <label>Description(ar)</label>
   <textarea type="text"  name="desc_ar"class="form-control" > </textarea>
 </div>
</div>

<div class="col-md-6">

    <div class="form-group">
   <label>Description(en)</label>
   <textarea  name="desc_en"class="form-control" ></textarea>
 </div>
</div>

 </div>


   <div class="row">
               <div class="col-md-6">


                <div class="form-group" data-select2-id="13">
                    <label>skill</label>
                    <select class="form-control" name="skill_id">
                     @foreach($skills as $skill)

                      <option value="{{$skill->id}}">{{$skill->name()}}</option>

                     @endforeach

                    </select>
                  </div>

               </div>
        <div class="col-md-6">


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
</div>
</div>
<div class="row">

    <div class="col-md-4">
       <label>Questions No</label>
           <input type="number" class="form-control" name="questions_no" >
    </div>

    <div class="col-md-4">
        <label>duration_no </label>

        <input type="number" class="form-control" name="duration_mins" >
    </div>

    <div class="col-md-4">
        <label>diffculty</label>

        <input type="number" class="form-control" name="difficulty" >

    </div>
</div>


 </div>
 </div>

</div>
<a href="{{url()->previous()}}" class="btn btn-sm btn-success">Back</a>
<button type="submit"  class="btn btn-info">submit data</button>

            </div>
          </div>

        </form>

        </div>





     @endsection

@section('scripts')

<script>



</script>

@endsection

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
      <div class="container-fluid">
        <div class="row mx-3">
            <div class="col-md-12 pb-3 ">

          <form action="{{url("dashboard/exams/store-questions/{$exam_id}")}}" method="post" >
              @csrf
              <div class="box-body">

                @for($i=1;$i<=$questions_no;$i++)
                   <h5>Question {{$i}}</h5>
                  <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text"  name="titles[]"class="form-control"  >
                          </div>
                        </div>
                      <div class="col-md-6">
              <div class="form-group">
          <label>Right Answer</label>
           <input type="text"  name="right_anss[]"class="form-control" >
         </div>
       </div>
{{-- close row --}}
 </div>
 <div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label >option1</label>
          <input type="text"  name="option_1s[]"class="form-control"  >
        </div>
      </div>
    <div class="col-md-6">
<div class="form-group">
<label>option2</label>
<input type="text"  name="option_2s[]"class="form-control" >
</div>
</div>
{{-- close row --}}
</div>

<div class="row ">
    <div class="col-md-6">
      <div class="form-group">
          <label >option3</label>
          <input type="text"  name="option_3s[]"class="form-control"  >
        </div>
      </div>
    <div class="col-md-6">
<div class="form-group">
<label>option4</label>
<input type="text"  name="option_4s[]"class="form-control" >
</div>
</div>
{{-- close row --}}
</div>

<hr>

 @endfor






{{-- close body --}}
</div>




 </div>

</div>
<a href="{{url()->previous()}}" class="btn btn-sm btn-success">Back</a>
<button type="submit"  class="btn btn-info">submit data</button>

            </div>
          </div>

        </form>

    </div>
</div>

        </div>
     @endsection

@section('scripts')

<script>



</script>

@endsection

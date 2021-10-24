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
                @include('admin.inc.errors')

          <form action="{{url("dashboard/exams/update-questions/{$exam->id}/{$question->id}")}}" method="post" >
              @csrf
              <div class="box-body">

                   <h5>Question {{$question->id}}</h5>
                  <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label >Title</label>
                            <input type="text"  name="title"class="form-control"  value="{{$question->title}}" >
                          </div>
                        </div>
                      <div class="col-md-6">
              <div class="form-group">
          <label>Right Answer</label>
           <input type="text"  name="right_ans"class="form-control"value="{{$question->right_ans}}" >
         </div>
       </div>
{{-- close row --}}
 </div>
 <div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label >option1</label>
          <input type="text"  name="option_1"class="form-control" value="{{$question->option_1}}"  >
        </div>
      </div>
    <div class="col-md-6">
<div class="form-group">
<label>option2</label>
<input type="text"  name="option_2"class="form-control" value="{{$question->option_2}}" >
</div>
</div>
{{-- close row --}}
</div>

<div class="row ">
    <div class="col-md-6">
      <div class="form-group">
          <label >option3</label>
          <input type="text"  name="option_3"class="form-control"   value="{{$question->option_3}}" >
        </div>
      </div>
    <div class="col-md-6">
<div class="form-group">
<label>option4</label>
<input type="text"  name="option_4"class="form-control" value="{{$question->option_4}}" >
</div>
</div>
{{-- close row --}}
</div>

<hr>







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

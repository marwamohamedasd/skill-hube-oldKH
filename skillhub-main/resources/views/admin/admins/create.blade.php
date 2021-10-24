@extends('admin/layout')
@section('content')
<div class="content-wrapper">

    <div class="row">
        <div class="col-md-8 offset-1 ">
          @include('admin.inc.errors')

        </div>
    </div>
    <!-- Main content -->
      <div class="container-fluid ">
        <div class="row mx-3">
            <div class="col-md-12  pb-3 ">
          <form action="{{url("dashboard/admins/store")}}" method="post" >
              @csrf
              <div class="box-body">
                 <div class="row ">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text"  name="name"class="form-control"  >
                          </div>
                        </div>
                      <div class="col-md-6">
                       <div class="form-group">
                        <label>Email</label>
                         <input type="text"  name="email"class="form-control" >
                       </div>
                     </div>
{{-- close row --}}
                  </div>
                  <div class="row ">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label >Password</label>
                          <input type="text"  name="password"class="form-control"  >
                        </div>
                      </div>
                    <div class="col-md-6">
                     <div class="form-group">
                      <label>Password confirmation</label>
                       <input type="text"  name="password_confirmation"class="form-control" >
                     </div>
                   </div>
{{-- close row --}}
                </div>
                <div class="row ">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label >Role</label>
           <select class="form-control " name="role_id">
              @foreach($roles as $role)
               <option value="{{$role->id}}">{{$role->name}}</option>

     @endforeach

           </select>

                        </div>
                      </div>
                </div>
            </div>
        </div>
        <a href="{{url()->previous()}}" class="btn btn-sm btn-success">Back</a>
        <button type="submit"  class="btn btn-info">submit data</button>

            </div>
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

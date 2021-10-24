{{-- validation errors --}}
@if (session()->has('errors'))
<div class="alert alert-danger">
@foreach($errors->all() as $error)
    <p>{{$error}}</p>
@endforeach

@endif

{{-- if there one error --}}
@if (session()->has('msg'))
<div class="alert alert-danger">
    <ul>
        {{session('msg')}}
    </ul>
</div>
@endif

{{-- if the request success --}}
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    <ul>
     {{session('success')}}
   </ul>
    </div>
@endif

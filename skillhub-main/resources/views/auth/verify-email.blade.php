@extends('web.layout')


@section('title')
Verify Email
@endsection

@section('content')
<div class=" container alert alert-success">

    Averification Email Send successfully .please check your inbox

</div>

<div class="container">

    <div class="row">

   <div class="col-md-6  col-md-offset-3">

    <div class="contact-form">
        <form action="{{url('email/verification-notification')}}" method="POST">
            @csrf
         <button type="submit" class="main-button icon-button pull-right">Rsend Email</button>
        </form>

    </div>


   </div>


    </div>


</div>



@endsection



@extends('web.layout')
@section('title')
Sign in
@endsection

@section('content')


<div class="hero-area section">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(asset{{('web/img/page-background.jpg')}})"></div>
    <!-- /Backgound Image -->

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center">
                <ul class="hero-area-tree">
                    <li><a href="{{url("/")}}">Home</a></li>
                  
                </ul>
                <h1 class="white-text">{{__('web.profile')}}</h1>

            </div>
        </div>
    </div>

</div>
<!-- /Hero-area -->

<!-- Contact -->
<div id="contact" class="section">

    <!-- container -->
    <div class="container">

        <!-- row -->
        <div class="row">
<div class="col-md-6 col-md-offset-3">


<table class="table">

<thead>
    <tr>
        <th>Exam name</th>
        <th>Score</th>
        <th>Time.mins</th>
    </tr>


</thead>

<tbody>

@foreach(Auth::user()->exams as $exam)
<tr>

    <td>{{$exam->name()}}</td>
    <td>{{$exam->pivot->score}}</td>
    <td>{{$exam->pivot->time_mins}}</td>

</tr>

@endforeach

</tbody>

</table>


</div>
       
        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
@endsection



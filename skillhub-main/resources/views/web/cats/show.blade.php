
@extends('web/layout')
@section('title')
{{$cat->name()}}

@endsection
@section('content')

    <!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{asset('web/img/page-background.jpg')}})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 text-center">
                    <ul class="hero-area-tree">
                        <li><a href="index.html">Home</a></li>
                        <li>Category name</li>
                    </ul>
                    <h1 class="white-text">{{$cat->name()}}</h1>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Blog -->
    <div id="blog" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- main blog -->
                <div id="main" class="col-md-9">

                    <!-- row -->
                    <div class="row">
@foreach($skills as $skill)

<div class="col-md-4">
    <div class="single-blog">
        <div class="blog-img">
            <a href="skill.html">
                <img src="{{asset("uploads/$skill->img")}}" alt="skills image">
            </a>
        </div>
        <h4><a href="{{url("exam/show/{$skill->id}") }}">{{$skill->name()}}</a></h4>
        <div class="blog-meta">
            {{-- <span>18 Oct, 2017</span> --}}
            <span>{{Carbon\Carbon::parse($skill->created_at)->format('d m,Y')}}</span>
            <div class="pull-right">
                <span class="blog-meta-comments"><a href="#"><i class="fa fa-users"></i> </a>{{$skill->getStudentsCount()}}</span>
            </div>
        </div>
    </div>
</div>
 @endforeach





                    </div>
                    <!-- /row -->

                    <!-- row -->
                    <div class="row">

                    {{$skills->links('web.inc.paginator')}}

                    </div>
                    <!-- /row -->
                </div>
                <!-- /main blog -->

                <!-- aside blog -->
                <div id="aside" class="col-md-3">

                    <!-- search widget -->
                    <div class="widget search-widget">
                        <form>
                            <input class="input" type="text" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- /search widget -->

                    <!-- category widget -->
                    <div class="widget category-widget">
                        <h3>Categories</h3>

                        @foreach($allCats as $oneCat)

                        <a class="category" href="{{url("categories/$oneCat")}}">{{$oneCat->name()}} <span>{{$oneCat->skills()->count()}}</span></a>

                        @endforeach
                    </div>
                    <!-- /category widget -->
                </div>
                <!-- /aside blog -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->

    </div>
    <!-- /Blog -->


@endsection




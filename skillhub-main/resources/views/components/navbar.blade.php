<nav id="nav">
    <form id="logout-form" action="{{url('logout')}}" method="post" class="display:none;">
        @csrf
       </form>

    <ul class="main-menu nav navbar-nav w-75 navbar-right">
        <li><a href="{{url('/')}}">@lang('web.home')</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('web.cats') <span class="caret"></span></a>
            <ul class="dropdown-menu">

                @foreach($cats as $cat)
                <li><a href="{{url("categories/show/{$cat->id}")}}">{{$cat->name()}}</a></li>

                @endforeach

            </ul>
        </li>
        <li><a href="{{url('contact')}}">@lang('web.Contact')</a></li>

        @guest
        <li><a href="{{url('login')}}">{{__('web.SignIn')}}</a></li>
        <li><a href="{{url('register')}}">{{__('web.SignUp')}}</a></li>
        @endguest

        @auth
        <li><a  id="logout-link" href="#">{{__('web.signout')}}</a></li>
        @endauth

        @auth
           @if(Auth::user()->role->name=="student")
              <li><a  href="{{url('/profile')}}">{{__('web.profile')}}</a></li>
                @else
             <li><a  id="logout-link" href="{{url('dashboard')}}">{{__('web.dashboard')}}</a></li>
     
             @endif
        @endauth
   @auth

   @endauth


        @if(App::getLocale()=='ar')

        <li><a href="{{url('lang/set/en')}}">en</a></li>


        @else

        <li><a href="{{url('lang/set/ar')}}">ع</a></li>


        @endif

    </ul>
</nav>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Amhara Radio Running Order
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}


{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}
<!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>--}}

{{--    <script type="text/javascript" src="{{asset('js/datatables.js')}}" defer ></script>--}}
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            /*background-color: #1d68a7;*/
            width: auto;


        }

        a {
            margin: 7px;
            -webkit-transition: color 1s; /* For Safari 3.0 to 6.0 */
            transition: color 1s; /* For modern browsers */
        }

        a.hcolor:hover,
        a.hcolor:active {
            /*background-color: black;*/
            color: black !important;
        }

        a.hcolor:active {
            /*background-color: black;*/
            color: black !important;
        }

        a .hcolor > li > a,
        .hcolor > .active > a {
            color: orange;
        }


    </style>
    @yield('css')
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md  navbar-light bg-info shadow-sm">

        <a class="navbar-brand" style="color: white">Running Order
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @auth()
                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1
                    || \Illuminate\Support\Facades\Auth::user()->role_id == 2
                    || \Illuminate\Support\Facades\Auth::user()->role_id == 8)
                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">Radio Home</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <li>
                                <a href="{{route('program-ayidi-create')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">አይዲ ጨምር</a>
                            </li>
                            <li>
                                <a href="{{route('register-user')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">ተጠቃሚ መዝግብ </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('program-create')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center ;color: white">የእለቱን ፐሮግራሞች ጨምር </a>
                        </li>
                        <li>
                            <a href="{{route('program-mereja-music-create')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center; color: white">መረጃና ሙዚቃ ጨምር </a>
                        </li>
                        <li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9)
                                <a href="{{route('mastawokia-create')}}" class="dropdown-item hcolor  px-1"
                                   style=" text-align: center ;color: white">ማስታወቂያ ጨምር </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                የተላለፉ ፕሮግራሞች
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list')}}">
                                    ፕሮግራሞች
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list')}}">
                                    መረጃና ሙዚቃ
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list')}}">
                                    ማስታወቂያ
                                </a>
                            </div>
                        </li>
                    </ul>
                @endif


                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5
                                   || \Illuminate\Support\Facades\Auth::user()->role_id == 6 )

                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">FM Home</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5)
                            <li>
                                <a href="{{route('program-ayidi-create-fm')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">አይዲ ጨምር</a>
                            </li>
                            <li>
                                <a href="{{route('register-user-fm')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">ተጠቃሚ መዝግብ </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('program-create-fm')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center ;color: white">የእለቱን ፐሮግራሞች ጨምር </a>
                        </li>
                        <li>
                            <a href="{{route('program-mereja-music-create-fm')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center; color: white">መረጃና ሙዚቃ ጨምር </a>
                        </li>
                        <li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9)
                                <a href="{{route('mastawokia-create')}}" class="dropdown-item hcolor  px-1"
                                   style=" text-align: center ;color: white">ማስታወቂያ ጨምር </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                የተላለፉ ፕሮግራሞች
                            </a>
                            <div class="dropdown-menu dropdown-menu-right bg-info" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list')}}">
                                    ፕሮግራሞች
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list')}}">
                                    መረጃና ሙዚቃ
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list')}}">
                                    ማስታወቂያ
                                </a>
                            </div>
                        </li>
                    </ul>
            @endif


        @endauth

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    {{--                        @if (Route::has('register'))--}}
                    {{--                            <li class="nav-item">--}}
                    {{--                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--                            </li>--}}
                    {{--                        @endif--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                           style=" text-align: center ;color: white">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
    {{--</div>--}}

    <main class="my-4">
        {{--        @if(!in_array(request()->path() ,['auth.login','register','password/reset','login']))--}}
        @auth
            <div class="container-fluid">
                @if(session()->has('success'))
                    <div class="alert text-center alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert text-center alert-danger">
                        {{session()->get('error')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-1 px-0">
                        {{--                        @auth()--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 2
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 8
                            ||\Illuminate\Support\Facades\Auth::user()->role_id == 9 )
                            <div class="card-header" style="font-size: 15px">
                                <b>የአማራ ሬዲዮ ፐሮግራሞች</b>
                            </div>
                            <ul class="list-group">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif



                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 6
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 8
                            ||\Illuminate\Support\Facades\Auth::user()->role_id == 9
                            )
                            <div class="card-header" style="font-size: 15px">
                                <b>ኤፍኤም ፐሮግራሞች</b>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id != 8
                                &&  \Illuminate\Support\Facades\Auth::user()->role_id != 9 )
                                <ul class="list-group">
                                    @foreach($ken as $k)
                                        <li class="list-group-item text-center px-0">
                                            <a href="{{route('program-list-by-date-fm',$k->id)}}" type="submit"
                                               class="btn btn-info " style="width: 70px;">
                                                <b>{{$k->name}}</b>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endif

                        {{--                        collapse start--}}

                        <div class="card-header" style="font-size: 15px">
                            <a class="btn btn-warning collapsed" data-toggle="collapse"
                               href="#collapseContent" role="button" aria-expanded="false"
                               aria-controls="collapseContent">
                                <span class="if-collapsed" style="font-size: 15px"><b>+</b> TV</span>
                                <span class="if-not-collapsed" style="font-size: 15px"><b>-</b> TV</span></a>
                        </div>
                        <div class="collapse" id="collapseContent">
                            @foreach($ken as $k)
                                <li class="list-group-item text-center px-0">
                                    <a href="{{route('program-list-by-date-fm',$k->id)}}" type="submit"
                                       class="btn btn-info " style="width: 70px;">
                                        <b>{{$k->name}}</b>
                                    </a>
                                </li>
                            @endforeach
                        </div>

                        {{--colapse end--}}


                        {{--                        @endauth--}}


                    </div>

                    <div class="col-md-10">
                        @yield('content')
                    </div>
                    <div class="col-md-1 px-0">

                        {{--                        @auth()--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 8
                        ||  \Illuminate\Support\Facades\Auth::user()->role_id == 9)
                            <div class="card-header" style="font-size: 15px;color: red">
                                <b>ኤፍኤም ፐሮግራሞች</b>
                            </div>
                            <ul class="list-group">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date-fm',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        {{--                        @endauth--}}
                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid">
                @yield('content')
            </div>
        @endauth
    </main>
</div>
<style>
    [data-toggle="collapse"].collapsed .if-not-collapsed,
    [data-toggle="collapse"]:not(.collapsed) .if-collapsed {
        display: none;
    }


</style>

{{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}
<script src="{{ asset('js/app.js') }}"></script>

@yield('js')
<!-- Footer -->

<!-- Footer -->
</body>
<footer class="page-footer panel-footer font-weight-bold blue">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2013 E.C Copyright:
        <a href=""> Developed by Challelign Tilahun </a>
    </div>
    <!-- Copyright -->

</footer>
</html>

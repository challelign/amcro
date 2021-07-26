<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>የአሚኮ ዕለት ስርጭት ማስፈፀሚያ ሲሰተም </title>
    <link rel="icon" type="image/x-icon" href="{{asset('logo-image/amico.jpg')}}"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            /*background-color: #1d68a7;*/
            width: 100%;


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

        navbar-nav.navbar-center {
            position: absolute;
            left: 50%;
            transform: translatex(-50%);
        }

        ul li a {
            margin-right: 10px;
        }
        body {
            display: table;
            /*min-height: 100vh;*/
            /*max-width: 400px;*/
            /*margin: 0 auto;*/
        }
    </style>
    @yield('css')
</head>
<body>
<div id="app">
    @auth
        <div class=" text-center" style="max-width: 100%;color: white;background-color: #b22222">
            <b style="font-size: 28px">የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                መርሐ ግብር ሲስተም </b>
        </div>
    @endauth



    {{--    <nav class="navbar navbar-icon-top navbar-expand-lg navbar-expand-xl clearfix navbar-dark bg-dark" style="verflow: hidden;max-width: 100%;color: red">--}}
    <nav class="navbar navbar-expand-md container-fluid  navbar-light shadow-sm navbar-center justify-content-center"
         style="text-align: center;font-size: 10px;background-color: #b22222">


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse navbar-center justify-content-center" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            @auth()

                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 11)
                    <ul class="navbar-nav mr-auto " style="font-size: 15px;width: 50%;padding-left: 30%">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|Home|</a>
                        </li>
                        <li>
                            <a href="{{route('register-user-admin')}}" class="dropdown-item hcolor px-1"
                               style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                        </li>
                    </ul>
                @endif




                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 12)
                    <ul class="navbar-nav mr-auto " style="font-size: 15px;width: 50%;padding-left: 30%">
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">|የአማራ ራዲዮ የተላለፉ ..|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list')}}">
                                    ||ፕሮግራሞች||
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list')}}">
                                    ||መረጃና ሙዚቃ||
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list')}}">
                                    ||ማስታወቂያ||
                                </a>
                            </div>
                        </li>


                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |ባሕርዳር ኤፍኤም የተላለፉ ..|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list-fm')}}">
                                    |ፕሮግራሞች|
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list-fm')}}">
                                    |መረጃና ሙዚቃ|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list-fm')}}">
                                    |ማስታወቂያ|
                                </a>
                            </div>
                        </li>


                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን የተላለፉ ..|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="background-color: red">
                                <a class="dropdown-item" href="{{route('program-list-tv')}}">
                                    |ፕሮግራሞች|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv')}}">
                                    |ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>

                        <li>
                            <a href="{{route('feedback-create')}}" class="dropdown-item hcolor px-1"
                               style="text-align: center ;color: white">|የስርጭት ባለሙያው ዓስተያየት| </a>
                        </li>

                    </ul>



                @endif





                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9 || \Illuminate\Support\Facades\Auth::user()->role_id == 10)
                    <ul class="navbar-nav mr-auto " style="font-size: 15px">

                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|Home|</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10)
                            <li>
                                <a href="{{route('register-user-pro')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('mastawokia-create-tv')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ቴቪ ማስታወቂያ ጨምር| </a>
                        </li>
                        <li>
                            <a href="{{route('mastawokia-create')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ራዲዮ ማስታወቂያ ጨምር| </a>

                        </li>
                        <li>
                            <a href="{{route('mastawokia-create-fm')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ኤፍኤም ማስታወቂያ ጨምር| </a>
                        </li>


                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |ኤፍኤም ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                {{--                                <a class="dropdown-item" href="{{route('program-list-fm')}}">--}}
                                {{--                                    ፕሮግራሞች--}}
                                {{--                                </a>--}}
                                <a class="dropdown-item" href="{{route('mastawokia-list-fm-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list-fm')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የአማራ ራዲዮ ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                {{--                                <a class="dropdown-item" href="{{route('program-list-fm')}}">--}}
                                {{--                                    ፕሮግራሞች--}}
                                {{--                                </a>--}}
                                <a class="dropdown-item" href="{{route('mastawokia-list-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>

                                <a class="dropdown-item" href="{{route('mastawokia-list')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |ቴቪ ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="background-color: red">
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>
                    </ul>
                @endif



                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1
                    || \Illuminate\Support\Facades\Auth::user()->role_id == 2
                    || \Illuminate\Support\Facades\Auth::user()->role_id == 8)
                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|Home|</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <li>
                                <a href="{{route('program-ayidi-create')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|አይዲ ጨምር|</a>
                            </li>
                            <li>
                                <a href="{{route('register-user')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('program-create')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center ;color: white">|የእለቱን ፕሮግራሞች ጨምር| </a>
                        </li>
                        <li>
                            <a href="{{route('program-mereja-music-create')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center; color: white">|መረጃና ሙዚቃ ጨምር| </a>
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 8) |የአማራ ራዲዮ የተላለፉ
                                ፕሮግራሞች| @else
                                    |የተላለፉ ፕሮግራሞች| @endif

                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list')}}">
                                    |ፕሮግራሞች|
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list')}}">
                                    |መረጃና ሙዚቃ|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list')}}">
                                    |ማስታወቂያ|
                                </a>
                            </div>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 8)

                            <li class="nav-item dropdown  hcolor  py-1 ">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#"
                                   role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                   style=" text-align: center ;color: white ; padding-top: 0px">
                                    |ባሕርዳር ኤፍኤም የተላለፉ ፕሮግራሞች|
                                </a>
                                <div class="dropdown-menu dropdown-menu-right " style="background-color: red"
                                     aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('program-list-fm')}}">
                                        |ፕሮግራሞች|
                                    </a>
                                    <a class="dropdown-item" href="{{route('mereja-music-list-fm')}}">
                                        |መረጃና ሙዚቃ|
                                    </a>
                                    <a class="dropdown-item" href="{{route('mastawokia-list-fm')}}">
                                        |ማስታወቂያ|
                                    </a>
                                </div>
                            </li>
                        @endif
                    </ul>
                @endif


                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5
                   || \Illuminate\Support\Facades\Auth::user()->role_id == 6 )
                    <ul class="navbar-nav nav mr-auto navbar-center justify-content-center" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|FM Home|</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5)
                            <li>
                                <a href="{{route('program-ayidi-create-fm')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|አይዲ ጨምር|</a>
                            </li>
                            <li>
                                <a href="{{route('register-user-fm')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('program-create-fm')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center ;color: white">|የእለቱን ፕሮግራሞች ጨምር| </a>
                        </li>
                        <li>
                            <a href="{{route('program-mereja-music-create-fm')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center; color: white">|መረጃና ሙዚቃ ጨምር| </a>
                        </li>
                        <li>
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9)
                                <a href="{{route('mastawokia-create')}}" class="dropdown-item hcolor  px-1"
                                   style=" text-align: center ;color: white">|ማስታወቂያ ጨምር| </a>
                            @endif
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የተላለፉ ፕሮግራሞች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('program-list-fm')}}">
                                    |ፕሮግራሞች|
                                </a>
                                <a class="dropdown-item" href="{{route('mereja-music-list-fm')}}">
                                    |መረጃና ሙዚቃ|
                                </a>
                                <a class="dropdown-item" href="{{route('mastawokia-list-fm')}}">
                                    |ማስታወቂያ|
                                </a>
                            </div>
                        </li>
                    </ul>
                @endif

{{--supervisor--}}

                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 13)

                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ቴቪ Home|</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 13 )
                            <li>
                                <a href="{{route('register-user-supervisor')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                            </li>
                        @endif

                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="color: white;background-color: red">
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>

                                <a class="dropdown-item" href="{{route('mastawokia-list-tv')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን ፕሮግራሞች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="background-color: red">
                                <a class="dropdown-item" href="{{route('program-list-tv')}}">
                                    |ዓየርላይ የዋሉ ፕሮግራሞች|
                                </a>
                            </div>
                        </li>

                    </ul>
                @endif























                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3
                    || \Illuminate\Support\Facades\Auth::user()->role_id == 4)

                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ቴቪ Home|</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3 )
                            <li>
                                <a href="{{route('register-user-tv')}}" class="dropdown-item hcolor px-1"
                                   style="text-align: center ;color: white">|ተጠቃሚ መዝግብ| </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{route('program-create-tv')}}" class="dropdown-item hcolor  px-1"
                               style="text-align: center ;color: white">|የእለቱን ፕሮግራሞች ጨምር| </a>
                        </li>


                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="color: white;background-color: red">
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>

                                <a class="dropdown-item" href="{{route('mastawokia-list-tv')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን ፕሮግራሞች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="background-color: red">
                                <a class="dropdown-item" href="{{route('program-list-tv')}}">
                                    |ዓየርላይ የዋሉ ፕሮግራሞች|
                                </a>
                            </div>
                        </li>

                    </ul>
                @endif


                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 7)
                    <ul class="navbar-nav mr-auto" style="font-size: 15px">
                        <li>
                            <a href="{{route('home')}}" class="dropdown-item hcolor  px-1"
                               style=" text-align: center ;color: white">|ቴሌቪዥን Home|</a>
                        </li>

                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                | የቴሌቪዥን ማስታወቂያዎች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " style="background-color: red"
                                 aria-labelledby="navbarDropdown">
                                {{--                                <a class="dropdown-item" href="{{route('program-list-fm')}}">--}}
                                {{--                                    ፕሮግራሞች--}}
                                {{--                                </a>--}}
                                <a class="dropdown-item" href="{{route('mastawokia-list-tv-yaltelalefu')}}">
                                    |ያልተላለፉ ማስታወቂያዎች|
                                </a>

                                <a class="dropdown-item" href="{{route('mastawokia-list-tv')}}">
                                    |ዓየርላይ የዋሉ ማስታወቂያዎች|
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown  hcolor  py-1 ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle  hcolor  px-1" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                               style=" text-align: center ;color: white ; padding-top: 0px">
                                |የቴሌቪዥን ፕሮግራሞች|
                            </a>
                            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown"
                                 style="color: white;background-color: red">
                                <a class="dropdown-item" href="{{route('program-list-tv')}}">
                                    |ዓየርላይ የዋሉ ፕሮግራሞች|
                                </a>
                            </div>
                        </li>

                    </ul>
            @endif

            {{--                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2|| \Illuminate\Support\Facades\Auth::user()->role_id == 3|| \Illuminate\Support\Facades\Auth::user()->role_id == 4|| \Illuminate\Support\Facades\Auth::user()->role_id == 5|| \Illuminate\Support\Facades\Auth::user()->role_id == 6|| \Illuminate\Support\Facades\Auth::user()->role_id == 7|| \Illuminate\Support\Facades\Auth::user()->role_id == 8|| \Illuminate\Support\Facades\Auth::user()->role_id == 9|| \Illuminate\Support\Facades\Auth::user()->role_id == 10)--}}
            {{--                    --}}{{--                    <ul class="navbar-nav mr-auto " style="font-size: 15px;width: 50%;padding-left: 30%">--}}
            {{--                    <ul class="navbar-nav mr-auto" style="font-size: 15px">--}}

            {{--                        <li class="nav-item dropdown  hcolor  py-1 ">--}}
            {{--                            <a href="{{route('register-user-admin')}}" class="dropdown-item hcolor px-1"--}}
            {{--                               style="color: white">የስርጭት ባለሙያው ዓስተያየት </a>--}}
            {{--                        </li>--}}
            {{--                    </ul>--}}
            {{--            @endif--}}
        @endauth

        <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"
                           style="font-size: 20px;color: white">{{ __('ግ ባ') }}</a>
                    </li>
                @else
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 2
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 3
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 4
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 5
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 6
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 7
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 8
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 9
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 10
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 11
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 13)
                        {{--                    <ul class="navbar-nav mr-auto " style="font-size: 15px;width: 50%;padding-left: 30%">--}}
                        <ul class="navbar-nav mr-auto" style="font-size: 15px">
                            <li class="nav-item dropdown  hcolor  py-1 ">
                                <a href="{{route('feedback-create')}}" class="dropdown-item hcolor px-1"
                                   style="color: white">|የስርጭት ባለሙያው ዓስተያየት| </a>
                            </li>
                        </ul>
                    @endif
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                           style=" text-align: center ;color: white">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                             style="background-color: red">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('ውጣ') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('change-password') }}"> የይለፍ ቃል ቀይር

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
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 8)
                            <div class="card-header" style="font-size: 15px">
                                <b>የአማራ ሬዲዮ ፕሮግራሞች</b>
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
                            )

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id != 8 )
                                <div class="card-header" style="font-size: 15px">
                                    <b>ባሕር ዳር ኤፍኤም ፕሮግራሞች</b>
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
                        @endif
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 4
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 7
                            || \Illuminate\Support\Facades\Auth::user()->role_id == 13
                            )
                            <div class="card-header" style="font-size: 15px">
                                <b>የቴሌቪዥን ፕሮግራሞች</b>
                            </div>
                            {{--                            @if(\Illuminate\Support\Facades\Auth::user()->role_id != 7 )--}}
                            <ul class="list-group">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date-tv',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            {{--                            @endif--}}
                        @endif

                        {{--                        collapse start--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9 || \Illuminate\Support\Facades\Auth::user()->role_id == 10)


                            <div class="card-header" style="font-size: 15px">
                                <a class="btn btn-warning collapsed" data-toggle="collapse"
                                   href="#collapseContent" role="button" aria-expanded="false"
                                   aria-controls="collapseContent">
                                    <span class="if-collapsed" style="font-size: 15px"><b>+</b>ቴቪ</span>
                                    <span class="if-not-collapsed" style="font-size: 15px"><b>-</b>ቴቪ</span></a>
                            </div>
                            <div class="collapse" id="collapseContent">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date-tv',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </div>

                            <div class="card-header" style="font-size: 15px">
                                <a class="btn btn-warning collapsed" data-toggle="collapse"
                                   href="#collapseContentRadio" role="button" aria-expanded="false"
                                   aria-controls="collapseContentRadio">
                                    <span class="if-collapsed" style="font-size: 15px"><b>+</b>ራዲዮ</span>
                                    <span class="if-not-collapsed" style="font-size: 15px"><b>-</b>ራዲዮ</span></a>
                            </div>
                            <div class="collapse" id="collapseContentRadio">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </div>




                            <div class="card-header" style="font-size: 10px">
                                <a class="btn btn-warning collapsed" data-toggle="collapse"
                                   href="#collapseContentFm" role="button" aria-expanded="false"
                                   aria-controls="collapseContentFm">
                                    <span class="if-collapsed" style="font-size: 15px"><b>+</b>ኤፍኤም</span>
                                    <span class="if-not-collapsed" style="font-size: 15px"><b>-</b>ኤፍኤም</span></a>
                            </div>
                            <div class="collapse" id="collapseContentFm">
                                @foreach($ken as $k)
                                    <li class="list-group-item text-center px-0">
                                        <a href="{{route('program-list-by-date-fm',$k->id)}}" type="submit"
                                           class="btn btn-info " style="width: 70px;">
                                            <b>{{$k->name}}</b>
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        @endif


                        {{----}}


                        {{--                        @endauth--}}


                    </div>

                    <div class="col-md-10">
                        @yield('content')
                    </div>
                    <div class="col-md-1 px-0">
                        {{--                        @auth()--}}
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 8)
                            <div class="card-header" style="font-size: 15px;color: red">
                                <b>ባሕርዳር ኤፍኤም ፕሮግራሞች</b>
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

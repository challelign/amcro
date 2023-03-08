@if($i = 0)@endif
@foreach($program as $pro)
@if($pro->program_ken_id === $ken->id
    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
@if($i++)@endif
@endif
@endforeach


@if($i = 0)@endif
@foreach($mastawokia as $mas)
@if($mas->program_ken_id === $ken->id
&&   $mas->is_transmit == 0 && $mas->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
@if($i++)@endif
@endif
@endforeach
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ዕለቱ @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10  ) {{$mas->name}}  ጠዋት[12:00-6:00]
        ቀን {{$mas->today_date}} @else ዕለቱ {{$ken->name}} ጠዋት[12:00-6:00]  ቀን {{$pro->today_date}} @endif  </title>



    {{--        <title> ዕለቱ {{$ken->name}} ጠዋት[12:00-6:00] ቀን {{$pro->today_date}} </title>--}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 10px;
            }

            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                /*width: 30%;*/
            }
        }
    </style>
</head>
<body class="pt-3 my-5 " style="margin: 0">
<div class="content-header">
    <div class="container">
        <div class="row mb-2" style="margin-left: -100px; margin-right: -100px">
            {{--            <div class="col-sm-12">--}}
            <div class="container-fluid justify-content-sm-center">
                <div class="row">
                    <div class="col-md-12">
{{--                        @if($i != 0)--}}
                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 )
                                <div class="card">
                                    <div class="card-header bg-info  "
                                         style="color: white ;font-size: 15px"> {{$ken->name}}
                                        ጠዋት[12:00-6:00] የተሞሉ
                                        ፐሮግራሞች ዝርዝር ቀን {{$pro->today_date}}
                                    </div>
                                    <div class="col-md-12 panel-primary card-header border-info "
                                         style="color: #1f6fb2; font-size: 15px">
                                        ፐሮግራሞች
                                    </div>
                                    <div class="card-body">
                                        @if($i = 0)@endif
                                        @foreach($program as $pro)
                                            @if($pro->program_ken_id === $ken->id
                                                &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                @if($i++)@endif
                                            @endif
                                        @endforeach

                                        @csrf
                                        @if($i = 0)
                                            <div class="card-body">
                                                <p class="text-center"> ፐሮግራሞች የሉም </p>
                                            </div>
                                        @else
                                            <table
                                                class="table table-bordered table-striped table-responsive form-group"
                                                id="user_table" style="width: 100%">
                                                @csrf
                                                <thead class="table-bordered text-center">
                                                <tr>

                                                    <th style="width: 5px">ተ.ቁ</th>
                                                    <th style="width: 10px">ቀን</th>
                                                    {{--                                                <th>ፕሮግራሙ ሚተላለፍበት</th>--}}
                                                    {{--                                                <TH>ዕለቱ</TH>--}}
                                                    <TH style="width: 10px">ፕሮግራም አይዲ</TH>
                                                    <TH style="width: 10px">ፋይል ስም</TH>
                                                    <TH style="width: 10px">ደቂቃ</TH>
                                                    <TH style="width: 10px">ሚተላለፍበትን ሰዓት</TH>
                                                    <TH style="width: 10px">ይዘት</TH>

                                                    <TH style="width: 10px">ፕ/አርታኢ</TH>
                                                    <TH style="width: 10px">ፕ/አዘጋጅ</TH>
                                                    <th style="width: 10px">የፕሮግራሙን የመዘገበው</th>
                                                </TR>
                                                </thead>

                                                @if($i = 0)@endif
                                                @foreach($program as $pro)
                                                    @if($pro->program_ken_id === $ken->id
                                                        &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                        <tbody>
                                                        @if($i++)@endif
                                                        <td>{{$i}}</td>
                                                        <td>{{$pro->today_date}}</td>
                                                        {{--                                                <td>{{$pro->program_mitelalefbet}}</td>--}}
                                                        {{--                                                <td>{{$pro->programKen->name}}</td>--}}

                                                        <td>{{$pro->programMeleya->name}}</td>
                                                        <td>{{$pro->program_file}}</td>
                                                        <td>{{$pro->program_minute}}</td>
                                                        <td>{{$pro->program_mitelalefbet_seat}}
                                                            - {{$pro->program_mitelalefbet_seat2}}</td>
                                                        <td>{{$pro->program_yizet}}</td>

                                                        <td>{{$pro->program_artayi}}</td>
                                                        <td>{{$pro->program_azegagi}}</td>
                                                        <td>{{$pro->user->name}}</td>

                                                        </tbody>
                                                    @endif
                                                @endforeach

                                            </table>

                                        @endif


                                        @if($i = 0)@endif
                                        @foreach($program as $pro)
                                            @if($pro->program_ken_id === $ken->id
                                        &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ቀን[6:00-12:00]')
                                                @if($i++)@endif
                                            @endif
                                        @endforeach
                                        {{--                        <a href="{{route('program-list-by-date-tewat',$ken->id)}}"--}}
                                        {{--                           class="btn btn-sm form-control  bg-info">{{$ken->name}} ጠዋት[12:00-6:00] የተሞሉ ፐሮግራሞች ዝርዝር</a>--}}
                                        {{--           ሰኞ ጠዋት[12:00-6:00]          --}}
                                        <div class="col-md-12 panel-primary card-header  border-info "
                                             style="color: #1f6fb2; font-size: 15px">
                                            መረጃና ሙዚቃ
                                        </div>
                                        @if($i = 0)@endif
                                        @foreach($mereja as $mer)
                                            @if($mer->program_ken_id === $ken->id && $mer->is_transmit == 0 &&
                                                   $mer->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                @if($i++)@endif
                                            @endif
                                        @endforeach
                                        @if($i == 0)
                                            <div class="card-body">
                                                <p class="text-center"> መረጃና ሙዚቃ የለም </p>
                                            </div>
                                        @else
                                            <table
                                                class="table table-bordered table-striped table-responsive form-group"
                                                id="user_table">
                                                @csrf
                                                <thead class="table-bordered text-center">
                                                <tr>
                                                    <th>ተ.ቁ</th>

                                                    <th>ቀን</th>
                                                    {{--                                                <th>ፕሮግራሙ ሚተላለፍበት</th>--}}
                                                    {{--                                                <TH>ዕለቱ</TH>--}}
                                                    <TH>መረጃ</TH>
                                                    <TH>ሙዚቃ</TH>
                                                    <th>የፕሮግራሙን የመዘገበው</th>
                                                </TR>
                                                </thead>
                                                @if($i = 0)@endif
                                                @foreach($mereja as $mer)
                                                    @if($mer->program_ken_id === $ken->id && $mer->is_transmit == 0 &&
                                                           $mer->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                        <tbody>
                                                        @if($i++)@endif
                                                        <td>{{$i}}</td>
                                                        <td> {{$mer->today_date}}</td>
                                                        {{--                                                    <td>{!!  $mer->program_mitelalefbet!!}</td>--}}
                                                        {{--                                                    <td>{!!  $mer->programKen->name !!}</td>--}}
                                                        <td>{!!  $mer->mereja!!}</td>
                                                        <td>{!! $mer->music !!}</td>

                                                        <td>{{$mer->user->name}}</td>

                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            </table>
                                        @endif
                                        <div class="col-md-12 panel-primary card-header border-info "
                                             style="color: #1f6fb2; font-size: 15px">
                                            ማስታወቂያ
                                        </div>
                                        @if($i = 0)@endif
                                        @foreach($mastawokia as $ms)
                                            @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->is_artayi_check == 1
                                                &&   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                @if($i++)@endif
                                            @endif
                                        @endforeach
                                        @if($i == 0)

                                            <div class="card-body">
                                                <p class="text-center"> ማስታወቂያ የለም </p>
                                            </div>
                                        @else
                                            <table
                                                class="table table-bordered table-striped table-responsive form-group"
                                                id="user_table">
                                                @csrf
                                                <thead class="table-bordered text-center">
                                                <tr>
                                                    <th>ተ.ቁ</th>
                                                    <th>ቀን</th>
                                                    {{--                                                <th>ማስታወቂያውን ሚተላለፍበት</th>--}}
                                                    {{--                                                <TH>ዕለቱ</TH>--}}
                                                    <TH>ማስታወቂያ አስነጋሪው</TH>
                                                    <TH>ፋይል ስም</TH>
                                                    <TH>ደቂቃ</TH>
                                                    <TH>ሚተላለፍበትን ሰዓት</TH>
                                                    <TH>ድግግሞሽ መጠን</TH>
{{--                                                    <TH>የተስተናገደው መጠን</TH>--}}
                                                    <th>ማስታወቂያውን የመዘገበው</th>
                                                    <th>እንዲተላለፍ የፈቀደው</th>
                                                </TR>
                                                </thead>
                                                @if($i = 0)@endif
                                                @foreach($mastawokia as $ms)
                                                    @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->is_artayi_check == 1
                                                        &&   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                                        <tbody>
                                                        @if($i++)@endif
                                                        <td>{{$i}}</td>
                                                        <td> {{$ms->today_date}}</td>
                                                        {{--                                                    <td>{!!  $ms->mastawokia_mitelalefbet!!}</td>--}}
                                                        {{--                                                    <td>{!!  $ms->programKen->name !!}</td>--}}
                                                        <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                                        <td>{!!  $ms->mastawokia_file!!}</td>
                                                        <td>{!!  $ms->mastawokia_gize!!}</td>
                                                        <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                                        <td>{!!  $ms->mastawokia_diggmosh!!}</td>
{{--                                                        <td>{!!  $ms->mastawokia_Yetestenagedew_meten!!}</td>--}}
                                                        <td>{{$ms->user->name}}</td>
                                                        <td>{{$ms->artayi}}</td>
                                                        </tbody>
                                                    @endif
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>

                                </div>
                                <br><br>

                                <div class="col-md-12">
                                    <p> ፕሮግራም መሪ
                                        .......................................................................................................................................................
                                        ፊርማ .............................።<br>
                                    </p>
                                    <p>
                                        የዕለቱን ስርጭት ያጸደቀው <b> {{auth()->user()->name}}</b> &nbsp;&nbsp &nbsp;&nbsp&nbsp;&nbsp
                                        &nbsp;&nbsp
                                        {{--                                የዕለቱን ስርጭት ያጸደቀው .......................................................................................................................................................--}}
                                        ፊርማ .............................።
                                    </p>
                                </div>
                            @endif
{{--                        @endif--}}


                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 )
                                @if($i = 0)@endif
                                @foreach($mastawokia as $ms)
                                    @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0
                                        &&   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                        @if($i++)@endif
                                    @endif
                                @endforeach
                            <div class="card-header bg-info  " style="color: white ;font-size: 15px"> {{$ken->name}}
                                ጠዋት[12:00-6:00] የተሞሉ
                                ማስታወቂያዎች ዝርዝር ቀን {{$ms->today_date}}
                            </div>



                                    {{--if $ms->mastawokia_tekuam == 0 &&  $ms->mastawokia_file == 0 && $ms->mastawokia_gize == 0 && $ms->fmmall != null--}}
                                    @foreach($mastawokia as $ms)
                                        @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0
                                            &&   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                            @if( $ms->mastawokia_tekuam == 0 &&  $ms->mastawokia_file == 0 && $ms->mastawokia_gize == 0 && $ms->rmall != null)
                                                <div
                                                    class="card-body table-bordered table-striped table-responsive form-group"
                                                    id="user_table">
                                                    <br>
                                                    <b>ማስታወቂያው ሚተላለፍበት ቀን እና ዕለቱ {{$ms->today_date}}
                                                        ፣{{$ms->programKen->name}}
                                                        ከ {!!  $ms->mastawokia_mitelalefbet!!}</b>
                                                    <p> Updated @ {{$ms->updated_at->diffForHumans()}}
                                                        by {{$ms->updated_by}}</p>
                                                    <p> ማስታወቂያውን የመዘገበው ሰም ፡{{$ms->user->name}}</p>

                                                    @if($ms->artayi == null)
                                                        <h4 class="bg-danger text-white">
                                                            የማስታወቂያው ኃላፊ አላረጋገጠውም ገና በሒደት ላይ ነው
                                                        </h4>
                                                    @else
                                                        <h4>ማስታወቂያውን ያረጋገጠው ሰም ፡ {{$ms->artayi}}</h4>
                                                    @endif
                                                    <b>{!! $ms->rmall !!}</b>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach





                                    <table class="table table-bordered table-striped table-responsive form-group"
                                   id="user_table">
                                @csrf
                                <thead class="table-bordered text-center">
                                <tr>
                                    <th>ተ.ቁ</th>
                                    <th>ቀን</th>
                                    {{--                                                <th>ማስታወቂያውን ሚተላለፍበት</th>--}}
                                    {{--                                                <TH>ዕለቱ</TH>--}}
                                    <TH>ማስታወቂያ አስነጋሪው</TH>
                                    <TH>ፋይል ስም</TH>
                                    <TH>ደቂቃ</TH>
                                    <TH>ሚተላለፍበትን ሰዓት</TH>
                                    <TH>ድግግሞሽ መጠን</TH>
{{--                                    <TH>የተስተናገደው መጠን</TH>--}}
                                    <th>ማስታወቂያውን የመዘገበው</th>
                                    <th>እንዲተላለፍ የፈቀደው</th>
                                </TR>
                                </thead>
                                @if($i = 0)@endif
                                @foreach($mastawokia as $ms)
                                    @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0
                                        &&   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                        @if($ms->rmall == null)
                                        <tbody>
                                        @if($i++)@endif
                                        <td>{{$i}}</td>
                                        <td> {{$ms->today_date}}</td>
                                        {{--                                                    <td>{!!  $ms->mastawokia_mitelalefbet!!}</td>--}}
                                        {{--                                                    <td>{!!  $ms->programKen->name !!}</td>--}}
                                        <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                        <td>{!!  $ms->mastawokia_file!!}</td>
                                        <td>{!!  $ms->mastawokia_gize!!}</td>
                                        <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                        <td>{!!  $ms->mastawokia_diggmosh!!}</td>
{{--                                        <td>{!!  $ms->mastawokia_Yetestenagedew_meten!!}</td>--}}
                                        <td>{{$ms->user->name}}</td>
                                        <td>{{$ms->artayi}}</td>
                                        </tbody>
                                    @endif
                                    @endif
                                @endforeach
                            </table>

                            <div class="col-md-12">
                                <br>
{{--                                <p> አዘጋጅ <b>{{$ms->user->name}}</b> &nbsp &nbsp;&nbsp&nbsp;&nbsp &nbsp &nbsp;&nbsp&nbsp;&nbsp--}}
{{--                                    &nbsp;&nbsp &nbsp;&nbsp--}}
{{--                                    ፊርማ .............................።<br>--}}
{{--                                </p>--}}
                                <br>

                              <b>  <p>
                                      የዕለቱን ስርጭት ያጸደቀው <b> {{auth()->user()->name}}</b> &nbsp;&nbsp &nbsp;&nbsp&nbsp;&nbsp
                                      &nbsp;&nbsp
                                      {{--                                የዕለቱን ስርጭት ያጸደቀው .......................................................................................................................................................--}}
                                      ፊርማ .............................።
                                  </p></b>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
            {{--            </div>--}}
        </div>
    </div>
</div>
</body>
</html>


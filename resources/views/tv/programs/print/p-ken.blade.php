@if($i = 0)@endif
@foreach($programtv as $pro)
@if($pro->program_ken_id === $ken->id
&&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ቀን[6:00 - 12:00]')
@if($i++)@endif
@endif
@endforeach



@if($i = 0)@endif
@foreach($mastawokiatv as $mtv)
@if($mtv->program_ken_id === $ken->id
&&   $mtv->is_transmit == 0 && $mtv->program_mitelalefbet == 'ቀን[6:00-12:00]')
@if($i++)@endif
@endif
@endforeach
    <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ዕለቱ @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 ) {{$mtv->name}}  ቀን[6:00-12:00]
        ቀን {{$mtv->today_date}} @else  {{$ken->name}} ቀን[6:00-12:00] ቀን {{$pro->today_date}} @endif  </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        @media print {
            body {
                /*margin: 0;*/
                /*padding: 0;*/
                /*font-size: 10px;*/
            }

            table,
            th,
            td {
                /*border: 1px solid black;*/
                /*border-collapse: collapse;*/
                /*width: 30%;*/
            }
        }
    </style>
</head>
<body class="pt-3 my-5 ">
<div class="content-header">
    <div class="container">
        <div class="row mb-2" style="margin-left: -15px; margin-right: -30px">
            {{--            <div class="col-sm-12">--}}
            <div class="container-fluid justify-content-sm-center">

                <div class="card">
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3 || \Illuminate\Support\Facades\Auth::user()->role_id == 4 || \Illuminate\Support\Facades\Auth::user()->role_id == 7)
                        <div class="text-center" style="color: red ;font-size: 30px">
                            <b>የቴሌቪዥን ፐሮግራሞች</b>
                        </div>
                        <div class="card-header bg-info  " style="color: white ;font-size: 20px"> {{$ken->name}}
                            ቀን[6:00 - 12:00]
                            የተሞሉ ፐሮግራሞች ዝርዝር
                        </div>
                        <div class="card-body">
                            @if($i = 0)@endif
                            @foreach($programtv as $pro)
                                @if($pro->program_ken_id === $ken->id
                                    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ቀን[6:00 - 12:00]')
                                    @if($i++)@endif
                                @endif
                            @endforeach
                            @csrf
                            @if($i == 0)
                                <div class="card-body">
                                    <p class="text-center"> ፐሮግራሞች የሉም </p>
                                </div>
                            @else
                                <div class="card-body table-bordered table-striped table-responsive form-group"
                                     id="user_table">
                                    @csrf
                                    @if($i = 0)@endif
                                    @foreach($programtv as $pro)
                                        @if($pro->program_ken_id === $ken->id
                                            &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ቀን[6:00 - 12:00]')

                                            @if($i++)@endif

                                            <b>ፕሮግራሙ ሚተላለፍበት ቀን እና ዕለቱ {{$pro->today_date}} ፣{{$pro->programKen->name}}
                                                ከ {{$pro->program_mitelalefbet}}  </b>
                                            {{--                                            <br> የፕሮግራሙን የመዘገበው {{$pro->user->name}}--}}
                                            <br>
                                            <br>
                                                <b>
                                                    ፕሮግራሙን የመዘገበው ሰም ፡ {{$pro->user->name}}
                                                    <br>
                                                    @if($pro->artayi == null)
                                                        <h4 class="bg-danger text-white">
                                                            የፕሮግራሙ ኃላፊ አላረጋገጠውም ገና በሒደት ላይ ነው
                                                        </h4>
                                                    @else
                                                        <h4>ፕሮግራሙን ያረጋገጠው ሰም ፡ {{$pro->artayi}}</h4>
                                                    @endif
                                                </b>
                                                <b>
                                                    @if($pro->supervisor == null)
                                                        <h4 class="bg-danger text-white">
                                                            ይህ ፕሮግራም በሱፐርቫይዘሩ እንዲተላለፍ አልተወሰነም ሱፐርቫዘሩን አነጋግር !!
                                                        </h4>
                                                    @else
                                                        <h4> ያረጋገጠው ሱፐርቫይዘር ሰም ፡ {{$pro->supervisor}}</h4>
                                                    @endif
                                                </b>
                                                <hr>
                                                {{--                                            <b>--}}
{{--                                                ፕሮግራሙን የመዘገበው ሰም ፡ {{$pro->user->name}}--}}
{{--                                                ፊርማ…..............................ቀን….................................--}}
{{--                                            </b>--}}
{{--                                            <br>   <br>--}}
{{--                                            <b>--}}
{{--                                                የዕለቱስአስፈፃሚ ሥም ፡ .....................................................--}}
{{--                                                ፊርማ…..............................ቀን….................................--}}
{{--                                            </b>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <b>--}}
{{--                                                እንዲተላለፍ የፈቀደው አስተባባሪ ወይም አርታኢ ሥም : {{auth()->user()->name}}--}}
{{--                                                ፊርማ…................................ቀን….......................--}}
{{--                                            </b>--}}
{{--                                            <br>--}}
{{--                                            <br>--}}
{{--                                            <b></b>--}}
                                            {{--                                            <div class="text-align: center " style="vertical-align: center">--}}
                                            {{--                                                <div class="">--}}
                                            <p style="margin-left: auto;margin-right: auto;position: absolute;">
                                                {!! $pro->program_yizet !!}
                                            </p>

                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}

                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
{{--                        <div class="col-md-12" style="font-size: 16px">--}}
{{--                            የስርጭትክፍሉ--}}
{{--                            አስተያየት....................................................................................................................................................................................................................--}}
{{--                            ..............................................................................................................................................................................................................፡፡--}}
{{--                            ሥም፡-...............................................................ፊርማ፡-..............................................ቀን፡-……………………………--}}

{{--                        </div>--}}
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9 || \Illuminate\Support\Facades\Auth::user()->role_id == 10 || \Illuminate\Support\Facades\Auth::user()->role_id == 7)

                        <div class="text-center" style="color: red ;font-size: 30px">
                            <b>የቴሌቪዥን ማስታወቂያ</b>
                        </div>
                        <div class="card-header bg-info" style="color: white ;font-size: 20px"> {{$ken->name}}
                            ቀን[6:00-12:00] የተሞሉ
                            ማስታወቂያዎች ዝርዝር
                        </div>
                        <table class="table table-bordered table-striped  form-group"
                               id="user_table">
                            @csrf
                            <thead class="table-bordered text-center">
                            <tr>
                                <th>#</th>
                                <th>ቀን</th>
                                <th>ፕሮግራሙ ሚተላለፍበት</th>
                                <TH>ዕለቱ</TH>
                                <TH>ማስታወቂያ አስነጋሪው</TH>
                                <TH>ፋይል ስም</TH>
                                <TH>ቪዲዮ አይዲ</TH>
                                <TH>ደቂቃ</TH>
                                <TH>ሚተላለፍበትን ሰዓት</TH>
                                <TH>ድግግሞሽ መጠን</TH>
                                <th>ማስታወቂያ የመዘገበው</th>
                                <th>እንዲተላለፍ የፈቀደው</th>
                            </TR>
                            </thead>
                            @if($i = 0)@endif
                            @foreach($mastawokiatv as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                       $ms->mastawokia_mitelalefbet == 'ቀን[6:00-12:00]')
                                    <tbody>
                                    @if($i++)@endif
                                    <td>{{$i}}</td>
                                    <td> {{$ms->today_date}}</td>
                                    <td>{!!  $ms->mastawokia_mitelalefbet!!}</td>
                                    <td>{!!  $ms->programKen->name !!}</td>
                                    <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                    <td>{!!  $ms->mastawokia_file!!}</td>
                                    <td>{!!  $ms->mastawokia_video_id!!}</td>
                                    <td>{!!  $ms->mastawokia_gize!!}</td>
                                    <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                    <td>{!!  $ms->mastawokia_diggmosh!!}</td>
                                    <td>{{$ms->user->name}}</td>
                                    <td>{{$ms->artayi}}</td>

                                    </tbody>
                                @endif
                            @endforeach

                        </table>
                        <div class="col-md-12">
                            <br><br>
                            <b>
                                የአዘጋጅ ሥም ፡ {{$ms->user->name}}
                                ፊርማ…..............................ቀን….................................
                            </b>
                            <br>
                            <br>
                            <b>
                                እንዲተላለፍ የፈቀደው አስተባባሪ ወይም ኃላፊ ሥም : {{auth()->user()->name}}
                                ፊርማ…................................ቀን….......................
                            </b>
                            <br>
                            የስርጭትክፍሉ
                            አስተያየት....................................................................................................................................................................................................................
                            ..............................................................................................................................................................................................................፡፡
                            ሥም፡-...............................................................ፊርማ፡-..............................................ቀን፡-……………………………
                            <br>
                            <br>
                            @if($c = 0)@endif
                            @foreach($mastawokiatv as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                       $ms->mastawokia_mitelalefbet == 'ቀን[6:00-12:00]')
                                    <tbody>
                                    @if($c++)@endif
                                    <div class="col-md-12">
                                        @if(trim($ms->mastawokia_text != ''))
                                            <b>
                                                የቴክስት ማስታዎቂያ ፡
                                                <hr>
                                            </b><p> #{{$c}} . {{$ms->mastawokia_text}}</p>
                                        @endif
                                    </div>
                                    </tbody>

                                @endif
                            @endforeach

                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


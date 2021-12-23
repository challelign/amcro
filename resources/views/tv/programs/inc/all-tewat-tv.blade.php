@extends('layouts.app')
@if($i = 0)@endif
@foreach($programtv as $pro)
    @if($pro->program_ken_id === $ken->id
    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
        @if($i++)@endif
    @endif
@endforeach



@if($i = 0)@endif
@foreach($mastawokiatv as $mtv)
    @if($mtv->program_ken_id === $ken->id
    &&   $mtv->is_transmit == 0 && $mtv->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
        @if($i++)@endif
    @endif
@endforeach
@section('content')
    <div class="container-fluid justify-content-sm-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <span id="result"></span>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3 || \Illuminate\Support\Facades\Auth::user()->role_id == 4 || \Illuminate\Support\Facades\Auth::user()->role_id == 7
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 13
                        || \Illuminate\Support\Facades\Auth::user()->role_id == 12)
                        <div class="text-center" style="color: red ;font-size: 30px">
                            <b>የቴሌቪዥን ፐሮግራሞች</b>
                        </div>
                        <div class="card-header bg-info  " style="color: white ;font-size: 20px"> {{$ken->name}}
                            ጠዋት[12:00-6:00]
                            የተሞሉ ፐሮግራሞች ዝርዝር
                        </div>
                        <div class="card-body">
                            @if($i = 0)@endif
                            @foreach($programtv as $pro)
                                @if($pro->program_ken_id === $ken->id
                                    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
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
                                            &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                            <tbody>
                                            @if($i++)@endif
                                            <td></td>
                                            <b>ፕሮግራሙ ሚተላለፍበት ቀን እና ዕለቱ {{$pro->today_date}} ፣{{$pro->programKen->name}}
                                                ከ {{$pro->program_mitelalefbet}}  </b>
                                            {{--                                            <br> የፕሮግራሙን የመዘገበው {{$pro->user->name}}--}}
                                            <br>
                                            <b>
                                                Updated @ {{$pro->updated_at->diffForHumans()}} by {{$pro->updated_by}}
                                            </b>
                                            <br>
                                            <b>
                                                ፕሮግራሙን የመዘገበው ሰም ፡ {{$pro->user->name}}
                                                <br>
                                                @if($pro->artayi == null)
                                                    <h4 class="bg-danger text-white">
                                                        የፕሮግራሙ ኃላፊ አላረጋገጠውም ገና በሒደት ላይ ነው
                                                    </h4>
                                                @else
                                                    <h4> ፕሮግራሙን ያረጋገጠው ሰም ፡ {{$pro->artayi}}</h4>
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
                                            {{--                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '3')--}}
                                            {{--                                                <br> <b>--}}
                                            {{--                                                    እንዲተላለፍ የፈቀደው አስተባባሪ ወይም አርታኢ ሥም : {{auth()->user()->name}}--}}
                                            {{--                                                    ፊርማ…................................ቀን….......................--}}
                                            {{--                                                </b>--}}
                                            {{--                                            @endif--}}
                                            <b>{!! $pro->program_yizet !!}</b>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '3' || \Illuminate\Support\Facades\Auth::user()->role_id ==  '4')
                                                <div class="row">
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                                        <form action="{{route('program-approve-all-tv',$pro->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @if($pro->is_artayi_check == 1)
                                                                አጽድቀሀል
                                                            @else
                                                                <button type="submit"
                                                                        class="btn btn-primary btn-sm my-2">
                                                                    አጽድቅ
                                                                </button>
                                                            @endif
                                                        </form>
                                                    @endif
                                                    <a href="{{route('program-list-by-date-edit-tv',$pro->id)}}"
                                                       class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                                                    <button class="btn btn-danger btn-sm my-2"
                                                            onclick="handelDelete({{$pro->id}})">
                                                        ሰርዝ
                                                    </button>
                                                </div>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '7')
                                                <td>
                                                    <form action="{{route('program-approve-tech-tv',$pro->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($pro->is_transmit == '0' && $pro->is_artayi_check == '1' && $pro->is_supervisor == 1)
                                                            <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                    style="width: 110px">
                                                                ተላልፏል ብለህ ላክ
                                                            </button>
                                                            <h4 class="bg-danger text-center text-white">ያልተላለፈ ፕሮግራም ካለ
                                                                የአስተያየት መስጫው ጋ ምክንያቱን
                                                                መዝግብ</h4>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '13')
                                                <td>
                                                    <form action="{{route('program-approve-supervisor-tv',$pro->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($pro->is_artayi_check == 1 && $pro->is_supervisor == 1)
                                                            <h4 class="bg-danger text-center text-white">አጽድቀሀል</h4>
                                                        @elseif($pro->is_artayi_check == 1 && $pro->is_supervisor == 0)
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-sm my-2">
                                                                ተረጋግጧል ብለህ ላክ
                                                            </button>
                                                        @else
                                                            <h3>ይህ ፕሮግራም በሱፐርቫይዘሩ እንዲተላለፍ አልተወሰነም በሒደት ላይ ነው </h3>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            </tbody>
                                        @endif
                                    @endforeach
                                </div>
                        @endif
                        @if($i = 0)@endif
                        @foreach($programtv as $pro)
                            @if($pro->program_ken_id === $ken->id
                        &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                @if($i++)@endif
                            @endif
                        @endforeach


                        {{--                    program delete    --}}
                        <!-- Modal -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                                 aria-labelledby="deleteModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post" id="deleteCategoryForm">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete ፐሮግራም </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold">
                                                    እርግጠኛ ነህ ይህ ፐሮግራም ይሰረዝ .?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,
                                                    Go
                                                    back
                                                </button>
                                                <button type="submit" class="btn btn-danger">Yes , Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '3'
                            || \Illuminate\Support\Facades\Auth::user()->role_id ==  '4'
                            || \Illuminate\Support\Facades\Auth::user()->role_id ==  '13'
                            || \Illuminate\Support\Facades\Auth::user()->role_id == '12')
                            {{--for only tv mastawokiya--}}
                            <div class="col-md-12 panel-primary card-header border-info "
                                 style="color: #1f6fb2; font-size: 15px">
                                የቴሌቪዥን ማስታወቂያ
                            </div>
                            <table class="table table-bordered table-striped table-responsive form-group"
                                   id="user_table">
                                @csrf
                                <thead class="table-bordered text-center">
                                <tr>
                                    <th>#</th>
                                    <th>ቀን</th>
                                    <th>updated</th>
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
                                    @if($ms->program_ken_id == $ken->id && $ms->is_artayi_check == 1  && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                           $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                        <tbody>
                                        @if($i++)@endif
                                        <td>{{$i}}</td>
                                        <td> {{$ms->today_date}}</td>
                                        <td>{{$ms->updated_at->diffForHumans()}} by {{$ms->updated_by}}</td>

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
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '13')
                                            <td>
                                                <form action="{{route('mastawokia-approve-supervisor-tv',$ms->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @if($ms->is_transmit == '0' && $ms->is_artayi_check == '1' && $ms->not_transmit == '0' && $ms->is_supervisor == 0)
                                                        <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                style="width: 110px">
                                                            ተረጋግጧል ብለህ ላክ
                                                        </button>
                                                    @else
                                                        <p class="bg-danger text-center text-white">አጽድቀሀል</p>

                                                    @endif
                                                </form>
                                            </td>
                                        @endif
                                        </tbody>
                                    @endif
                                @endforeach
                            </table>
                            @if($c = 0)@endif
                            @foreach($mastawokiatv as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_artayi_check == 1 && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                       $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
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
                        @endif
                    @endif



                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 9 || \Illuminate\Support\Facades\Auth::user()->role_id == 10 || \Illuminate\Support\Facades\Auth::user()->role_id == 7)

                        <div class="text-center" style="color: red ;font-size: 30px">
                            <b>የቴሌቪዥን ማስታወቂያ</b>
                        </div>
                        <div class="card-header bg-info" style="color: white ;font-size: 20px"> {{$ken->name}}
                            ጠዋት[12:00-6:00] የተሞሉ
                            ማስታወቂያዎች ዝርዝር
                        </div>
                        <table class="table table-bordered table-striped table-responsive form-group"
                               id="user_table">
                            @csrf
                            <thead class="table-bordered text-center">
                            <tr>
                                <th>#</th>
                                <th>ቀን</th>
                                <th>updated</th>
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
                                <th>ያረጋገጠው ሱፐርቫይዘር</th>
                            </TR>
                            </thead>
                            @if($i = 0)@endif
                            <tbody id="tablecontents">
                            @foreach($mastawokiatv as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                       $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')

                                    @if($i++)@endif
                                    <tr class="row1" data-id="{{ $ms->id }}">

                                        @if(trim($ms->mastawokia_text != ''))
                                            <td style="cursor: move" class="bg-info text-white">ቴ.ማ {{$i}}</td>
                                        @else
                                            <td style="cursor: move">{{$i}}</td>
                                        @endif
                                        <td style="cursor: move"> {{$ms->today_date}}</td>
                                        <td style="cursor: move">{{$ms->updated_at->diffForHumans()}}
                                            by {{$ms->updated_by}}</td>

                                        <td style="cursor: move">{!!  $ms->mastawokia_mitelalefbet!!}</td>
                                        <td>{!!  $ms->programKen->name !!}</td>
                                        <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                        <td>{!!  $ms->mastawokia_file!!}</td>
                                        <td>{!!  $ms->mastawokia_video_id!!}</td>
                                        <td>{!!  $ms->mastawokia_gize!!}</td>
                                        <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                        <td>{!!  $ms->mastawokia_diggmosh!!}</td>
                                        <td>{{$ms->user->name}}</td>
                                        <td>{{$ms->artayi}}</td>
                                        <td>{{$ms->supervisor}}</td>

                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '10' || \Illuminate\Support\Facades\Auth::user()->role_id ==  '9')
                                            <td>
                                                <a href="{{route('mastawokia-edit-tv',$ms->id)}}"
                                                   class="btn-sm btn btn-info  my-2 "> አስተካክል </a>

                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-sm my-2"
                                                        onclick="handelDeleteMastawokia({{$ms->id}})">
                                                    ሰርዝ
                                                </button>
                                            </td>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '7')
                                            <td>
                                                <form action="{{route('mastawokia-approve-tech-tv',$ms->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @if($ms->is_transmit == '0' && $ms->is_artayi_check == '1' && $ms->not_transmit == '0' && $ms->is_supervisor == '1')
                                                        <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                style="width: 110px">
                                                            ተላልፏል ብለህ ላክ
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                            <td>
                                                <form action="{{route('mastawokia-approve-tech-not-tv',$ms->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @if($ms->not_transmit == '0' && $ms->is_artayi_check == '1' && $ms->is_supervisor == '1')
                                                        <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                style="width: 110px">
                                                            አልተላለፈም ብለህ ላክ
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>

                                        @endif

                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 )
                                            <td>
                                                <form action="{{route('mastawokia-approve-artayi-tv',$ms->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @if($ms->is_artayi_check == 1)
                                                        አጽድቀሀል
                                                    @else
                                                        <button type="submit" class="btn btn-primary btn-sm my-2">
                                                            አጽድቅ
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        @endif
                                    </tr>

                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <h5>Drag and Drop the table rows and
                            <button class="btn btn-info"
                                    onclick="window.location.reload()"><b>REFRESH</b></button>
                        </h5>
                        @if($c = 0)@endif
                        @foreach($mastawokiatv as $ms)
                            @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                   $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')
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

                    @endif
                    <div class="row no-print">
                        <div class="col-md-10">
                            @if($i = 0)@endif
                            @foreach($programtv as $pro)
                                @if($pro->program_ken_id === $ken->id
                                &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                                    @if($i++)@endif
                                @endif
                            @endforeach
                            @if($i > 0)
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                                    <a href="{{route('program-list-by-date-tewat-print-tv',$ken->id)}}" target="_blank"
                                       class="btn btn-primary float-right"
                                       style="margin-right: 5px;">
                                        <i class="fas fa-download"></i>
                                        ፕሮግራሙን ፕሪትንት አርግ
                                    </a>
                                @endif
                            @endif
                            @if($x = 0)@endif
                            @foreach($mastawokiatv as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->not_transmit == '0' &&
                                       $ms->mastawokia_mitelalefbet == 'ጠዋት[12:00-6:00]')

                                    @if($x++)@endif
                                @endif
                            @endforeach

                            @if($x > 0)
                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10)
                                    <a href="{{route('program-list-by-date-tewat-print-tv',$ken->id)}}"
                                       target="_blank"
                                       class="btn btn-primary float-right"
                                       style="margin-right: 5px;">
                                        <i class="fas fa-download"></i>
                                        ፕሮግራሙን ፕሪትንት አርግ
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for Mastawokia -->

            <div class="modal fade" id="deleteModalMastawokia" tabindex="-1" role="dialog"
                 aria-labelledby="deleteModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" id="deleteCategoryFormMastawokia">
                        @method('delete')
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete ማስታወቂያ </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center text-bold">
                                    እርግጠኛ ነህ ይህ ማስታወቂያ ይሰረዝ.?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No,
                                    Go
                                    back
                                </button>
                                <button type="submit" class="btn btn-danger">Yes , Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        function handelDelete(id) {
            var form = document.getElementById('deleteCategoryForm');

            form.action = '../' + id + '/program-list-by-date-delete-tv/';
            // console.log('deleting .' , form);
            $('#deleteModal').modal('show')
        }
    </script>

    <script>
        function handelDeleteMastawokia(id) {
            var form = document.getElementById('deleteCategoryFormMastawokia');

            form.action = '../mastawokia/' + id + '/mastawokia-delete-tv/';
            // console.log('deleting .' , form);
            $('#deleteModalMastawokia').modal('show')
        }
    </script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('js/jquery-ui.css')}}">
    <script type="text/javascript">
        $(function () {
            $('#tablecontents').sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function () {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {

                var order = [];
                $('tr.row1').each(function (index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('tv/programs/{id}/program-list-by-date-tewat-tv') }}",
                    data: {
                        order: order,
                        _token: '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#result').html('<div class="alert alert-success">' + response.message +
                                '</div>');
                            // alert(response.message) //Message come from controller
                        } else {
                            console.log(response);
                        }
                    }
                });

            }
        });

    </script>
@endsection

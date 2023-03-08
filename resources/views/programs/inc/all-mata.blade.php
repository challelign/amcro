@extends('layouts.app')

@section('content')
    <div class="container-fluid justify-content-sm-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <span id="result"></span>
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 || \Illuminate\Support\Facades\Auth::user()->role_id == 2 || \Illuminate\Support\Facades\Auth::user()->role_id == 8 || \Illuminate\Support\Facades\Auth::user()->role_id == 12)
                        <div class="text-center" style="color: red ;font-size: 30px">
                            <b>የአማራ ራዲዮ ፐሮግራሞች</b>
                        </div>
                        <div class="card-header bg-info" style="color: white  ;font-size: 20px"> {{$ken->name}}
                            ማታ[12:00-6:00] የተሞሉ
                            ፐሮግራሞች ዝርዝር
                        </div>
                        <div class="col-md-12 panel-primary card-header  border-info "
                             style="color: #1f6fb2; font-size: 15px">
                            ፐሮግራሞች
                        </div>
                        <div class="card-body">
                            @if($i = 0)@endif
                            @foreach($program as $pro)
                                @if($pro->program_ken_id === $ken->id
                            &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ማታ[12:00-6:00]')
                                    @if($i++)@endif
                                @endif
                            @endforeach


                            @if($i == 0)
                                <div class="card-body">
                                    <p class="text-center"> ፐሮግራሞች የሉም </p>
                                </div>
                            @else

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

                                        <TH>ፕሮግራም አይዲ</TH>
                                        <TH>ፋይል ስም</TH>
                                        <TH>ደቂቃ</TH>
                                        <TH>ሚተላለፍበት ሰዓት</TH>
                                        <TH>የፕሮግራሙ ይዘት</TH>

                                        <TH>አርታኢ</TH>
                                        <TH>አዘጋጅ</TH>
                                        <th>የፕሮግራሙን የመዘገበው</th>

                                    </TR>
                                    </thead>

                                    @if($i = 0)@endif
                                    @foreach($program as $pro)
                                        @if($pro->program_ken_id === $ken->id
                                    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ማታ[12:00-6:00]')

                                            <tbody>
                                            @if($i++)@endif
                                            <td>{{$i}}</td>
                                            <td>{{$pro->today_date}}</td>
                                            <td>{{$pro->updated_at->diffForHumans()}} by {{$pro->updated_by}}</td>
                                            <td>{{$pro->program_mitelalefbet}}</td>
                                            <td>{{$pro->programKen->name}}</td>
                                            <td>{{$pro->programMeleya->name}}</td>
                                            <td>{{$pro->program_file}}</td>
                                            <td>{{$pro->program_minute}}</td>

                                            <td>{{$pro->program_mitelalefbet_seat}}
                                                - {{$pro->program_mitelalefbet_seat2}}</td>

                                            <td>{{$pro->program_yizet}}</td>

                                            <td>{{$pro->program_artayi}}</td>
                                            <td>{{$pro->program_azegagi}}</td>
                                            <td>{{$pro->user->name}}</td>

                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '1' || \Illuminate\Support\Facades\Auth::user()->role_id ==  '2')
                                                <td>
                                                    <a href="{{route('program-list-by-date-edit',$pro->id)}}"
                                                       class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm my-2"
                                                            onclick="handelDelete({{$pro->id}})">
                                                        ሰርዝ
                                                    </button>
                                                </td>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '8')
                                                <td>
                                                    <form action="{{route('program-approve-tech',$pro->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($pro->is_transmit == '0' && $pro->is_artayi_check == '1')
                                                            <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                    style="width: 110px">
                                                                ተላልፏል ብለህ ላክ
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1 )
                                                <td>
                                                    <form action="{{route('program-approve-all',$pro->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($pro->is_artayi_check == 1)
                                                            አጽድቀሀል
                                                        @else
                                                            <button type="submit" class="btn btn-primary btn-sm my-2">
                                                                አጽድቅ
                                                            </button>
                                                        @endif

                                                    </form>
                                                </td>
                                            @endif
                                            {{--                                    --}}
                                            {{--                                    <td>--}}
                                            {{--                                        <a href="{{route('program-list-by-date-edit',$pro->id)}}"--}}
                                            {{--                                           class="btn-sm btn btn-info  my-2 "> አስተካክል </a>--}}
                                            {{--                                    </td>--}}
                                            {{--                                    <td>--}}
                                            {{--                                        <button class="btn btn-danger btn-sm my-2" onclick="handelDelete({{$pro->id}})">--}}
                                            {{--                                            ሰርዝ--}}
                                            {{--                                        </button>--}}
                                            {{--                                    </td>--}}
                                            </tbody>
                                        @endif

                                    @endforeach
                                </table>
                            @endif

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
                                                    Are you sure you want to delete this ፐሮግራም .?
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


                            <div class="col-md-12 panel-primary card-header  border-info "
                                 style="color: #1f6fb2; font-size: 15px">
                                መረጃና ሙዚቃ
                            </div>

                            @if($i = 0)@endif
                            @foreach($mereja as $mer)
                                @if($mer->program_ken_id === $ken->id && $mer->is_transmit == 0 &&
                                       $mer->program_mitelalefbet == 'ማታ[12:00-6:00]')
                                    @if($i++)@endif
                                @endif
                            @endforeach
                            @if($i == 0)
                                <div class="card-body">
                                    <p class="text-center"> መረጃና ሙዚቃ የለም </p>
                                </div>
                            @else
                                <table class="table table-bordered table-striped table-responsive form-group"
                                       id="user_table">
                                    @csrf
                                    <thead class="table-bordered text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>ቀን</th>
                                        <th>ፕሮግራሙ ሚተላለፍበት</th>
                                        <TH>ዕለቱ</TH>
                                        <TH>መረጃ</TH>
                                        <TH>ሙዚቃ</TH>
                                        <th>የፕሮግራሙን የመዘገበው</th>
                                    </TR>
                                    </thead>
                                    @if($i = 0)@endif
                                    @foreach($mereja as $mer)
                                        @if($mer->program_ken_id === $ken->id && $mer->is_transmit == 0 &&
                                               $mer->program_mitelalefbet == 'ማታ[12:00-6:00]')
                                            @if($i++)@endif
                                            <tbody>

                                            <td>{{$i}}</td>
                                            <td> {{$mer->today_date}}</td>
                                            <td>{!!  $mer->program_mitelalefbet!!}</td>
                                            <td>{!!  $mer->programKen->name !!}</td>
                                            <td>{!!  $mer->mereja!!}</td>
                                            <td>{!! $mer->music !!}</td>
                                            <td>{!! $mer->user->name !!}</td>

                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '1' || \Illuminate\Support\Facades\Auth::user()->role_id ==  '2')
                                                <td>

                                                    <a href="{{route('program-mereja-music-edit',$mer->id)}}"
                                                       class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm my-2"
                                                            onclick="handelDeleteMereja({{$mer->id}})">
                                                        ሰርዝ
                                                    </button>
                                                </td>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '8')
                                                <td>
                                                    <form action="{{route('mereja-approve-tech',$mer->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($mer->is_transmit == '0' && $mer->is_artayi_check == '1')
                                                            <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                    style="width: 110px">
                                                                ተላልፏል ብለህ ላክ
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                            @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                                <td>
                                                    <form action="{{route('mereja-approve-artayi',$mer->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($mer->is_artayi_check == 1)
                                                            አጽድቀሀል
                                                        @else
                                                            <button type="submit" class="btn btn-primary btn-sm my-2">
                                                                አጽድቅ
                                                            </button>
                                                        @endif

                                                    </form>
                                                </td>
                                            @endif
                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            @endif

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
                                                    Are you sure you want to delete this ፐሮግራም .?
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


                            <!-- Modal for mereja -->
                            <div class="modal fade" id="deleteModalMereja" tabindex="-1" role="dialog"
                                 aria-labelledby="deleteModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post" id="deleteCategoryFormMereja">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete መረጃና ሙዚቃ </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold">
                                                    Are you sure you want to delete this መረጃና ሙዚቃ .?
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
                            {{--                        --}}



                        <!-- Modal for mereja -->
                            <div class="modal fade" id="deleteModalMereja" tabindex="-1" role="dialog"
                                 aria-labelledby="deleteModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post" id="deleteCategoryFormMereja">
                                        @method('delete')
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete መረጃና ሙዚቃ </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-center text-bold">
                                                    Are you sure you want to delete this መረጃና ሙዚቃ .?
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
                            {{--                        --}}

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
                                                    Are you sure you want to delete this ማስታወቂያ .?
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


                            <div class="col-md-12 panel-primary card-header  border-info "
                                 style="color: #1f6fb2; font-size: 15px">
                                ማስታወቂያ
                            </div>
                            @if($i = 0)@endif
                            @foreach($mastawokia as $ms)
                                @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 &&
                                       $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
                                    @if($i++)@endif
                                @endif
                            @endforeach

                            @if($i == 0)
                                <div class="card-body">
                                    <p class="text-center"> ማስታወቂያ የለም </p>
                                </div>
                            @else

                                    {{--if $ms->mastawokia_tekuam == 0 &&  $ms->mastawokia_file == 0 && $ms->mastawokia_gize == 0 && $ms->fmmall != null--}}
                                    @foreach($mastawokia as $ms)
                                        @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0
                                            &&   $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
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

                                                    <div class="row">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '10' ||\Illuminate\Support\Facades\Auth::user()->role_id == 9)

                                                            <div class="col-md-3">
                                                                <a href="{{route('mastawokia-edit-r-formupdate',$ms->id)}}"
                                                                   class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                                                                <button class="btn btn-danger btn-sm my-2"
                                                                        onclick="handelDeleteMastawokia({{$ms->id}})">
                                                                    ሰርዝ
                                                                </button>
                                                            </div>

                                                        @endif
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 )
                                                            <div class="col-md-2">
                                                                <form action="{{route('mastawokia-approve-artayi',$ms->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @if($ms->is_artayi_check == 1)
                                                                        አጽድቀሀል
                                                                    @else
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-sm my-2 px-2">
                                                                            አጽድቅ
                                                                        </button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                        @endif
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '8')
                                                            <div class="col-md-9 row">
                                                                <div class="col-md-3">
                                                                    <form action="{{route('mastawokia-approve-tech',$ms->id)}}"
                                                                          method="post">
                                                                        @csrf
                                                                        @if($ms->is_transmit == '0' && $ms->is_artayi_check == '1' && $ms->not_transmit == '0')
                                                                            <button type="submit" class="btn btn-primary btn-sm my-2">
                                                                                ተላልፏል ብለህ ላክ
                                                                            </button>
                                                                        @endif
                                                                    </form>

                                                                </div>
                                                                <div class="col-md-3">
                                                                    <form action="{{route('mastawokia-approve-tech-not',$ms->id)}}"
                                                                          method="post">
                                                                        @csrf
                                                                        @if($ms->is_artayi_check == '1' && $ms->not_transmit == '0')
                                                                            <button type="submit" class="btn btn-primary btn-sm my-2">
                                                                                አልተላለፈም ብለህ ላክ
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                <br><br>
                                                                <p class="bg-danger">ይህ የማስታወቂያ ዝርዝር ጥቅል ስለሆነ
                                                                    ያለተላለፈ ማስታወቂያ ካለ አስተያየት መስጫው ጋ ተዘርዝሮ ይጻፍ</p>

                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach




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
                                        <TH>ደቂቃ</TH>
                                        <TH>ሚተላለፍበት ሰዓት</TH>
                                        <TH>ድግግሞሽ መጠን</TH>
                                        <th>ማስታዎቂያውን የመዘገበው</th>
                                        <th>እንዲተላለፍ የፈቀደው</th>
                                    </TR>
                                    </thead>
                                    @if($i = 0)@endif
                                    @foreach($mastawokia as $ms)
                                        @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 && $ms->is_artayi_check == 1 &&
                                               $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
                                            @if($i++)@endif
                                                @if($ms->rmall == null)
                                            <tbody>

                                            <td>{{$i}}</td>
                                            <td> {{$ms->today_date}}</td>
                                            <td>{{$ms->updated_at->diffForHumans()}} by {{$ms->updated_by}}</td>

                                            <td>{!!  $ms->mastawokia_mitelalefbet!!}</td>
                                            <td>{!!  $ms->programKen->name !!}</td>
                                            <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                            <td>{!!  $ms->mastawokia_file!!}</td>
                                            <td>{!!  $ms->mastawokia_gize!!}</td>
                                            <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                            <td>{!!  $ms->mastawokia_diggmosh!!}</td>
                                            {{--                                            <td>{!!  $ms->mastawokia_Yetestenagedew_meten!!}</td>--}}
                                            <td>{!!  $ms->user->name!!}</td>
                                            <td>{!!  $ms->artayi!!}</td>


                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '8')
                                                <td>
                                                    <form action="{{route('mastawokia-approve-tech',$ms->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($ms->is_transmit == '0' && $ms->is_artayi_check == '1' && $ms->not_transmit == '0')
                                                            <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                    style="width: 110px">
                                                                ተላልፏል ብለህ ላክ
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="{{route('mastawokia-approve-tech-not',$ms->id)}}"
                                                          method="post">
                                                        @csrf
                                                        @if($ms->is_artayi_check == '1' && $ms->not_transmit == '0')
                                                            <button type="submit" class="btn btn-primary btn-sm my-2"
                                                                    style="width: 110px">
                                                                አልተላለፈም ብለህ ላክ
                                                            </button>
                                                        @endif
                                                    </form>
                                                </td>

                                            @endif
                                            </tbody>
                                        @endif
                                        @endif
                                    @endforeach
                                </table>
                            @endif






                            @endif

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 || \Illuminate\Support\Facades\Auth::user()->role_id == 9)

                                <div class="text-center" style="color: red ;font-size: 30px">
                                    <b>የአማራ ራዲዮ ማስታወቂያ</b>
                                </div>
                                <div class="card-header bg-info" style="color: white  ;font-size: 20px"> {{$ken->name}}
                                    ማታ[12:00-6:00] የተሞሉ
                                    ማስታወቂያዎች ዝርዝር
                                </div>


                                    {{--if $ms->mastawokia_tekuam == 0 &&  $ms->mastawokia_file == 0 && $ms->mastawokia_gize == 0 && $ms->fmmall != null--}}
                                    @foreach($mastawokia as $ms)
                                        @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0
                                            &&   $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
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

                                                    <div class="row">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '10' ||\Illuminate\Support\Facades\Auth::user()->role_id == 9)

                                                            <div class="col-md-3">
                                                                <a href="{{route('mastawokia-edit-r-formupdate',$ms->id)}}"
                                                                   class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                                                                <button class="btn btn-danger btn-sm my-2"
                                                                        onclick="handelDeleteMastawokia({{$ms->id}})">
                                                                    ሰርዝ
                                                                </button>
                                                            </div>

                                                        @endif
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 )
                                                            <div class="col-md-2">
                                                                <form action="{{route('mastawokia-approve-artayi',$ms->id)}}"
                                                                      method="post">
                                                                    @csrf
                                                                    @if($ms->is_artayi_check == 1)
                                                                        አጽድቀሀል
                                                                    @else
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-sm my-2">
                                                                            አጽድቅ
                                                                        </button>
                                                                    @endif
                                                                </form>
                                                            </div>
                                                        @endif
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '8')
                                                            <div class="col-md-6 row">
                                                                <div class="col-md-6">
                                                                    <form
                                                                        action="{{route('mastawokia-approve-tech',$ms->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @if($ms->is_transmit == '0' && $ms->is_artayi_check == '1')
                                                                            <button type="submit"
                                                                                    class="btn btn-primary btn-sm">
                                                                                ተላልፏል ብለህ ላክ
                                                                            </button>
                                                                        @endif
                                                                    </form>

                                                                </div>
                                                                <div class="col-md-6">
                                                                    <form
                                                                        action="{{route('mastawokia-approve-tech-not',$ms->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @if($ms->is_transmit == '0' && $ms->not_transmit == '0')
                                                                            <button type="submit"
                                                                                    class="btn btn-primary btn-sm">
                                                                                አልተላለፈም ብለህ ላክ
                                                                            </button>
                                                                        @endif
                                                                    </form>
                                                                </div>
                                                                <br><br>
                                                                <p class="bg-danger">ይህ የማስታወቂያ ዝርዝር ጥቅል ስለሆነ
                                                                    ያለተላለፈ ማስታወቂያ ካለ አስተያየት መስጫው ጋ ተዘርዝሮ ይጻፍ</p>

                                                            </div>
                                                        @endif

                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach



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
                                        <TH>ደቂቃ</TH>
                                        <TH>ሚተላለፍበት ሰዓት</TH>
                                        <TH>ድግግሞሽ መጠን</TH>
                                        {{--                                            <TH>የተስተናገደው መጠን</TH>--}}
                                        <th>ማስታወቂያ የመዘገበው</th>

                                        <th>እንዲተላለፍ የፈቀደው</th>

                                    </TR>
                                    </thead>
                                    @if($i = 0)@endif
                                    <tbody id="tablecontents">
                                    @foreach($mastawokia as $ms)
                                        @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 &&
                                               $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
                                            @if($i++)@endif
                                            @if($ms->rmall == null)
                                            <tr class="row1" data-id="{{ $ms->id }}">

                                                <td style="cursor: move">{{$i}}</td>
                                                <td style="cursor: move"> {{$ms->today_date}}</td>
                                                <td style="cursor: move">{{$ms->updated_at->diffForHumans()}}
                                                    by {{$ms->updated_by}}</td>

                                                <td style="cursor: move">{!!  $ms->mastawokia_mitelalefbet!!}</td>
                                                <td>{!!  $ms->programKen->name !!}</td>
                                                <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                                <td>{!!  $ms->mastawokia_file!!}</td>
                                                <td>{!!  $ms->mastawokia_gize!!}</td>
                                                <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                                <td>{!!  $ms->mastawokia_diggmosh!!}</td>
                                                {{--                                                <td>{!!  $ms->mastawokia_Yetestenagedew_meten!!}</td>--}}
                                                <td>{!!  $ms->user->name!!}</td>

                                                <td>{{$ms->artayi}}</td>
                                                @if(\Illuminate\Support\Facades\Auth::user()->role_id ==  '10' || \Illuminate\Support\Facades\Auth::user()->role_id ==  '9')
                                                    <td>
                                                        <a href="{{route('mastawokia-edit',$ms->id)}}"
                                                           class="btn-sm btn btn-info  my-2 "> አስተካክል </a>

                                                    </td>
                                                    <td>
                                                        <button class="btn btn-danger btn-sm my-2"
                                                                onclick="handelDeleteMastawokia({{$ms->id}})">
                                                            ሰርዝ
                                                        </button>
                                                    </td>
                                                @endif
                                                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 )
                                                    <td>
                                                        <form action="{{route('mastawokia-approve-artayi',$ms->id)}}"
                                                              method="post">
                                                            @csrf
                                                            @if($ms->is_artayi_check == 1)
                                                                አጽድቀሀል
                                                            @else
                                                                <button type="submit"
                                                                        class="btn btn-primary btn-sm my-2">
                                                                    አጽድቅ
                                                                </button>
                                                            @endif
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endif
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                                <h5>Drag and Drop the table rows and
                                    <button class="btn btn-info"
                                            onclick="window.location.reload()"><b>REFRESH</b></button>
                                </h5>
                            @endif
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
                                                Are you sure you want to delete this ማስታወቂያ .?
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
                        <div class="row no-print">
                            <div class="col-md-10">
                                @if($i = 0)@endif
                                @foreach($program as $pro)
                                    @if($pro->program_ken_id === $ken->id
                                &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ማታ[12:00-6:00]')
                                        @if($i++)@endif
                                    @endif
                                @endforeach
                                @if($i > 0)
                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                                        <a href="{{route('program-list-by-date-mata-print',$ken->id)}}" target="_blank"
                                           class="btn btn-primary float-right"
                                           style="margin-right: 5px;">
                                            <i class="fas fa-download"></i>
                                            ፕሮግራሙን ፕሪትንት አርግ
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="row no-print">
                            <div class="col-md-10">
                                @if($x = 0)@endif
                                @foreach($mastawokia as $ms)
                                    @if($ms->program_ken_id == $ken->id && $ms->is_transmit == 0 &&
                                           $ms->mastawokia_mitelalefbet == 'ማታ[12:00-6:00]')
                                        @if($x++)@endif
                                    @endif
                                @endforeach

                                @if($x > 0)
                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10)
                                        <a href="{{route('program-list-by-date-mata-print',$ken->id)}}" target="_blank"
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
        </div>
    </div>

@endsection
@section('js')
    <script>
        function handelDelete(id) {
            var form = document.getElementById('deleteCategoryForm');

            form.action = '../../programs/' + id + '/program-list-by-date-delete/';
            // console.log('deleting .' , form);
            $('#deleteModal').modal('show')
        }
    </script>
    <script>
        function handelDeleteMereja(id) {
            var form = document.getElementById('deleteCategoryFormMereja');

            form.action = '../../programs/' + id + '/program-mereja-music-delete/';
            // console.log('deleting .' , form);
            $('#deleteModalMereja').modal('show')
        }
    </script>


    <script>
        function handelDeleteMastawokia(id) {
            var form = document.getElementById('deleteCategoryFormMastawokia');

            form.action = '../mastawokia/' + id + '/mastawokia-delete/';
            // console.log('deleting .' , form);
            $('#deleteModalMastawokia').modal('show')
        }


        //check box
        var select_all = document.getElementById("select_all"); //select all checkbox
        var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items
        //select all checkboxes
        select_all.addEventListener("change", function (e) {
            for (i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = select_all.checked;
            }
        });
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener('change', function (e) { //".checkbox" change
                //uncheck "select all", if one of the listed checkbox item is unchecked
                if (this.checked == false) {
                    select_all.checked = false;
                }
                //check "select all" if all checkbox items are checked
                if (document.querySelectorAll('.checkbox:checked').length == checkboxes.length) {
                    select_all.checked = true;
                }
            });
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
                    url: "{{ url('programs/1/program-list-by-date-mata') }}",
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

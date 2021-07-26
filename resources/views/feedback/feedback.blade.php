@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 row">
                <div class="col-md-12">
                    <div class="card">
                        @if( \Illuminate\Support\Facades\Auth::user()->role_id == 7
                         || \Illuminate\Support\Facades\Auth::user()->role_id == 8)

                            <form action="{{route('feedback-save',auth()->user()->id)}}" method="post"
                                  class="form-group">
                                @csrf
                                <div class="card-body">
                                    {{--                                @include('layouts.errors')--}}
                                    <div class="card-header bg-info text-center" style="color: white ;font-size: 20px">
                                        በስርጭት ወቅት ያጋጠሙ ችግሮች-መስተካከል ያለባችውን መዝግብ
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="today_date"
                                                   class="col-md-12">ቀን</label>
                                            <div class="col-md-12">
                                                <input type="text" id="today_date"
                                                       class="form-control @error('today_date')  today_date is-invalid @enderror"
                                                       name="today_date" required
                                                       {{--                                               value="{{$todayDate}}" --}}
                                                       readonly
                                                       autofocus>
                                                @error('today_date')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="program_ken"
                                                   class="col-md-12">ዕለት ምረጥ</label>
                                            <div class="col-md-12">
                                                <select required class="form-control @error('program_ken')  program_ken
                                                    is-invalid @enderror" name="program_ken" id="program_ken" autofocus>
                                                    <option selected disabled>ይምረጡ</option>
                                                    @foreach($ken as $k)
                                                        <option value="{{$k->name}}">
                                                            {{$k->name}}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                @error('program_ken')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="program_mitelalefbet"
                                                   class="col-md-12">ስርጭቱ የተላለፈበትን ምዕራፍ ምረጥ</label>
                                            <div class="col-md-12">
                                                <select required class="form-control
                                                        @error('program_mitelalefbet')  program_mitelalefbet is-invalid
                                                        @enderror" name="program_mitelalefbet"
                                                        id="program_mitelalefbet">
                                                    <option selected disabled>ፕሮግራሙ ሚተላለፍበትን ሰዓት ይምረጡ</option>
                                                    <option value="ጠዋት[12:00-6:00]">
                                                        ጠዋት[12:00-6:00]
                                                    <option value="ቀን[6:00-12:00]">
                                                        ቀን[6:00-12:00]
                                                    </option>
                                                    <option value="ማታ[12:00-6:00]">
                                                        ማታ[12:00-6:00]
                                                    </option>
                                                    <option value="ሌሊት[6:00-12:00]">
                                                        ሌሊት[6:00-12:00]
                                                    </option>
                                                </select>

                                                @error('program_mitelalefbet')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>


                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="feedback_category"
                                                   class="col-md-12">ስርጭቱ የተላለፈበትን ሚዲየም ምረጥ</label>
                                            <div class="col-md-12">
                                                <select required class="form-control
                                                        @error('feedback_category')  feedback_category is-invalid
                                                        @enderror" name="feedback_category"
                                                        id="feedback_category">
                                                    <option selected disabled>ስርጭቱ የተላለፈበትን ሚዲየም ይምረጡ</option>

                                                    @if( \Illuminate\Support\Facades\Auth::user()->role_id == 8)
                                                        <option value="ኤፍኤም">
                                                            ኤፍኤም
                                                        </option>
                                                        <option value="ራዲዮ">
                                                            ራዲዮ
                                                        </option>
                                                    @endif

                                                    @if( \Illuminate\Support\Facades\Auth::user()->role_id == 7)
                                                        <option value="ቴሌቪዥን ">
                                                            ቴሌቪዥን
                                                        </option>
                                                    @endif


                                                </select>

                                                @error('feedback_category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>


                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="feedback"
                                               class="col-md-12">ዓስተያየት</label>
                                        <div class="form-group">
<textarea name="feedback" class="form-control @error('feedback')  feedback is-invalid
       @enderror " id="feedback"
          placeholder="  በእለቱ ስርጭት የነበሩ አስተያየት " cols="30" rows="10"></textarea>
                                            @error('feedback')
                                            <span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                               value=" መዝግብ"/>
                                    </div>
                                </div>
                            </form>
                        @endif

                        <div class="card-body">
                            <div class="card">
                                <div class="card-header bg-info text-center" style="color: white ;font-size: 20px">በስርጭት
                                    ወቅት ያጋጠሙ ችግሮች-መስተካከል ያለባችው ዝርዝር
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped table-responsive"
                                           id="dataTableAdmin" style="width:100%;margin-bottom: 3em;">
                                        <thead class=" table-bordered text-center">
                                        <tr>
                                            <th colspan="2">
                                                <select data-column="1" class="form-control filter-select">
                                                    <option value="">በቀን ፈልግ</option>
                                                    @foreach($feddate as $fc)
                                                        <option value="{{$fc}}">
                                                            {{$fc}}
                                                        </option>
                                                    @endforeach

                                                </select>
                                            </th>
                                            <th colspan="2">
                                                <select data-column="2" class="form-control filter-select">
                                                    <option value="">በሚተላለፍበት ምዕራፍ ፈልግ</option>
                                                    @foreach($fedken as $pe)
                                                        <option value="{{$pe}}">
                                                            {{$pe}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th colspan="1">
                                                <select data-column="3" class="form-control filter-select">
                                                    <option value="">በሚተላለፍበት ምዕራፍ ፈልግ</option>
                                                    @foreach($fedmeleya as $pe)
                                                        <option value="{{$pe}}">
                                                            {{$pe}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                            <th colspan="3">
                                                <select data-column="5" class="form-control filter-select">
                                                    <option value="">በሚተላለፍበት ዕለት ፈልግ</option>
                                                    @foreach($feedcategory as $p)
                                                        <option value="{{$p}}">
                                                            {{$p}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </th>
                                        <tr>
                                            <th>#</th>
                                            <TH>ቀን</TH>
                                            <TH>እለት</TH>
                                            <TH>ምዕራፍ</TH>
                                            <TH>የተሰጠው አስተያየት</TH>
                                            <TH>ሚዲየሙ</TH>
                                            <TH>የቴክኒሻኑ ስም</TH>
                                            @if( \Illuminate\Support\Facades\Auth::user()->role_id == 11)
                                                <th>Delete</th>
                                            @endif
                                        </tr>

                                        </thead>

                                        <tbody>
                                        @if($i =0)@endif
                                        @foreach($feedback as $pro)
                                            @if($i ++)@endif

                                            <tr>
                                                <td style="font-size: 11px">{{$i}}</td>
                                                <td>{{$pro->today_date}}</td>
                                                <td>{{$pro->program_ken}}</td>
                                                <td style="font-size: 11px">{{$pro->program_mitelalefbet}}</td>
                                                <td>{{$pro->feedback}}</td>
                                                <td>{{$pro->feedback_category}}</td>
                                                <td>{{$pro->user->name}}</td>
                                                @if( \Illuminate\Support\Facades\Auth::user()->role_id == 11)
                                                    <form action="{{route('feedback-delete',$pro->id)}}">
                                                        @csrf
                                                        <td>
                                                            <button class="btn btn-danger btn-sm my-2">
                                                                Delete
                                                            </button>
                                                        </td>
                                                    </form>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class=" text-center">
                                        <tr>
                                            <th>#</th>
                                            <TH>ቀን</TH>
                                            <TH>እለት</TH>
                                            <TH>ምዕራፍ</TH>
                                            <TH>የተሰጠው አስተያየት</TH>
                                            <TH>ሚዲየሙ</TH>
                                            <TH>የቴክኒሻኑ ስም</TH>

                                            @if( \Illuminate\Support\Facades\Auth::user()->role_id == 11)
                                                <th>Delete</th>
                                            @endif
                                        </tr>

                                        </tfoot>


                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script src="{{asset('js/jquery.min.js')}}"></script>

@section('js')




    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/datatables.js')}}" defer></script>
    <script>
        $(document).ready(function () {
            var table = $('#dataTableAdmin').DataTable({
                "order": [[0, 'desc'], [1, 'desc']]
            });
            $('.filter-select').change(function () {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });
        });
    </script>
    {{--@endsection--}}
    {{--@section('js')--}}
    {{--    <link rel="stylesheet" href="{{asset('css/jquery.calendars.picker.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

    {{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}

    <script src="{{asset('js/jquery.plugin.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>

    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>
    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>
    <script>
        $('#configPicker').datepick({showTrigger: '#calImg'});
        $('#today_date').calendarsPicker({calendar: calendar, onSelect: showDate});

    </script>
    <script>

        $(function () {
            var calendar = $.calendars.instance('ethiopian', 'am');
            $('#today_date').calendarsPicker({
                calendar: calendar,
                dateFormat: "dd/mm/yyyy",
                animate: true,
// miniDate:new Date(),
// dateFormat: "mm-dd-yyyy",
                maxDate: 1,
                minDate: 0,

            });
// $('#today_date').calendarsPicker({calendar: calendar, onSelect: showDate});

        });
    </script>




@endsection



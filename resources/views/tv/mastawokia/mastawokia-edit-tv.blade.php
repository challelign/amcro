@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.errors')
                @include('layouts.tv')
                <div class="card ">
                    <div class="card-header" style="font-size: 20px">
                        የአማራ ቴሌቪዥን ዛሬ ሚተላለፉ ማስታወቂያዎችን አስተካክለህ መዝግብ
                        @if($todayDate = date("d-m-yy"))
                        @endif
                    </div>
                    @include('layouts.errors')
                    <form action="{{route('mastawokia-update-tv',$mastawokia->id)}}" method="post" id="dynamic_form" class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="today_date"
                                           class="col-md-12">ቀን *</label>
                                    <div class="col-md-12">
                                        <input type="text" id="today_date"
                                               class="form-control @error('today_date')  today_date is-invalid @enderror"
                                               name="today_date" value="{{$mastawokia->today_date}}" readonly
                                               autofocus>
                                        @error('today_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program_ken_id"
                                           class="col-md-12">እለት ምረጥ*</label>
                                    <div class="col-md-12">
                                        <select required class="form-control" name="program_ken_id" id="program_ken_id">
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}"
                                                        @if(isset($mastawokia))
                                                        @if($k->id === $mastawokia->program_ken_id)
                                                        selected
                                                    @endif
                                                    @endif >
                                                    {{$k->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mastawokia_mitelalefbet"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት*</label>
                                    <div class="col-md-12 form-group">
                                        <select required class="form-control" name="mastawokia_mitelalefbet">


                                            <option value="{{$mastawokia->mastawokia_mitelalefbet}}">
                                                {{$mastawokia->mastawokia_mitelalefbet}}</option>
                                            <option value="ጠዋት[12:00-6:00]">
                                                ጠዋት[12:00-6:00]
                                            </option>

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
                                    </div>
                                </div>

                            </div>

                            <table class="table table-bordered table-striped table-responsive form-group"
                                   id="user_table">
                                @csrf
                                <thead class="table-bordered text-center">
                                <tr>
                                    <TH>ማስታወቂያ አስነጋሪው*</TH>
                                    <TH>ፋይል ስም*</TH>
                                    <TH>ቪዲዮ አይዲ*</TH>
                                    <TH>ደቂቃ*</TH>
                                    <TH>ሚተላለፍበትን ሰዓት*</TH>
                                    <TH>ድግግሞሽ መጠን*</TH>
{{--                                    <TH>የተስተናገደው መጠን *</TH>--}}
                                </TR>
                                </thead>
                                <tbody>
                                <td><input type="text" name="mastawokia_tekuam" required id="mastawokia_tekuam" value="{{$mastawokia->mastawokia_tekuam}}" class="form-control"/></td>
                                <td><input type="text" name="mastawokia_file" required id="mastawokia_file"  value="{{$mastawokia->mastawokia_file}}" class="form-control"/></td>
                                <td><input type="text" name="mastawokia_video_id" required id="mastawokia_video_id"  value="{{$mastawokia->mastawokia_video_id}}" class="form-control"/></td>
                                <td><input type="text" name="mastawokia_gize" id="mastawokia_gize" required value="{{$mastawokia->mastawokia_gize}}"  class="form-control"/></td>
                                <td><input type="text" name="mastawokia_mitelalefbet_seat" id="mastawokia_mitelalefbet_seat"  value="{{$mastawokia->mastawokia_mitelalefbet_seat}}" required class="form-control"/></td>
                                <td><input type="number" name="mastawokia_diggmosh" id="mastawokia_diggmosh" min="1" value="{{$mastawokia->mastawokia_diggmosh}}"  required class="form-control"/></td>
{{--                                <td><input type="number" name="mastawokia_Yetestenagedew_meten" min="1" id="mastawokia_Yetestenagedew_meten" value="{{$mastawokia->mastawokia_Yetestenagedew_meten}}"  required class="form-control"/></td>--}}

                                </tbody>
                            </table>
                            <label for="mastawokia_text"> የቴክስት ማስታዎቂያ:</label>
                            <div class="col-md-12">
                                    <textarea type="text" class="form-control" cols="5" rows="3" name="mastawokia_text"
                                              id="mastawokia_text">{{$mastawokia->mastawokia_text}}</textarea>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <a href="{{route('program-list-by-date-tv',$mastawokia->ProgramKen->id)}}" type="submit" class="btn btn-info ">
                                        ተመለስ
                                    </a>
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value="መዝግብ"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{asset('js/jquery.min.js')}}"></script>

@section('js')


    <script src="{{asset('js/jquery.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

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
                maxDate: 6,
                minDate: 0,

            });
            // $('#today_date').calendarsPicker({calendar: calendar, onSelect: showDate});

        });
    </script>

@endsection
@section('js')

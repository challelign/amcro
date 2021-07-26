@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    @include('layouts.errors')
                    <div class="card-header" style="font-size: 20px">
                        ዛሬ ሚተላለፉ ፕሮግራሞችን መዝግብ
                        @if($todayDate = date("d-m-yy"))
                        @endif
                    </div>
                    <form action="{{route('program-list-by-date-update-tv',$programtv->id)}}" method="post"
                          class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="row">
                                {{--                                {{$program->today_date}}--}}
                                <div class="form-group col-md-4">
                                    <label for="today_date"
                                           class="col-md-12">ቀን</label>
                                    <div class="col-md-12">
                                        <input type="text" id="today_date"
                                               class="form-control @error('today_date')  today_date is-invalid @enderror"
                                               name="today_date" value="{{$programtv->today_date}}" readonly
                                               autofocus>
                                        @error('today_date')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program_ken"
                                           class="col-md-12">ዕለት ምረጥ</label>
                                    <div class="col-md-12">
                                        <select required class="form-control" name="program_ken" id="program_ken">
                                            <option
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}"
                                                        @if(isset($programtv))
                                                        @if($k->id === $programtv->program_ken_id)
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
                                    <label for="title"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት</label>
                                    <div class="col-md-12 form-group">
                                        <select required class="form-control" name="program_mitelalefbet">
{{--                                            @foreach($tvm as $tm)--}}
{{--                                                <option value="{{$tm->id}}"--}}
{{--                                                        @if(isset($programtv))--}}
{{--                                                        @if($tm->id === $programtv->program_mitelalefbet)--}}
{{--                                                        selected--}}
{{--                                                    @endif--}}
{{--                                                    @endif >--}}
{{--                                                    {{$tm->name}}--}}
{{--                                                </option>--}}
                                                <option value="{{$programtv->program_mitelalefbet}}">
                                                    {{$programtv->program_mitelalefbet}}</option>
                                                <option value="ጠዋት[12:00-6:00]">
                                                    ጠዋት[12:00-6:00]
                                                </option>
                                                <option value="ቀን[6:00 - 12:00]">
                                                    ቀን[6:00 - 12:00]
                                                </option>
                                                <option value="ማታ[12:00 - 6:00]">
                                                    ማታ[12:00 - 6:00]
                                                </option>
                                                <option value="ሌሊት[6:00 - 12:00]">
                                                    ሌሊት[6:00 - 12:00]
                                                </option>
{{--                                            @endforeach--}}


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pcontent ">
                                    <label for="title" class="col-md-12">ፕሮግራሞችን አስተካክለህ መዝግብ</label>
                                    <div class="col-md-12 form-group pcontent">
                                                <textarea type="text" id="tv"
                                                          class="form-control prod_price"
                                                          name="program_yizet" style="width: 400px">{!! $programtv->program_yizet !!}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <a href="{{route('program-list-by-date-tewat-tv',$programtv->programKen->id)}}"
                                       type="submit"
                                       class="btn btn-info ">
                                        ተመለስ
                                    </a>
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value=" አስተካክለህ መዝግብ"/>
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
    </script>


<script src = "{{asset('js/jquery.min.js')}}" ></script>

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
    ClassicEditor.create(document.getElementById('tv'), {}).then(editor => {
        window.editor = editor;
        editor.ui.view.editable.element.style.height = '350px';

    })
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
    });
</script>
@endsection


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

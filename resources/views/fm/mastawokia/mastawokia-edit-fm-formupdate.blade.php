@extends('layouts.app')
@section('css')
    {{--    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/jquery.calendars.picker.css')}}">--}}

@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.errors')

                @include('layouts.fm')
                <div class="card ">

                    <div class="card-header" style="font-size: 20px">
                        ባሕርዳር ኤፍኤም ዛሬ ሚተላለፉ ማስታወቂያ መዝግብ
                        @if($todayDate = date("d-m-yy"))
                        @endif
                    </div>
                    @include('layouts.errors')
                    <form action="{{route('mastawokia-update-fm-formnewsave',$mastawokia->id)}}"  method="post" id="SubmitForm" class="form-group">
                        @csrf

                        <div class="card-body">

                            <div class="float-right">
                                <a href={{route('mastawokia-create-fm')}} type="submit" class="btn btn-danger ">
                                    ወደ ዋናው መመዝገቢያ
                                </a>
                            </div>

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

                            <div class="form-group col-md-12 ">
                                <label for="fmmastawokiaall"
                                       class="col-md-12" style="color: red; font-size: 14px">ማስታወቂያ አስነጋሪው * ፋይል ስም* ደቂቃ
                                    * ሚተላለፍበትን ሰዓት * ድግግሞሽ መጠን *</label>

                                <textarea type="text" id="fmmall" class="form-control" value="" name="fmmall">{{$mastawokia->fmmall}}</textarea>
                                <span class="text-danger" id="fmmallErrorMsg"></span>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value="አስተካክለህ መዝግብ"/>
                                </div>
                            </div>

                            <span id="result"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

<script>
    $(document).ready(function () {
        ClassicEditor.create(document.getElementById('fmmall'), {}).then(editor => {
            window.editor = editor;
            editor.ui.view.editable.element.style.height = '300px';
        })
    })


</script>

@section('js')



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
        });
    </script>

@endsection

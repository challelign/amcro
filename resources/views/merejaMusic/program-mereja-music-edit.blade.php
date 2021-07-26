@extends('layouts.app')
@section('css')
    <style>

        .ck-editor__editable {
            min-height: 300px;
        }

    </style>
{{--    <link type="text/css" href="{{asset('ckeditor/sample/css/sample.css')}}" rel="stylesheet" media="screen"/>--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{route('program-mereja-music-update' , $mereja->id)}}" method="post">
                    @include('layouts.errors')
                    @csrf
                    @if($todayDate = date("d-m-yy"))
                    @endif
                    <div class="card">
                        <div class="card-header " style="font-size: 20px">የ {{$mereja->programKen->name}} መረጃና ሙዚቃ
                            ማስተካክል
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="today_date"
                                           class="col-md-12">ቀን</label>
                                    <div class="col-md-12">
                                        <input type="text" id="today_date"
                                               class="form-control @error('today_date')  today_date is-invalid @enderror"
                                               name="today_date" value="{{$mereja->today_date}}" readonly
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
                                           class="col-md-12">ቀን ምረጥ</label>
                                    <div class="col-md-12">
                                        <select required
                                                class="form-control @error('program_ken_id')  program_ken_id is-invalid @enderror"
                                                name="program_ken_id" id="program_ken_id">
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}"
                                                        @if(isset($mereja))
                                                        @if($k->id === $mereja->program_ken_id)
                                                        selected
                                                    @endif
                                                    @endif >
                                                    {{$k->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('program_ken_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት</label>
                                    <div class="col-md-12 form-group">
                                        <select required
                                                class="form-control @error('program_mitelalefbet')  program_mitelalefbet is-invalid @enderror"
                                                name="program_mitelalefbet">
                                            <option value="{{$mereja->program_mitelalefbet}}">
                                                {{$mereja->program_mitelalefbet}}</option>
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
                                        @error('program_mitelalefbet')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="mereja"
                                       class="col-md-12">መረጃ አስገባ :</label>
                                <div class="col-md-12">
                                <textarea type="text" id="mereja" rows="10" cols="20"
                                          class="form-control @error('mereja')  mereja is-invalid @enderror"
                                          minlength="10"
                                          placeholder="መረጃ አስገባ .. .."
                                          style="width: 100%; height: 900px; font-size: 14px;"
                                          name="mereja"
                                          autofocus>{!! $mereja->mereja !!}</textarea>
                                    @error('mereja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="music"
                                       class="col-md-12">ሙዚቃ አስገባ :</label>
                                <div class="col-md-12">
                                <textarea type="text" id="music" rows="10" cols="20"
                                          class="form-control @error('music')  music is-invalid @enderror"
                                          minlength="10"
                                          placeholder="ሙዚቃ አስገባ  .. .."
                                          style="width: 100%; height: 900px; font-size: 14px;"
                                          name="music"
                                          autofocus>{!! $mereja->music !!}</textarea>
                                    @error('music')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-md-4">
                                    <a href="{{route('home')}}" type="submit" class="btn btn-info ">
                                        ተመለስ
                                    </a>
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value="  ሙዚቃና መረጃ መዝግብ "/>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src = "{{asset('js/jquery.min.js')}}" ></script>

    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">

        <script src="{{asset('js/jquery.plugin.js')}}"></script>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script>
        ClassicEditor.create(document.querySelector('#mereja'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]

        })
            .then(editor => {
                window.editor = editor;
                editor.ui.view.editable.element.style.height = '300px';

            })
            .catch(err => {
                console.error(err.stack);
            });
        ClassicEditor.create(document.querySelector('#music'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]

        })
            .then(editor => {
                window.editor = editor;
                editor.ui.view.editable.element.style.height = '300px';

            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
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

        $(function() {
            var calendar = $.calendars.instance('ethiopian','am');
            $('#today_date').calendarsPicker({
                calendar: calendar,
                dateFormat: "dd/mm/yyyy",
                animate:true,
                // miniDate:new Date(),
                // dateFormat: "mm-dd-yyyy",
                maxDate:6,
                minDate:0,

            });
            // $('#today_date').calendarsPicker({calendar: calendar, onSelect: showDate});

        });
    </script>

@endsection

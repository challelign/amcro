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

                @include('layouts.tv')
                <div class="card ">

                    <div class="card-header" style="font-size: 20px">
                        የአማራ ቴሌቪዥን ዛሬ ሚተላለፉ ማስታወቂያዎችን መዝግብ
                        @if($todayDate = date("d-m-yy"))
                        @endif
                    </div>
                    @include('layouts.errors')
                    <form action="" method="post" id="SubmitForm" class="form-group">
                        @csrf
{{--                        <span id="result"></span>--}}

                        <div class="card-body">

                            <div class="float-right">
                                <a href={{route('mastawokia-create-tv')}} type="submit" class="btn btn-danger ">
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
                                               name="today_date"
                                               readonly
                                               autofocus>
                                        {{-- @error('today_date')
                                         <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                         @enderror--}}
                                    </div>
                                    <span class="text-danger" id="todaydateErrorMsg"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="program_ken_id"
                                           class="col-md-12">እለት ምረጥ*</label>
                                    <div class="col-md-12">
                                        <select required class="form-control" name="program_ken_id" id="program_ken_id">
                                            <option selected disabled>ይምረጡ</option>
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}">
                                                    {{$k->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger" id="programkenErrorMsg"></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mastawokia_mitelalefbet"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት*</label>
                                    <div class="col-md-12 form-group">
                                        <select required class="form-control" name="mastawokia_mitelalefbet"
                                                id="mastawokia_mitelalefbet">
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
                                    </div>
                                    <span class="text-danger" id="mastawokiamitelalefbetErrorMsg"></span>
                                </div>
                            </div>
                            <div class="form-group col-md-12 ">
                                <label for="fmmastawokiaall"
                                       class="col-md-12" style="color: red; font-size: 14px">ማስታወቂያ አስነጋሪው * ፋይል ስም* ደቂቃ
                                    * ሚተላለፍበትን ሰዓት * ድግግሞሽ መጠን *</label>

                                <textarea type="text" id="tvmall" class="form-control" value="" name="tvmall"></textarea>
                                <span class="text-danger" id="fmmallErrorMsg"></span>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value=" መዝግብ"/>
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
        ClassicEditor.create(document.getElementById('tvmall'), {}).then(editor => {
            window.editor = editor;
            editor.ui.view.editable.element.style.height = '300px';
        })
    })


</script>

@section('js')

    <script>
        function resetForm() {
            $('#SubmitForm')[0].reset();
        }
        function reloadPage() {
            location.reload(true);
        }

        $(document).ready(function () {
            $('#SubmitForm').on('submit', function (e) {
                e.preventDefault();
                let today_date = $('#today_date').val();
                let program_ken_id = $('#program_ken_id').val();
                let mastawokia_mitelalefbet = $('#mastawokia_mitelalefbet').val();
                let fmmallnew = $('#tvmall').val();

                $.ajax({
                    url: '{{route('mastawokia-save-formnew-tv')}}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        today_date: today_date,
                        program_ken_id: program_ken_id,
                        mastawokia_mitelalefbet: mastawokia_mitelalefbet,
                        tvmall: fmmallnew
                    },
                    success: function (response) {

                        $('#result').html('<div class="alert alert-success">' + response.success +
                            '</div>');

                        setTimeout(reloadPage, 1000);
                        resetForm();

                    }


                    ,
                    error: function (response) {
                        $('#todaydateErrorMsg').text(response.responseJSON.errors.today_date);
                        $('#programkenErrorMsg').text(response.responseJSON.errors.program_ken_id);
                        $('#mastawokiamitelalefbetErrorMsg').text(response.responseJSON.errors.mastawokia_mitelalefbet);
                        $('#fmmallErrorMsg').text(response.responseJSON.errors.tvmall);
                    },
                });
            });

        });
    </script>



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

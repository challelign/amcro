@extends('layouts.app')

@section('css')
{{--    <link rel="stylesheet" href="{{asset('css/jquery.calendars.picker.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
@endsection
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
                    @include('layouts.errors')
                    <form action="" method="post" id="dynamic_form" class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
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
                                <div class="form-group col-md-4">
                                    <label for="program_ken"
                                           class="col-md-12">ዕለት ምረጥ</label>
                                    <div class="col-md-12">
                                        <select required class="form-control" name="program_ken" id="program_ken">
                                            <option selected disabled>ይምረጡ</option>
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}">
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
                                        <label>
                                            <select required class="form-control" name="program_mitelalefbet">
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
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-bordered table-striped table-responsive form-group"
                                   id="user_table">
                                @csrf
                                <thead class="table-bordered text-center">
                                <tr>
                                    <TH>ፕሮግራም አይዲ</TH>
                                    <TH>ፋይል ስም</TH>
                                    <TH>ደቂቃ</TH>
                                    <TH>ሚተላለፍበትን ሰዓት</TH>
                                    <TH>የፕሮግራሙ ይዘት *</TH>
                                    <TH>የፕ/አርታኢ *</TH>
                                    <TH>የፕ/አዘጋጅ *</TH>
                                </TR>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <a href="" type="submit" class="btn btn-info ">
                                        ተመለስ
                                    </a>
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value=" ወደ ቅርብ ሀላፊ ላክ"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--<link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">--}}

<script src="{{asset('js/jquery.min.js')}}"></script>

@section('js')
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



{{--@section('js')--}}
    <script>
        $(document).ready(function () {
            var count = 1;
            dynamic_field(count);
            // count++;
            function dynamic_field(number) {
                html = '<tr>';
                html += '<td><select required name ="program_meleya_id[]"  class="form-control"><option  selected disabled value="">ፕሮግራም አይዲ ይምረጡ</option> @foreach($programmeleyaid as $pm ) @if($pm->expire_contract == '0') <option value="{{$pm->id}}"> {{$pm->name}}</option> @endif @endforeach </select></td>';
                // id="program_mitelalefbet_seat'+count+'"
                {{--html += '<td><div class="col-md-12" name ="program_meleya_id" ><select class="form-control" required name="program_meleya_id[]"> <option selected disabled>ፕሮግራም አይዲ ይምረጡ</option>@foreach($programmeleyaid as $pm) <option value="{{$pm->id}}"> {{$pm->name}}</option> @endforeach </select> </div></td>';--}}
                html += '<td><input type="text" name="program_file[]" required id="program_file" class="form-control"/></td>';
                html += '<td> <input type="text" name="program_minute[]" id="" required class="form-control"/></td>';
                html += '<td> <input type="time" name="program_mitelalefbet_seat[]" id="program_mitelalefbet_seat" required class="form-control"/>  ' +
                    '<b class="text-center" style="padding-left: 50px">እስከ</b> ' +
                    ' <input type="time" name="program_mitelalefbet_seat2[]" id="program_mitelalefbet_seat2"  required class="form-control"/></td>';

                // '<td> <input type="time" name="program_mitelalefbet_seat[]" id="program_mitelalefbet_seat"  required class="form-control"/></td>';

                // html += '<td> <input type="time" name="program_mitelalefbet_seat2[]" id="program_mitelalefbet_seat2"  required class="form-control"/></td>';

                html += '<td><textarea class="form-control" name="program_yizet[]" id="program_yizet" rows="5" cols="25" minlength="5" required placeholder="ይዘት  ..."></textarea></td>';
                html += '<td><input type="text" name="program_artayi[]" required id="program_artayi" class="form-control"</td>';
                html += '<td><input type="text" name="program_azegagi[]" required id="program_azegagi[]" class="form-control"/></td>';
                if (number > 1) {
                    html += '<td><button type="button" name="remove" id=""  class="btn btn-danger remove btn-sm">ቀንስ  </button></td></tr>';
                    $('tbody').append(html);
                } else {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success btn-sm">ጨምር</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function () {
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function () {
                count--;
                $(this).closest("tr").remove();
            });

            $('#dynamic_form').on('submit', function (event) {
                event.preventDefault();
                $.ajax({
                    url: '{{route('program-save')}}',
                    method: 'post',
                    data: $(this).serialize(),
                    dataType: 'json',
                    // beforeSend: function () {
                    //     $('#save').attr('disabled', 'disabled');
                    // },
                    success: function (data) {
                        if (data.error) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<p>' + data.error[count] + '</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                        } else {
                            dynamic_field(1);
                            $('#result').html('<div class="alert alert-success">' + data.success +

                                '</div>');

                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });
        });

    </script>
{{--@endsection--}}




{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}

{{--    <link rel="stylesheet" href="{{asset('css/redmond.calendars.picker.css')}}">--}}

{{--    <script src="{{asset('js/jquery.plugin.js')}}"></script>--}}

{{--    <script src="{{asset('js/jquery.calendars.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>--}}

{{--    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>--}}



{{--@endsection--}}
{{--@section('js')--}}
{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}

{{--    <script src="{{asset('js/jquery.plugin.js')}}"></script>--}}

{{--    <script src="{{asset('js/jquery.calendars.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.plus.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.picker.js')}}"></script>--}}

{{--    <script src="{{asset('js/jquery.calendars.ethiopian.js')}}"></script>--}}
{{--    <script src="{{asset('js/jquery.calendars.ethiopian-am.js')}}"></script>--}}
{{--    <script type="text/javascript" src="{{asset('js/jquery.calendars.picker-am.js')}}"></script>--}}
{{--    <script>--}}
{{--        $(function() {--}}
{{--            var calendar = $.calendars.instance('ethiopian','am');--}}
{{--            $('#today_date').calendarsPicker({calendar: calendar});--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}

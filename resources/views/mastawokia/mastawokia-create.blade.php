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
                @include('layouts.radio')
                <div class="card ">
                    <div class="card-header" style="font-size: 20px">
                        የአማራ ራዲዮ ዛሬ ሚተላለፉ ማስታወቂያ መዝግብ
                        @if($todayDate = date("d-m-yy"))
                        @endif
                    </div>
                    @include('layouts.errors')
                    <form action="" method="post" id="dynamic_form" class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="float-right">
                                <a href={{route('mastawokia-create-formnew-radio')}} type="submit" class="btn btn-danger ">
                                    አማራጭ መመዝገቢያ
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
{{--                                               value="{{$todayDate}}"--}}
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
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mastawokia_mitelalefbet"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት*</label>
                                    <div class="col-md-12 form-group">
                                        <select required class="form-control" name="mastawokia_mitelalefbet">
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
                                </div>

                            </div>

                            <table class="table table-bordered table-striped table-responsive form-group"
                                   id="user_table">
                                @csrf
                                <thead class="table-bordered text-center">
                                <tr>
                                    <TH>ማስታወቂያ አስነጋሪው*</TH>
                                    <TH>ፋይል ስም*</TH>
                                    <TH>ደቂቃ*</TH>
                                    <TH>ሚተላለፍበትን ሰዓት*</TH>
                                    <TH>ድግግሞሽ መጠን*</TH>
{{--                                    <TH>የተስተናገደው መጠን *</TH>--}}
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
                                           value=" መዝግብ"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}

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
{{--@endsection--}}
{{--@section('js')--}}

{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            var count = 1;
            dynamic_field(count);

            function dynamic_field(number) {
                html = '<tr>';
                {{--html += '<td><select required name ="program_meleya_id[]"  class="form-control"><option  selected disabled value="">ፕሮግራም አይዲ ይምረጡ</option> @foreach($programmeleyaid as $pm) <option value="{{$pm->id}}"> {{$pm->name}}</option> @endforeach </select></td>';--}}

                    {{--html += '<td><div class="col-md-12" name ="program_meleya_id" ><select class="form-control" required name="program_meleya_id[]"> <option selected disabled>ፕሮግራም አይዲ ይምረጡ</option>@foreach($programmeleyaid as $pm) <option value="{{$pm->id}}"> {{$pm->name}}</option> @endforeach </select> </div></td>';--}}
                    html += '<td><input type="text" name="mastawokia_tekuam[]" required id="mastawokia_tekuam" class="form-control"/></td>';
                html += '<td><input type="text" name="mastawokia_file[]" required id="mastawokia_file" class="form-control"/></td>';
                html += '<td> <input type="text" name="mastawokia_gize[]" id="mastawokia_gize" required class="form-control" style="width: 70px"/></td>';
                html += '<td> <input type="text" name="mastawokia_mitelalefbet_seat[]" id="mastawokia_mitelalefbet_seat" required class="form-control"/></td>';
                html += '<td> <input type="number" name="mastawokia_diggmosh[]" id="mastawokia_diggmosh" min="1" required class="form-control" style="width: 100px"/></td>';
                // html += '<td> <input type="number" name="mastawokia_Yetestenagedew_meten[]" min="1" id="mastawokia_Yetestenagedew_meten" required class="form-control"/></td>';
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
                    url: '{{route('mastawokia-save')}}',
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
@endsection

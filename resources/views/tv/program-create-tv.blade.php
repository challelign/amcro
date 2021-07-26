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
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


                    <br>

                    <form action="{{route('program-save-tv')}}" method="post" class="form-group">
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
                                        <select required
                                                class="productcategory form-control @error('program_ken')  program_ken_id is-invalid @enderror"
                                                name="program_ken" id="prod_cat_id">
                                            <option value="0" disabled="true" selected="true">-ይምረጡ-</option>
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}">{{$k->name}} </option>
                                            @endforeach
                                        </select>
                                        @error('program_ken')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="productname"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት</label>
                                    <div class="col-md-12 form-group">
                                        <label>
                                            <select required
                                                    class="productname form-control"
                                            >
                                                <option value="0" disabled="true" selected="true">ፕሮግራሙ ሚተላለፍበትን ሰዓት
                                                    ይምረጡ
                                                </option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 pcontent ">
                                    {{--                                    <label for="title"  class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት</label>--}}
                                    <div class="col-md-12 form-group pcontent">
                                        {{--                                        <textarea type="text" id="tv"  class="form-control prod_price" name="pcontent">--}}

                                        {{--                                        </textarea>--}}
                                    </div>
                                </div>
                            </div>


                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    {{--                                    <a href="" type="submit" class="btn btn-info ">--}}
                                    {{--                                        ተመለስ--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit" value=" ወደ ቅርብ ሀላፊ ላክ"/>--}}
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


<script type="text/javascript">
    $(document).ready(function () {


        $(document).on('change', '.productcategory', function () {
            console.log("hmm its change");

            var cat_id = $(this).val();
            console.log(cat_id);

            var div = $(this).parent().parent().parent();
            // div.css('background-color', 'green')

            var op = " ";

            $.ajax({
                type: 'get',
                url: '{!!URL::to('tv/programs/program-create-tv-find')!!}',
                data: {'id': cat_id},
                success: function (data) {
                    console.log('success');

                    console.log(data);

                    console.log(data.length);
                    op += '<option value="0" selected disabled>-ሚተላለፍበትን ሰዓት-</option>';
                    for (var i = 0; i < data.length; i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].tvmitelalefbet_id+ '</option>';
                        // op += '<input type="text" name="tvmitelalefbet_id" class="productname" value ="' + data[i].tvmitelalefbet_id + data[i].id + '"/>';

                    }
                    // op += '<input type="text" name="tvmitelalefbet_id" class="productname" value =""/>';

                    // for (var i = 0; i < data.length; i++) {
                    //     op += '<input type="text" name="tvmitelalefbet_id" class="productname" value ="' + data[i].tvmitelalefbet_id + '"/>';
                    // }
                    console.log(data);

                    div.find('.productname').html(" ");
                    div.find('.productname').append(op);
                },
                error: function () {

                }
            });
        });

        $(document).on('change', '.productname', function () {
            var prod_id = $(this).val();

            var pcont = $(this).parent().parent().parent().parent();
            // div.css('background-color','red')

            console.log(prod_id);
            var op = "";
            $.ajax({
                type: 'get',
                url: '{!!URL::to('tv/programs/program-create-tv-find-pcontent')!!}',
                data: {'id': prod_id},
                dataType: 'json',//return data will be json
                success: function (data) {
                    console.log("name");
                    console.log(data.name);
                    console.log(data.tvmitelalefbet_id);

                    // here price is coloumn name in products table data.coln name

                    pcont.find('.prod_price').val(data.name);
                    //
                    var namecke = data.name;
                    var namecke_id = data.id;
                    html = '<div class="col-md-12">';
                    // var tarea = '';
                    html = ' <div class="col-md-12 form-group ">';
                    html += '<label for="title"  class="col-md-12"><b>ዛሬ ሚተላለፉ ፕሮግራሞችን አስተካክለህ መዝግብ</b></label>';

                    html += '<div class="col-md-12 form-group"><textarea type="text" name="program_yizet" rows="5"  cols="30"  id="tv" class="form-control" style="height: 300px">' + namecke + ' </textarea>';
                    {{--html += '<div class="col-md-12 form-group"><a href="{{route('tv/programs/program-create-tv-find-pcontent/' + namecke + '}}" type="button" class="btn btn-sm"> Edit </a>';--}}html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '<input type="hidden" name="program_mitelalefbet"  class="" value="' + data.tvmitelalefbet_id + '"/>';
                    html += '<input type="submit" name="save" id="save" class="btn btn-primary  submit" value=" ፕሮግራም መዝግብ"/>';

                    $('.pcontent').html(" ");
                    $('.pcontent').html(html);

                    ClassicEditor.create(document.getElementById('tv'), {}).then(editor => {
                        window.editor = editor;
                        editor.ui.view.editable.element.style.height = '300px';

                    })
                },
                error: function () {
                }
            });
        });
    });
</script>


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
        });
    </script>
@endsection


<script src="{{asset('ckeditor/ckeditor.js')}}"></script>

@extends('layouts.app')
@section('css')

            <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row" style="margin-right: -30px; margin-left: -30px; border: 0px">
            <div class="col-md-12">
                @include('layouts.radiot')
                <div class="card">
                    <div class="card-header bg-info" style="color: white ;font-size: 20px">ሁሉም የተላለፉ ፐሮግራሞች ዝርዝር</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive"
                               id="dataTableAdmin" style="width:100%;margin-bottom: 3em;">
                            <thead class="table-info table-bordered text-center">
                            <tr>
                                <th  colspan="3">
                                    <select data-column="1" class="form-control filter-select">
                                        <option value="">በቀን ፈልግ </option>
                                        @foreach($prodate as $pd)
                                            <option value="{{$pd}}">
                                                {{$pd}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th  colspan="3">
                                    <select data-column="2" class="form-control filter-select">
                                        <option value="">በሚተላለፍበት ምዕራፍ ፈልግ </option>
                                        @foreach($proelet as $pe)
                                            <option value="{{$pe}}">
                                                {{$pe}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th><th  colspan="4">
                                    <select data-column="3" class="form-control filter-select">
                                        <option value="">በሚተላለፍበት ዕለት ፈልግ </option>
                                        @foreach($proken as $p)
                                            <option value="{{$p}}">
                                                {{$p}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th>
                            <tr>
                                <th style="width: 10px;font-size: 10px">#</th>
                                <TH>ቀን</TH>
                                <TH style="width: 10px;font-size: 10px">ፕሮግራሙ የተላለፈበት</TH>
                                <TH>እለት</TH>
                                <TH>ፕሮግራም አይዲ</TH>
                                <TH>ፋይል ስም</TH>

                                <TH>ደቂቃ</TH>
                                <TH>የተላለፍበት ሰዓት</TH>

                                <TH>የፕሮግራሙ ይዘት</TH>
                                <TH>አርታኢ</TH>
                                <TH>አዘጋጅ</TH>
                                <TH>እንዲተላለፍ ያጸደቀው</TH>
                                <TH>የፕሮግራሙ መሪ</TH>
                                <TH>ቴክኒሻን</TH>
                            </tr>

                            </thead>

                            <tbody>
                            @if($i =0)@endif
                            @foreach($program as $pro)
                                @if($pro->is_transmit == 1 && $pro->is_artayi_check == 1)
                                    @if($i ++)@endif

                                    <tr>

                                        <td>{{$i}}</td>
                                        <td >{{$pro->today_date}}</td>
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

                                        <td>{{$pro->artayi}}</td>
                                        <td>{{$pro->user->name}}</td>
                                        <td>{{$pro->technician}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot class="table-info text-center">
                            <tr>
                                <td style="width: 10px;font-size: 10px">#</td>
                                <TH>ቀን</TH>
                                <TH style="width: 10px;font-size: 10px">ፕሮግራሙ የተላለፍበት</TH>
                                <TH>እለት</TH>
                                <TH>ፕሮግራም አይዲ</TH>
                                <TH>ፋይል ስም</TH>
                                <TH>ደቂቃ</TH>
                                <TH>የተላለፍበት ሰዓት</TH>
                                <TH>የፕሮግራሙ ይዘት</TH>
                                <TH>አርታኢ</TH>
                                <TH>አዘጋጅ</TH>
                                <TH>እንዲተላለፍ ያጸደቀው</TH>
                                <TH>የፕሮግራሙ መሪ</TH>
                                <TH>ቴክኒሻን</TH>
                            </tr>

                            </tfoot>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {{--    <script--}}
    {{--        src="https://code.jquery.com/jquery-3.5.1.js"></script>--}}
    {{--    <script--}}
    {{--        src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>--}}

    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/datatables.js')}}" defer></script>
    <script>
        $(document).ready(function () {
           var table = $('#dataTableAdmin').DataTable({
                "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
            });
            $('.filter-select').change(function () {
                table.column( $(this).data('column'))
                    .search( $(this).val())
                    .draw();
            });
        });
    </script>
@endsection

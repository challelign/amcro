@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @include('layouts.fmt')
                <div class="card">
                    <div class="card-header bg-info" style="color: white;font-size: 20px">ባሕርዳር ኤፍኤም ሁሉም የተላለፉ መረጃና ሙዚቃ ዝርዝር</div>
                    <div class="card-body">
                        <table class="table  table-bordered table-striped table-responsive"
                               id="dataTableMereja" style="width:100%;margin-bottom: 3em;">
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
                                <th  colspan="2">
                                    <select data-column="2" class="form-control filter-select">
                                        <option value="">በሚተላለፍበት ምዕራፍ ፈልግ </option>
                                        @foreach($proelet as $pe)
                                            <option value="{{$pe}}">
                                                {{$pe}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th><th  colspan="2">
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
                                <th>#</th>
                                <th>ቀን</th>
                                <th>ፕሮግራሙ ሚተላለፍበት</th>
                                <TH>እለት</TH>
                                <TH>መረጃ</TH>
                                <TH>ሙዚቃ</TH>
                                <TH>እንዲተላለፍ ያጸደቀው</TH>
                                <TH>የፕሮግራሙ መሪ</TH>
                                <TH>ቴክኒሻን</TH>
                            </TR>
                            </thead>
                            <tbody>
                            @foreach($mereja as $mer)
                                @if($mer->is_artayi_check == 1 && $mer->is_transmit == 1)
                                    <tr>
                                        <td> {{$mer->id}}</td>
                                        <td> {{$mer->today_date}}</td>
                                        <td>{!!  $mer->program_mitelalefbet!!}</td>
                                        <td>{!!  $mer->programKen->name !!}</td>
                                        <td>{!!  $mer->mereja!!}</td>
                                        <td>{!! $mer->music !!}</td>
                                        <td>{{$mer->artayi}}</td>
                                        <td>{{$mer->user->name}}</td>
                                        <td>{{$mer->technician}}</td>
                                    </tr>


                                @endif
                            @endforeach
                            </tbody>
                            <tfoot class="table-info text-center">
                            <tr>
                                <th>#</th>
                                <th>ቀን</th>
                                <th>ፕሮግራሙ ሚተላለፍበት</th>
                                <TH>እለት</TH>
                                <TH>መረጃ</TH>
                                <TH>ሙዚቃ</TH>
                                <TH>እንዲተላለፍ ያጸደቀው</TH>
                                <TH>የፕሮግራሙ መሪ</TH>
                                <TH>ቴክኒሻን</TH>
                            </TR>
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
          var table =  $('#dataTableMereja').DataTable({
                "order": [[0, 'desc'], [1, 'desc']]
            });

            $('.filter-select').change(function () {
                table.column( $(this).data('column'))
                    .search( $(this).val())
                    .draw();
            });
        });
    </script>
@endsection

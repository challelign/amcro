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
                    <div class="card-header bg-info" style="color: white ;font-size: 20px"> ባሕርዳር ኤፍኤም ዓየርላይ የዋሉ ማስታወቂያዎች ዝርዝር</div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-responsive form-group"
                               id="dataTableAdmin">
{{--                            @csrf--}}
                            <thead class="table-bordered text-center table-info">
                            <tr>
                                <th colspan="3">
                                    <select data-column="1" class="form-control filter-select">
                                        <option value="">በቀን ፈልግ</option>
                                        @foreach($prodate as $pd)
                                            <option value="{{$pd}}">
                                                {{$pd}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th colspan="4">
                                    <select data-column="2" class="form-control filter-select">
                                        <option value="">በሚተላለፍበት ምዕራፍ ፈልግ</option>
                                        @foreach($proelet as $pe)
                                            <option value="{{$pe}}">
                                                {{$pe}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th>
                                <th colspan="3">
                                    <select data-column="3" class="form-control filter-select">
                                        <option value="">በሚተላለፍበት ዕለት ፈልግ</option>
                                        @foreach($proken as $p)
                                            <option value="{{$p}}">
                                                {{$p}}
                                            </option>
                                        @endforeach
                                    </select>
                                </th>
                            </tr>
                            <th>#</th>
                            <th>ቀን</th>
                            <th>ፕሮግራሙ ሚተላለፍበት</th>
                            <TH>እለት</TH>

                            <TH>ማስታወቂያ አስነጋሪው</TH>
                            <TH>ፋይል ስም</TH>
                            <TH>ደቂቃ</TH>
                            <TH>ሚተላለፍበትን ሰዓት</TH>
                            <TH>ድግግሞሽ መጠን</TH>
{{--                            <TH>የተስተናገደው መጠን</TH>--}}
                            <TH>እንዲተላለፍ ያጸደቀው</TH>
                            <th>ማስታወቂያ የመዘገበው</th>
                            <TH>ቴክኒሻን</TH>
                            </tr>
                            </thead>

                            <tbody>
                            @if($i =0)@endif
                            @foreach($mastawokiafm as $ms)
                                @if($ms->is_artayi_check == 1 && $ms->is_transmit == 1 && $ms->not_transmit == 0)
                                    @if($i++)@endif
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td> {{$ms->today_date}}</td>
                                        <td>{!!  $ms->mastawokia_mitelalefbet!!}</td>
                                        <td>{!!  $ms->programKen->name !!}</td>
                                        <td>{!!  $ms->mastawokia_tekuam!!}</td>
                                        <td>{!!  $ms->mastawokia_file!!}</td>
                                        <td>{!!  $ms->mastawokia_gize!!}</td>
                                        <td>{!!  $ms->mastawokia_mitelalefbet_seat!!}</td>
                                        <td>{!!  $ms->mastawokia_diggmosh!!}</td>
{{--                                        <td>{!!  $ms->mastawokia_Yetestenagedew_meten!!}</td>--}}
                                        <td>{{$ms->artayi}}</td>
                                        <td>{{$ms->user->name}}</td>
                                        <td>{{$ms->technician}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot class="table-info text-center">

                            <tr class=" text-center">
                                <th>#</th>
                                <th>ቀን</th>
                                <th>ፕሮግራሙ ሚተላለፍበት</th>
                                <TH>ቀን</TH>
                                <TH>ማስታወቂያ አስነጋሪው</TH>
                                <TH>ፋይል ስም</TH>
                                <TH>ደቂቃ</TH>
                                <TH>ሚተላለፍበትን ሰዓት</TH>
                                <TH>ድግግሞሽ መጠን</TH>
{{--                                <TH>የተስተናገደው መጠን</TH>--}}
                                <TH>እንዲተላለፍ ያጸደቀው</TH>
                                <th>ማስታወቂያ የመዘገበው</th>
                                <TH>ቴክኒሻን</TH>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="col-md-6"> {{ $mastawokiafm->links() }}</div>

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
                "order": [[0, 'desc'], [1, 'desc']]
            });

            $('.filter-select').change(function () {
                table.column($(this).data('column'))
                    .search($(this).val())
                    .draw();
            });
        });
    </script>
@endsection

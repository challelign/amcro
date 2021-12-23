


<div class="card-header bg-info  " style="color: white ;font-size: 20px"> {{$ken->name}} ጠዋት[12:00-6:00]
    የተሞሉ ፐሮግራሞች ዝርዝር
</div>
<div class="card-body">
    @if($i = 0)@endif
    @foreach($program as $pro)
        @if($pro->program_ken_id === $ken->id
            &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
            @if($i++)@endif
        @endif
    @endforeach

    @csrf
    @if($i == 0)
        <div class="card-body">
            <p class="text-center"> ፐሮግራሞች የሉም </p>
        </div>
    @else
        <table class="table table-bordered table-striped table-responsive form-group"
               id="user_table">
            @csrf
            <thead class="table-bordered text-center">
            <tr>

                <th>ተ.ቁ</th>
                <th>ቀን</th>
                <th>ፕሮግራሙ ሚተላለፍበት</th>
                <TH>ዕለቱ</TH>
                <TH>ፕሮግራም አይዲ</TH>
                <TH>ፋይል ስም</TH>
                <TH>ደቂቃ</TH>
                <TH>ሚተላለፍበትን ሰዓት</TH>
                <TH>የፕሮግራሙ ይዘት</TH>
                <th>የፕሮግራሙን የመዘገበው</th>
                <TH>አርታኢ</TH>
                <TH>አዘጋጅ</TH>
            </TR>
            </thead>

            @if($i = 0)@endif
            @foreach($program as $pro)
                @if($pro->program_ken_id === $ken->id
                    &&   $pro->is_transmit == 0 && $pro->program_mitelalefbet == 'ጠዋት[12:00-6:00]')
                    <tbody>
                    @if($i++)@endif
                    <td>{{$i}}</td>
                    <td>{{$pro->programKen->name}}</td>
                    <td>{{$pro->program_mitelalefbet}}</td>
                    <td>{{$pro->today_date}}</td>
                    <td>{{$pro->programMeleya->name}}</td>
                    <td>{{$pro->program_file}}</td>
                    <td>{{$pro->program_minute}}</td>
                    <td>{{$pro->program_mitelalefbet_seat}} - {{$pro->program_mitelalefbet_seat2}}</td>
                    <td>{{$pro->program_yizet}}</td>
                    <td>{{$pro->user->name}}</td>
                    <td>{{$pro->program_artayi}}</td>
                    <td>{{$pro->program_azegagi}}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->is_artayi ==  '0' || \Illuminate\Support\Facades\Auth::user()->is_artayi ==  '2')
                        <td>
                            <a href="{{route('program-list-by-date-edit',$pro->id)}}"
                               class="btn-sm btn btn-info  my-2 "> አስተካክል </a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm my-2"
                                    onclick="handelDelete({{$pro->id}})">
                                ሰርዝ
                            </button>
                        </td>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->is_artayi ==  '1')
                        <td>
                            <form action="{{route('program-approve-tech',$pro->id)}}" method="post">
                                @csrf
                                @if($pro->is_transmit == '0' && $pro->is_artayi_check == '1')
                                    <button type="submit" class="btn btn-primary btn-sm my-2"
                                            style="width: 110px">
                                        ተላልፏል ብለህ ላክ
                                    </button>
                                @endif
                            </form>
                        </td>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->is_artayi == 2 )
                        <td>
                            <form action="{{route('program-approve-all',$pro->id)}}" method="post">
                                @csrf
                                @if($pro->is_artayi_check == 1)
                                    አጽድቀሀል
                                @else
                                    <button type="submit" class="btn btn-primary btn-sm my-2">
                                        አጽድቅ
                                    </button>
                                @endif

                            </form>
                        </td>
                    @endif

                    </tbody>
                @endif
            @endforeach

        </table>

    @endif


    {{--                    program delete    --}}
<!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
         aria-labelledby="deleteModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="" method="post" id="deleteCategoryForm">
                @method('delete')
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete ፐሮግራም </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center text-bold">
                            Are you sure you want to delete this ፐሮግራም .?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go
                            back
                        </button>
                        <button type="submit" class="btn btn-danger">Yes , Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--                        --}}
{{--    @if($i == 0)--}}
{{--        <div class="card-body">--}}
{{--            <p class="text-center"> ፐሮግራሞች የሉም </p>--}}
{{--        </div>--}}
{{--@endif--}}

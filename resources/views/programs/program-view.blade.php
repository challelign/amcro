@extends('layouts.app')

@section('section')
    <div class="card-body">
        <table class="table table-bordered table-striped table-responsive form-group"
               id="user_table">
            @csrf
            <thead class="table-bordered text-center">
            <tr>
                <th>ቀን</th>
                <th>ፕሮግራሙ ሚተላለፍበት</th>
                <TH>ቀን</TH>

                <TH>ፕሮግራም አይዲ</TH>
                <TH>ፋይል ስም</TH>
                <TH>ደቂቃ</TH>
                <TH>የፕሮግራሙ ይዘት *</TH>
                <TH>አርታሺ *</TH>
                <TH>አዘጋጅ *</TH>
            </TR>
            </thead>

            @foreach($program as $pro)
                @if($pro->program_ken_id == $ken->id)
                    <tbody>
                    <td>{{$pro->programKen->name}}</td>
                    <td>{{$pro->program_mitelalefbet}}</td>
                    <td>{{$pro->today_date}}</td>
                    <td>{{$pro->program_file}}</td>
                    <td>{{$pro->program_minute}}</td>
                    <td>{{$pro->program_yizet}}</td>
                    <td>{{$pro->program_artayi}}</td>
                    <td>{{$pro->program_azegagi}}</td>
                    <td>
                        <button class="btn-sm btn-info form-control"> Edit</button>
                    </td>
                    </tbody>
                @endif

            @endforeach

        </table>

    </div>
@endsection


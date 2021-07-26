@extends('layouts.app')
{{--@extends('layouts.left')--}}
@section('content')
    <div class="container-fluid justify-content-sm-center">
        <div class="row">
            <div class="col-md-12 pt-5">
                <div class="card">
                    <div class="text-center" style="color: red ;font-size: 30px">
                        <b>ባሕር ዳር ኤፍኤም ፐሮግራሞች</b>
                    </div>
                    <div class="bg-info text-center" style="color: white ;font-size: 20px">የ {{$ken->name}}
                        መርሀግብር የተሞሉ
                        ፐሮግራሞች ዝርዝር
                    </div>
                    <div class="card-body row">
                        <div class="col-md-6">
                            <a href="{{route('program-list-by-date-tewat-fm',$ken->id)}}"
                               class="btn btn-lg bg-info form-control  "
                               style="color: whitesmoke;font-size: 17px">{{$ken->name}} ጠዋት[12:00-6:00] የተሞሉ ፐሮግራሞች
                                ዝርዝር</a>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('program-list-by-date-ken-fm',$ken->id)}}  "
                               class="btn btn-lg bg-info form-control  "
                               style="color: whitesmoke;font-size: 17px">{{$ken->name}} ቀን[6:00-12:00] የተሞሉ ፐሮግራሞች
                                ዝርዝር</a></div>
                        <div class="col-md-6">

                            <a href="{{route('program-list-by-date-mata-fm',$ken->id)}}"
                               class="btn btn-lg bg-info form-control  "
                               style="color: whitesmoke;font-size: 17px">{{$ken->name}} ማታ[12:00-6:00] የተሞሉ ፐሮግራሞች
                                ዝርዝር</a>
                        </div>
                        <div class="col-md-6">

                            <a href="{{route('program-list-by-date-lelit-fm',$ken->id)}}"
                               class="btn btn-lg bg-info form-control  "
                               style="color: whitesmoke;font-size: 17px">{{$ken->name}} ሌሊት[6:00-12:00] የተሞሉ ፐሮግራሞች
                                ዝርዝር</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 form-group">
                {{--                {{auth()->user()->id }}--}}
                {{--                {{auth()->user()->role_id }}--}}
                <div class="card">

{{--                    supervisor--}}

                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 13)
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                            መርሀ ግብር
                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <video width="450" height="250" controls
                                       style="border-radius: 2px; border-style: solid; border-color: green;">
                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif







                @if(\Illuminate\Support\Facades\Auth::user()->role_id == 12)


                        <div class="card-header bg-info text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <img src="{{asset('logo-image/amico.jpg')}}" alt="">
{{--                                <video width="450" height="250" controls--}}
{{--                                       style="border-radius: 2px; border-style: solid; border-color: green;">--}}
{{--                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">--}}
{{--                                    Your browser does not support the video tag.--}}
{{--                                </video>--}}
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 7)
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <video width="450" height="250" controls
                                       style="border-radius: 2px; border-style: solid; border-color: green;">
                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 4)
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <video width="450" height="250" controls
                                       style="border-radius: 2px; border-style: solid; border-color: green;">
                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif


                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 8)
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <video width="450" height="250" controls
                                       style="border-radius: 2px; border-style: solid; border-color: green;">
                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 10 || \Illuminate\Support\Facades\Auth::user()->role_id == 9 )
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            <div class="col-md-10 text-center align-content-center">
                                <video width="450" height="250" controls
                                       style="border-radius: 2px; border-style: solid; border-color: green;">
                                    <source src="{{URL::asset("/css/amara.mp4")}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <br>
                            <p style="color: red">
                                '' ለህብረተሰብ ለውጥ እንተጋለን. ''
                            </p>
                            <hr>

                        </div>
                    @endif


                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 11)
                        <div class="card-header text-center" style="font-size: 20px">
                            <p>System Admin Page</p>

                        </div>
                        <div class="card-body" style="font-size: 20px">
                            የአማራ ሚዲያ ኮርፖሬሽን የዕለት ስርጭት ማስፈፀሚያ
                    መርሀ ግብር

                            <div class="float-right">
                                <a href="{{route('register-user-admin')}}"
                                   class="btn btn-info btn-sm form-control float-right">ተጠቃሚ መዝግብ</a>
                            </div>
                        </div>
                    @endif
                    {{--                    amhara radio--}}
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1
                         || \Illuminate\Support\Facades\Auth::user()->role_id == 2 )

                        <div class="card-header" style="font-size: 20px">
                            ሳምንታዊ የአማራ ራዲዮ የስርጭት መርሃ ግብር
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                            <div>
                                <a href="{{route('merehagibr-create')}}" class="btn btn-info btn-sm float-right">የስርጭት
                                    መርሃ ግብር ጨምር</a>
                            </div>
                        @endif
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሰኞ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሰኞ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif

                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሰኞ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሰኞ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif

                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሰኞ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሰኞ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}

                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ማክሰኞ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ማክሰኞ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ማክሰኞ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ማክሰኞ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ማክሰኞ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ማክሰኞ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ረቡዕ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ረቡዕ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ረቡዕ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ረቡዕ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ረቡዕ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ረቡዕ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif

                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሐሙስ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሐሙስ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሐሙስ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሐሙስ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ሐሙስ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ሐሙስ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ዓርብ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ዓርብ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ዓርብ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ዓርብ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif

                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ዓርብ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ዓርብ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ቅዳሜ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ቅዳሜ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                        <a href="{{route('merehagibr-edit',$mg->id)}}"
                                           class="btn btn-info btn-sm float-right">አስተካክል</a>

                                    @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ቅዳሜ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ቅዳሜ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                        <a href="{{route('merehagibr-edit',$mg->id)}}"
                                           class="btn btn-info btn-sm float-right">አስተካክል</a>

                                    @endif

                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    ቅዳሜ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'ቅዳሜ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                        <a href="{{route('merehagibr-edit',$mg->id)}}"
                                           class="btn btn-info btn-sm float-right">አስተካክል</a>

                                    @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>
                        <div class="card-body row">
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    እሁድ ምዕራፍ አንድ የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'እሁድ' && $mg->miraf->name == "ምዕራፍ አንድ")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    እሁድ ምዕራፍ ሁለት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'እሁድ' && $mg->miraf->name == "ምዕራፍ ሁለት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        {{--                                    {!! $mg->miraf->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <div class="card-header border-info text-center"
                                     style="color:   #1f6fb2; font-size: 20px">
                                    እሁድ ምዕራፍ ሶስት የስርጭት መርሃ ግብር
                                </div>
                                @foreach($merehagibr as $mg)
                                    @if($mg->programKen->name == 'እሁድ' && $mg->miraf->name == "ምዕራፍ ሶስት")
                                        {!! $mg->name !!}
                                        {{--                                    {!! $mg->programKen->id !!}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1)
                                            <a href="{{route('merehagibr-edit',$mg->id)}}"
                                               class="btn btn-info btn-sm float-right">አስተካክል</a>

                                        @endif
                                    @endif
                                @endforeach
                            </div>

                        </div>
                    @endif

                    {{--                    telvision--}}
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 3)
                        <div class="card-header text-center" style="font-size: 20px">
                            የአማራ ቴሌቪዥን ፕሮግራሞች ለአብነት ሚሆኑ የተዘጋጁ

                        </div>
                        <br>
                        <div class="col-md-12">
                            <a href="{{route('program-template-create')}}" class="btn btn-primary btn-sm float-right">ቀድሞ
                                የተዘጋጀ አብነት መዝግብ</a>
                        </div>

                        <ul class="nav nav-tabs text-center justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="mon-tab" data-toggle="tab" href="#mon" role="tab"
                                   aria-controls="mon" aria-selected="true">| ሰኞ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tus-tab" data-toggle="tab" href="#tus" role="tab"
                                   aria-controls="tus" aria-selected="false">| ማክሰኞ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="wen-tab" data-toggle="tab" href="#wen" role="tab"
                                   aria-controls="contact" aria-selected="false">| ረቡዕ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="thr-tab" data-toggle="tab" href="#thr" role="tab"
                                   aria-controls="thr" aria-selected="false">| ሐሙስ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="fr-tab" data-toggle="tab" href="#fr" role="tab"
                                   aria-controls="fr" aria-selected="false">| ዓርብ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sat-tab" data-toggle="tab" href="#sat" role="tab"
                                   aria-controls="sat" aria-selected="false">| ቅዳሜ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sun-tab" data-toggle="tab" href="#sun" role="tab"
                                   aria-controls="sun" aria-selected="false">| እሁድ |</a>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show " id="mon" role="tabpanel" aria-labelledby="mon-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tus" role="tabpanel" aria-labelledby="tus-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="wen" role="tabpanel" aria-labelledby="wen-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thr" role="tabpanel" aria-labelledby="thr-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sat" role="tabpanel" aria-labelledby="sat-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sun" role="tabpanel" aria-labelledby="sun-tab">
                                <div class="card-body row text-center">
                                    @foreach($pcontent as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-3">
                                                <a href="{{route('program-template-edit',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif


                    {{--bahir dar fm--}}
                    @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5 || \Illuminate\Support\Facades\Auth::user()->role_id == 6)

                        <div class="card-header text-center" style="font-size: 20px">
                            ባሕር ዳር ኤፍኤም ፕሮግራሞች ለአብነት ሚሆኑ የተዘጋጁ

                        </div>
                        <div class="col-md-12">

                            @if(\Illuminate\Support\Facades\Auth::user()->role_id == 5)
                                <a href="{{route('program-template-create-fm')}}"
                                   class="btn btn-primary btn-sm float-right">ቀድሞ
                                    የተዘጋጀ አብነት መዝግብ</a>
                            @endif

                        </div>

                        <ul class="nav nav-tabs text-center justify-content-center" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link " id="mon-tab" data-toggle="tab" href="#mon" role="tab"
                                   aria-controls="mon" aria-selected="true">| ሰኞ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tus-tab" data-toggle="tab" href="#tus" role="tab"
                                   aria-controls="tus" aria-selected="false">| ማክሰኞ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="wen-tab" data-toggle="tab" href="#wen" role="tab"
                                   aria-controls="contact" aria-selected="false">| ረቡዕ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="thr-tab" data-toggle="tab" href="#thr" role="tab"
                                   aria-controls="thr" aria-selected="false">| ሐሙስ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="fr-tab" data-toggle="tab" href="#fr" role="tab"
                                   aria-controls="fr" aria-selected="false">| ዓርብ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sat-tab" data-toggle="tab" href="#sat" role="tab"
                                   aria-controls="sat" aria-selected="false">| ቅዳሜ |</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sun-tab" data-toggle="tab" href="#sun" role="tab"
                                   aria-controls="sun" aria-selected="false">| እሁድ |</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show " id="mon" role="tabpanel" aria-labelledby="mon-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-6">

                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ጠዋት[12:00-6:00] Edit</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ማታ[12:00-6:00] Edit</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '1')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሰኞ
                                                    ሌሊት[6:00 - 12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tus" role="tabpanel" aria-labelledby="tus-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '2')

                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '2')

                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '2')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ማክሰኞ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="wen" role="tabpanel" aria-labelledby="wen-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '3')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ረቡዕ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="thr" role="tabpanel" aria-labelledby="thr-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '4')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ሐሙስ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="fr" role="tabpanel" aria-labelledby="fr-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '5')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ዓርብ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sat" role="tabpanel" aria-labelledby="sat-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '6')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">ቅዳሜ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sun" role="tabpanel" aria-labelledby="sun-tab">
                                <div class="card-body row text-center">
                                    @foreach($fmm as $pc)
                                        @if($pc->tvmitelalefbet_id == 'ጠዋት[12:00-6:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ጠዋት[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ቀን[6:00 - 12:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ቀን[6:00-12:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ማታ[12:00 - 6:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ማታ[12:00-6:00]</a>
                                            </div>
                                        @endif
                                        @if($pc->tvmitelalefbet_id == 'ሌሊት[6:00 - 12:00]' && $pc->program_ken_id == '7')
                                            <div class="col-md-6">
                                                <div class="col-md-12 table table-bordered table-striped">
                                                    {!! $pc->name !!}
                                                </div>
                                                <a href="{{route('program-template-edit-fm',$pc->id)}}"
                                                   class="btn btn-info">እሁድ
                                                    ሌሊት[6:00-12:00]</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


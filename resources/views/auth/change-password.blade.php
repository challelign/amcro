@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 row">
                @include('layouts.errors')
                <div class="col-md-2"></div>
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header text-center" style="font-size: 20px">
                            {{Auth::user()->name}} የይለፍ ቃል መቀየር
                        </div>

                        <div class="card-body">
                            <form
                                action="{{route('change-password-update',Auth::user()->id)}}"
                                method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="current_password"
                                           class="col-md-2 col-form-label text-md-right">የድሮ የይለፍ ቃል </label>
                                    <div class="col-md-8">
                                        <input id="current_password" type="password"
                                               class="form-control @error('current_password') is-invalid @enderror"
                                               name="current_password" required autocomplete="new-password">

                                        @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password"
                                           class="col-md-2 col-form-label text-md-right">አዲስ የይለፍ ቃል አሰገባ </label>
                                    <div class="col-md-8">
                                        <input id="new_password" type="password" class="form-control"
                                               name="new_password" required autocomplete="new-password" min="6">
                                        @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password_confirmation"
                                           class="col-md-2 col-form-label text-md-right">አዲሱን የይለፍ ቃል አረጋግጥ </label>
                                    <div class="col-md-8">
                                        <input id="new_password_confirmation" type="password" class="form-control" min="6"
                                               name="new_password_confirmation" required>

                                    </div>
                                </div>







{{--                                <div class="form-group row">--}}
{{--                                    <label for="password"--}}
{{--                                           class="col-md-4 col-form-label text-md-right">{{ __('ፓስወርድ ') }}</label>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <input id="password" type="password"--}}
{{--                                               class="form-control @error('password') is-invalid @enderror"--}}
{{--                                               name="password"--}}
{{--                                               required autocomplete="new-password">--}}
{{--                                        @error('password')--}}
{{--                                        <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="form-group row">--}}
{{--                                    <label for="password-confirm"--}}
{{--                                           class="col-md-4 col-form-label text-md-right">{{ __('ፓስወርድ አረጋግጥ ') }}</label>--}}

{{--                                    <div class="col-md-8">--}}
{{--                                        <input id="password-confirm" type="password" class="form-control"--}}
{{--                                               name="password_confirmation" required autocomplete="new-password">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            የይለፍ ቃል   መዝግብ
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
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
            $('#dataTableAdmin').DataTable({
                "order": [[0, 'desc'], [1, 'desc']]
            });
        });
    </script>
@endsection

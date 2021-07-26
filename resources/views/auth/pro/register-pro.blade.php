@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-header" style="font-size: 20px">
                            {{isset($user_data) ? 'ተጠቃሚ ማስተካክል ':'ተጠቃሚ መዝግብ '}}
                        </div>
                        <div>
                            <a href="{{route('register-user-pro')}}" class="btn btn-info float-right">ተጠቃሚ መዝግብ</a>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{isset($user_data) ? route('user-update-pro',$user_data->id):route('register-create-pro')}} "
                                method="post">

                                @csrf
                                @if(isset($user_data))
                                    @method('PUT')
                                @endif
                                @csrf
                                <div class="form-group row">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ሙሉ ስም') }}</label>
                                    <div class="col-md-8">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{isset($user_data) ? $user_data->name : ''}}" required
                                               autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ዩዘርኔም/መለያ') }}</label>

                                    <div class="col-md-8">
                                        <input id="username" type="text"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username"
                                               value="{{isset($user_data) ? $user_data->username : ''}}" required
                                               autocomplete="username">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="role_id"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ሀላፊነት') }}</label>
                                    <div class="col-md-8">
                                        <select required class="form-control @error('role_id') is-invalid @enderror"
                                                name="role_id" required
                                                autocomplete="role_id">
                                            <option selected disabled>ይምረጡ</option>
                                            @foreach($role as $r)
                                                @if($r->id == 3 || $r->id == 4 || $r->id == 5 || $r->id == 6 || $r->id == 1 || $r->id == 2 || $r->id == 7|| $r->id == 8 || $r->id == 11|| $r->id == 12 || $r->id == 13)
                                                    @continue
                                                @endif

                                                <option value="{{$r->id}}"
                                                        @if(isset($user_data))
                                                        @if($r->id === $user_data->role_id)
                                                        selected
                                                    @endif
                                                    @endif>
                                                    @if($r->id == 3 || $r->id == 4 || $r->id == 5 || $r->id == 6 || $r->id == 1 || $r->id == 2 || $r->id == 7|| $r->id == 8 || $r->id == 11 || $r->id == 12 || $r->id == 13)
                                                        @continue
                                                    @endif
                                                    {{$r->name}}
                                                </option>
                                            @endforeach

                                        </select>
                                        @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                {{--                                @if(isset($user_data))--}}
                                {{--                                @else--}}
                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ሚስጥራዊ ቁጥር ') }}</label>

                                    <div class="col-md-8">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('ሚስጥራዊ ቁጥር አረጋግጥ ') }}</label>

                                    <div class="col-md-8">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                {{--                                @endif--}}


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{isset($user_data) ? 'ማስተካከል ':'መዝግብ '}}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{--                @include('auth.register-edit')--}}
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="font-size: 20px"> ተጠቃሚ ዝርዝር</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTableAdmin" class="table table-bordered table-striped">
                                    <thead>
                                    <TR>
                                        <th>#</th>
                                        <th>ሙሉ ስም</th>
                                        <th>ዩዘርኔም</th>
                                        <th>ሀላፊነት</th>
                                        <th>created by</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($i = 0)@endif
                                    @foreach($users as $us)
                                        @if($us->role->id == 3 || $us->role->id == 4 || $us->role->id == 5 || $us->role->id == 6 || $us->role->id == 1 || $us->role->id == 2 || $us->role->id == 7|| $us->role->id == 8 || $us->role->id == 11 || $us->role->id == 12|| $us->role->id == 13)
                                            @continue
                                        @endif

                                        @if($i++)@endif
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$us->name}}</td>
                                            <td>{{$us->username}}</td>
                                            <td>
                                                {{$us->role->name}}
                                            </td>
                                            <td>{{$us->user_created_by}}</td>
                                            <td><a href="{{route('user-edit-pro',$us->id)}}"
                                                   class="btn btn-primary btn-sm">Edit</a>
                                            </td>
                                            <td><a href="{{route('user-delete-pro',$us->id)}}"
                                                   class="btn btn-danger btn-sm">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

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
            $('#dataTableAdmin').DataTable({
                "order": [[0, 'desc'], [1, 'desc']]
            });
        });
    </script>
@endsection

@extends('layouts.app')

<style>
    img {
        /*border-radius: 10%;*/
        /*color: darkgrey;*/
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{asset('logo-image/amico.jpg')}}" alt="Avatar" style="width: 250px;height: 120px">
                <div class="card">
                    <div  class="card-header text-center"
                         style="font-size: 25px;color: white;background-color: #f94144">{{ __('ግ ባ') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right"
                                       style="font-size: 20px;">{{ __('መግቢያ ስም ') }}</label>
                                <div class="col-md-6">
                                    <input id="username" type="text"
                                           class="form-control @error('username') is-invalid @enderror" name="username"
                                           value="{{ old('username') }}" required autocomplete="username" autofocus
                                           style="font-size: 20px;">

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"
                                       style="font-size: 20px;">{{ __('የይለፍ ቃል ') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" style="font-size: 20px;">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('ድጋሚ ስገባ አስታውሰኝ') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4" style="padding-left: 20px">
                                    <button type="submit" class="btn form-control btn-primary">
                                        <b> {{ __('ግ ባ') }}</b>
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <hr class="bg-info" style="height:2px">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

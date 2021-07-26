@extends('layouts.mas')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 form-group">
                {{auth()->user()->id }}
                {{auth()->user()->role_id }}
                <div class="card">
                    <div class="card-body">
                        <div class="card-header" style="font-size: 20px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

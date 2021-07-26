@extends('layouts.app')
@section('css')

    <link rel="stylesheet" href="http//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link href="{{asset ('css/jquery.dataTables.css')}}" def rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header" style="font-size: 20px">
                        {{isset($prog) ? 'ፕሮግራም አይዲ/መለያ/ አስተካክል ':'ፕሮግራም አይዲ/መለያ/ ጨምር'}}
                    </div>
                    <div>
                        <a href="{{route('program-ayidi-create')}}" class="btn btn-info float-right">ፕሮግራም አይዲ ጨምር</a>
                    </div>
                    <form
                        action="{{isset($prog) ? route('program-ayidi-update',$prog->id): route('program-ayidi-save')}} "
                        method="post">
                        @csrf
                        @if(isset($prog))
                            @method('PUT')
                        @endif
                        <div class="card-body">
                            <div class="form-group">
                                @include('layouts.errors')
                                <label for="name"
                                       class="col-md-12"> ፕሮግራም አይዲ*</label>
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text" id="name" required
                                               class="form-control @error('name')  name is-invalid @enderror"
                                               name="name"
                                               value="{{isset($prog) ? $prog->name : ''}}"
                                               placeholder=" ፕሮግራም አይዲ ጻፍ "
                                               autofocus>
                                        @error('name')
                                        <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" name="save" id="save" class="btn btn-sm btn-primary  submit">
                                            {{isset($prog) ? 'አስተካክል ':'መዝግብ'}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                @if(isset($prog))
                                    <div class="custom-control custom-radio custom-control-inline" style="font-size: 20px">
                                        <input type="radio" @if($prog->yeteshete == '0') checked @endif  id="customRadioInline1" value="0" name="yeteshete" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">ያልተሸጠ </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="font-size: 20px">
                                        <input type="radio" @if($prog->yeteshete == '1') checked @endif id="customRadioInline2" value="1" name="yeteshete" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2" >የተሸጠ </label>
                                    </div>
                                @else
                                    <div class="custom-control custom-radio custom-control-inline" style="font-size: 20px">
                                        <input type="radio" checked id="customRadioInline1" value="0" name="yeteshete" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline1">ያልተሸጠ </label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline" style="font-size: 20px">
                                        <input type="radio"  id="customRadioInline2" value="1" name="yeteshete" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadioInline2" >የተሸጠ </label>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @include('programs.program-ayidi-edit')

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
           var table = $('#dataTable').DataTable({
                // 'processing':true,
                // 'serverSide':true,
                "order": [[ 0, 'desc' ], [ 1, 'desc' ]]
            });
            $('.filter-select').change(function () {
                table.column( $(this).data('column'))
                .search( $(this).val())
                .draw();
            });
        });
    </script>
@endsection

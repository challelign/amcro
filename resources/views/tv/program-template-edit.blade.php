@extends('layouts.app')

@section('css')

@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    @include('layouts.errors')
                    <div class="card-header" style="font-size: 20px">
                        የሥርጭት ቅደም ተከተል ለአብነት ሚሆን ቅጽ ማስተካከል
                    </div>
                    {{--                    @include('layouts.errors')--}}
                    <form action="{{route('program-template-update',$tvpcontent->id)}}" method="post" class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-8">
                                    <b>ለአብነት ፕሮግራሙ ሚተላለፍበት
                                         {{$tvpcontent->programKen->name}} {{$tvpcontent->tvmitelalefbet_id}}
                                    </b>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="name"
                                           class="col-md-12">የፕሮግራም መሙያ ሰንጠረዥ አስተካክል </label>
                                    <div class="col-md-12 form-group ">
                                            <textarea type="text" id="tv"
                                                      class="form-control"
                                                      name="name">{{$tvpcontent->name}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <a href="{{route('home')}}" class="btn btn-info">ተመለስ</a>

                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value="አስተካክለህ መዝግብ"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        $(document).ready(function () {
            ClassicEditor.create(document.getElementById('tv'), {}).then(editor => {
                window.editor = editor;
                editor.ui.view.editable.element.style.height = '400px';
            })
        })
    </script>
@endsection


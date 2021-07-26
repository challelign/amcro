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
                        የሥርጭት ቅደም ተከተል ለአብነት ሚሆን መመዝገቢያ ቅጽ
                    </div>
{{--                    @include('layouts.errors')--}}
                    <form action="{{route('program-template-save')}}" method="post" class="form-group">
                        @csrf
                        <span id="result"></span>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="program_ken_id"
                                           class="col-md-12">ዕለት ምረጥ</label>
                                    <div class="col-md-12">
                                        <select required class="program_ken_id form-control" name="program_ken_id" id="prod_cat_id">
                                            <option value="0" disabled="true" selected="true">-ይምረጡ-</option>
                                            @foreach($ken as $k)
                                                <option value="{{$k->id}}">{{$k->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="tvmitelalefbet_id"
                                           class="col-md-12">ፕሮግራሙን ሚተላለፍበትን ሰዓት</label>
                                    <div class="col-md-12 form-group">
                                        <label>
                                            <select required class="tvmitelalefbet_id form-control"
                                                    name="tvmitelalefbet_id">
                                                <option value="0" disabled="true" selected="true">ፕሮግራሙ ሚተላለፍበት ሰዓት ምረጥ                                               ይምረጡ
                                                </option>
                                                @foreach($tvm as $k)
                                                    <option value="{{$k->name}}">{{$k->name}} </option>
                                                @endforeach
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="name"
                                           class="col-md-12">የፕሮግራም መሙያ ሰንጠረዥ አስገባ</label>
                                    <div class="col-md-12 form-group ">
                                            <textarea type="text" id="tv"
                                                      class="form-control"
                                                      name="name"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-4 ">
                                    <input type="submit" name="save" id="save" class="btn btn-primary  submit"
                                           value="መዝግብ"/>
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
                editor.ui.view.editable.element.style.height = '300px';
            })
        })
    </script>
@endsection


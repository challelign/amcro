@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{isset($mereha) ? route('merehagibr-update',$mereha->id): route('merehagibr-save')}} "  method="post">

                @csrf
                @if(isset($mereha))
                    @method('PUT')
                @endif
                <div class="card">
                    <div class="card-header" style="font-size: 20px">
                        {{isset($mereha) ? 'ሳምንታዊ የአማራ ራዲዮ የስርጭት መርሃ ግብር አስተካክል ':'ሳምንታዊ የአማራ ራዲዮ የስርጭት መርሃ ግብር'}}
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-md-6">
                            <label for="program_ken_id"
                                   class="col-md-12">ዕለት ምረጥ</label>
                            <div class="col-md-12">
                                <select required
                                        class="form-control @error('program_ken_id')  program_ken_id is-invalid @enderror"
                                        name="program_ken_id" id="program_ken_id">
                                    <option selected disabled>ይምረጡ</option>
                                    @foreach($ken as $k)
                                        <option value="{{$k->id}}"
                                                @if(isset($mereha))
                                                @if($k->id == $mereha->program_ken_id)
                                                selected
                                            @endif
                                            @endif >
                                            {{$k->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('program_ken_id')
                            <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="miraf_id"
                                   class="col-md-12">ምዕራፍ ምረጥ</label>
                            <div class="col-md-12">
                                <select required
                                        class="form-control @error('miraf_id')  miraf_id is-invalid @enderror"
                                        name="miraf_id" id="miraf_id">
                                    <option selected disabled>ምዕራፍ ምረጥ</option>

                                    @foreach($miraf as $mf)
                                        <option value="{{$mf->id}}"
                                                @if(isset($mereha))
                                                @if($mf->id === $mereha->miraf_id)
                                                selected
                                            @endif
                                            @endif >
                                            {{$mf->name}}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                            @error('miraf_id')
                            <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name"
                               class="col-md-12"> የስርጭት መርሃ ግብር አስገባ :</label>
                        <div class="col-md-12">
                                <textarea type="text" id="name" rows="5" cols="5"
                                          class="form-control @error('name')  name is-invalid @enderror"
                                          minlength="5"
                                          placeholder=" የስርጭት መርሃ ግብር አስገባ .. .."
                                          style="width: 100%; height: 40%; font-size: 14px;"
                                          name="name"
                                          autofocus>{{isset($mereha) ? $mereha->name : ''}}</textarea>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-4">
                            <a href="{{route('home')}}" type="submit" class="btn btn-info ">
                                ተመለስ
                            </a>
                            <button type="submit" name="save" id="save" class="btn btn-primary">
                                {{isset($mereha) ? 'አስተካክል ':'መዝግብ'}}</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <script>
        ClassicEditor.create(document.querySelector('#name'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
            .then(editor => {
                window.editor = editor;
                editor.ui.view.editable.element.style.height = '300px';

            })
            .catch(err => {
                console.error(err.stack);
            });
    </script>
@endsection

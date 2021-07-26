<div class="col-md-7">
    <div class="card">
        <div class="card-header" style="font-size: 20px"> ፕሮግራም አይዲ/መለያ/ አስተካክል ወይም ሰርዝ</div>
        <div class="card-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-condensed table-striped">

                        <thead>
                        <tr>
                            <th colspan="3">
                                <select data-column="2" class="form-control filter-select">
                                    <option value="">የተሸጠ እና ያልተሸጠ ምረጥ</option>
                                    {{--                                    {{$proyeteshete->yeteshete}}--}}
                                    @foreach($proyeteshete as $y)
                                        <option
                                            value="@if($y == '1') የተሸጠ@endif
                                            @if($y == '0') ያልተሸጠ @endif">
                                            @if($y == '1') የተሸጠ@endif
                                            @if($y == '0') ያልተሸጠ @endif
                                        </option>
                                    @endforeach
                                </select>
                            </th>
                            <th colspan="3">
                                <select data-column="3" class="form-control filter-select">
                                    <option value="">ውላቸው ያለቀ እና ያላለቀ ምረጥ</option>
                                    @foreach($proyexpire as $pe)
                                        <option
                                            value="@if($pe == '1') ውላቸው የተቋረጠ@endif
                                            @if($pe == '0') ውላቸው ያልተጠናቀቀ @endif">
                                            @if($pe == '1') ውላቸው የተቋረጠ @endif
                                            @if($pe == '0') ውላቸው ያልተጠናቀቀ @endif
                                        </option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>
                        <TR>
                            <th>ተ.ቁ</th>
                            <th>ፕሮግራም ስም</th>
                            <th>ያልተሸጠ/የተሸጠ</th>
                            <th>ውል</th>
                            <th>አስተካክል</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($i =0)@endif
                        @foreach($meleyafm as $pmeleya)
                            @if($i ++)@endif
                            <tr>
                                <td>{{$i}}</td>
                                <td class="m">{{$pmeleya->name}}</td>
                                <td>
                                    @if($pmeleya->yeteshete == '1')
                                        የተሸጠ
                                    @else
                                        ያልተሸጠ
                                    @endif
                                </td>
                                <td>
                                    @if($pmeleya->yeteshete == '1')
                                        @if($pmeleya->expire_contract == '1')
                                            ውላቸው የተቋረጠ
                                        @endif
                                        @if($pmeleya->expire_contract == '0')
                                            ውላቸው ያልተጠናቀቀ
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('program-ayidi-edit-fm',$pmeleya->id)}}" class="btn btn-sm btn-info">አስተካክል </a>
                                </td>
                                <td>
                                    <a href="{{route('program-ayidi-delete-fm',$pmeleya->id)}}"
                                       class="btn btn-sm btn-danger">ሰርዝ</a>
                                </td>
                                <td>
                                    @if($pmeleya->yeteshete == '1')
                                        @if($pmeleya->expire_contract == '0')

                                            <a href="{{route('program-ayidi-expire-end-fm',$pmeleya->id)}}"
                                               class="btn btn-sm btn-danger">ውሉን አቋርጥ</a>

                                        @endif
                                        @if($pmeleya->expire_contract == '1')
                                            <a href="{{route('program-ayidi-expire-start-fm',$pmeleya->id)}}"
                                               class="btn btn-sm btn-info">ውሉን አድስ </a>

                                        @endif
                                    @endif
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

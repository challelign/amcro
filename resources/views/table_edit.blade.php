<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Table Edit Delete Mysql Data using Tabledit Plugin in Laravel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>

    {{--    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <script src="{{asset('js/tabledit.min.js')}}"></script>
    {{--    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>--}}
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item dropdown show">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                   aria-expanded="true">Dropdown</a>
                <div class="dropdown-menu show">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<body>
<div class="container">
    <br/>
    <h3 align="center">Live Table Edit Delete with jQuery Tabledit in Laravel</h3>
    <br/>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Sample Data</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                @csrf
                <table id="editable" class="table table-bordered table-striped">
                    <thead>
                   
                    <TR>
                        <TH colspan="2">ቁርስ</TH>
                        <TH colspan="2">ምሳ</TH>
                        <TH colspan="2">እራት</TH>
                    </TR>
                    <TR>
                        <h2>
                            <td>ቦታ</td>
                        </h2>
                        <td>ቀን እና ሰዓት</td>
                        {{--                                            <td>ሰዓት</td>--}}
                        <td>ቦታ</td>
                        <td>ብር</td>

                        <td>ቦታ</td>
                        <td>ብር</td>

                        <td>ቦታ</td>
                        <td>ብር</td>

                        <td>ቦታ</td>
                        <td>ብር</td>

                        <td>ቀን ብዛት</td>
                        <td>ውሎ አበል</td>
                        <td>አልጋ</td>
                        <td>ት/ፖርት</td>
                        <td>ነዳጅናቅባት</td>
                        <td>ጠ/ወጪ</td>

                    </TR>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->first_name }}</td>
                            <td>{{ $row->last_name }}</td>
                            <td>{{ $row->gender }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url: '{{ route("tabledit.action") }}',
            dataType: "json",
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'name'],
                    [2, 'first_name'],
                    // [3, 'last_name'],
                    [4, 'gender', '{"1":"Male", "2":"Female"}']
                ]
            },
            restoreButton: false,
            // onSuccess:function(data, textStatus, jqXHR)
            // {
            //     if(data.action == 'delete')
            //     {
            //         $('#'+data.id).remove();
            //     }
            // }
        });

    });
</script>

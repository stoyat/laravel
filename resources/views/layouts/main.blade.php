<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
@section('sidebar')
    <nav class="navbar navbar-default">
        <ul class="nav navbar-nav">
            <li><a href="{{URL::to('user/')}}">Users</a></li>
            <li><a href="{{URL::to('book/')}}">Books</a></li>
        </ul>
        </div>
    </nav>

@if (Session::has('status'))
    <div class="alert-success">{{ Session::get('status') }}</div>
@endif

@show

<div class="container">
    @yield('content')
</div>
</body>
</html>
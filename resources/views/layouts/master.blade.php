<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo asset('css/styles.css')?>" type="text/css"> 
</head>
<body>

<div class="row">
            <div class="sidebar col-lg-2 col-md-3">
                <h2>Wiki</h2>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form method="POST" action="{{route('search')}}">
                    {{ csrf_field() }}
                    <input class="search" type="text" name="q" placeholder="Search Encyclopedia">
                </form>
                <div>
                    <a href="{{route('home')}}">Home</a>
                </div>
                <div>
                    <a href="{{route('create')}}">Create New Page</a>
                </div>
                <div>
                    <a href="{{route('random')}}">Random Page</a>
                </div>
                @yield('nav')  
            </div>
            <div class="main col-lg-10 col-md-9">
                @yield('content')  
            </div>
</div>


</body>
</html>
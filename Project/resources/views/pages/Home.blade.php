<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Home </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

</head>

<body background="{{URL::asset("images/8.jpg")}}">

<!-- Latest compiled and minified JavaScript -->
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<div class="row header">
    <nav class="navbar navbar-default navbar-fixed-top" style=" float:right; background: #4f788e; ">
        <div class="container-fluid">
            <div id="navbar" class="navbar-collapse collapse">
                <a href="{!! action('Auth\AuthController@getLogout')!!}">
                    <button class="btn btn-default" type="submit" style="float:right; color: #f2f9fa; background: #0d2945; margin-top: 10px; margin-left:50px; ">LOGOUT</button>
                </a>
                <span class ="label label-primary" style="font-size:18px; background:#0d2945; float:right; color: #f2f9fa; margin-top: 15px; margin-left:50px; text-transform: uppercase; "> {{ $user_name }} </span>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="jumbotron" style="width:600; height:200; background: #4f788e; margin-top: 100px; margin-left:280px;">
        <h1 style="margin-left:100px; font: bold; color: #edfdfd">PROJEX</h1>
        <h3 style="color: #edfdfd;">PROJECT MANAGEMENT APPLICATION</h3>
    </div>
    <div>
        <a class="btn btn-default" href="{!! action('PageController@viewDisplay')!!}" style="width:150; height:40; background: #0d2945; margin-left:450px; font: bold; color: #edfdfd;">VIEW ALL</a>
        <a class="btn btn-default" href="{!! action('PageController@viewAdd')!!}" style="width:150; height:40; background: #0d2945;  font: bold; color: #edfdfd;">ADD NEW PROJECT</a>
    </div>
</div>
</body>

</html>
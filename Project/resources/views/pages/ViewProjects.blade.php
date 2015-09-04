<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Projex </title>
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
                <a href="{!! action('PageController@viewHome')!!}">
                    <button class="btn btn-default" type="submit" style="float:right; color: #f2f9fa; background: #0d2945; margin-top: 10px; margin-left:50px; ">Home</button>
                </a>
            </div>
        </div>
    </nav>
</div>
<div class="container">
    <div class="col-left">
        <div class="panel panel-primary" style="margin-left:380px; width:450; height:550; background: #4f788e; margin-top: 55px;">
            <div class="panel-heading">
                <h3 class="panel-title" style="font-weight:bold;text-transform:uppercase; text-align:center;">PROJECTS</h3>
            </div>
            <div class="panel-body">
                <div class="col-xs-12">
                    <ul class="list-group">
                        @foreach($project as $prjct)
                        <li class="list-group-item list-group-item-info" style="font-weight:bold;">
                            {{$prjct->name}}
                            <a class="btn btn-primary" href="{!! action('PageController@viewProject',[$prjct->id])!!}" target="_blank" style="position:relative; top: -8px; float:right; font-weight:bold; color: #f2f9fa;">View</a>
                        </li>
                        <br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Project </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

</head>

<body background="{{URL::asset("images/8.jpg")}}">

<!-- Latest compiled and minified JavaScript -->
<script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<div class="container">
    <div class="raw">
        <div class="jumbotron" style="width:650; height:600; background: #4f788e; margin-top: 10px; margin-left:280px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style="font-weight:bold;text-transform:uppercase;">PROJECT DETAILS</h3>
                </div>
                <div class="panel-body">
                    <div class="col-xs-4">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Title</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Owner</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Description</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Technologies</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Deadline</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Reservations</li>
                            <br>
                            <li class="list-group-item list-group-item-info" style="font-weight:bold;">Volunteers</li>
                        </ul>
                    </div>
                    <div class="col-xs-8">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-info">
                                 {{$project[0]->name}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$user->name}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$project[0]->description}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$project[0]->technologies}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$project[0]->deadline}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$reservationCount}}
                            </a>
                            <br>
                            <a href="#" class="list-group-item list-group-item-info">
                                {{$volunteerCount}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
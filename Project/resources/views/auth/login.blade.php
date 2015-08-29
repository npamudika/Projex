<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Login </title>
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
</div>

<div class="jambotron" style="width:600; height:200; background: #4f788e; margin-top: 100px; margin-left:380px;">
    <div id="buyer_form">
        {!! Form::open(array('action'=>'Auth\AuthController@getLogin', 'class'=>'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('email','Email',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::email('email','',array('class'=>'form-control'))!!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('pasword','Password',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-10">
                    {!! Form::password('password',array('class'=>'form-control'))!!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                        {!!Form::checkbox('remember','',array('style'=>'font: bold; color: #000;'))!!}
                            Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    {!! Form::submit('Login',array('class'=>'btn btn-default','style'=>'width:150; height:40; background: #0d2945; margin-left:40px; font: bold; color: #edfdfd;'))!!}
                    {!! Form::button('Reset',array('class'=>'btn btn-default','style'=>'width:150; height:40; background: #0d2945; font: bold; color: #edfdfd;'))!!}
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>

</body>

</html>
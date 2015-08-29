<html lang="en">

<head>
    <meta charset="utf-8">
    <title> SignUp </title>
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

<div class="container">
    <div class="Jambotron" style="width:550; height:350; background: #4f788e; margin-top: 70px; margin-left:250px;">
        {!! Form::open(array('action'=>'Auth\AuthController@getRegister', 'class'=>'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('name','User Name',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('name','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
        <div class="form-group">
            {!! Form::label('type','Type',array('class'=>'col-sm-2 control-label')) !!}
            <div class="col-sm-6">
                {!! Form::radio('type','coordinator',array('class'=>'form-control'))!!}
                Coordinator
                <br>
                {!! Form::radio('type','student',array('class'=>'form-control'))!!}
                Student
                <br>
                {!! Form::radio('type','lecturer',array('class'=>'form-control'))!!}
                Lecturer
            </div>
            <div class="col-sm-4 messages"></div>
        </div>
            <div class="form-group">
                    {!! Form::label('email','Email',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::email('email','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
             <div class="form-group">
                {!! Form::label('password','Password',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::password('password',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                {!! Form::label('password_confirmation','Confirm Pasword',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::password('password_confirmation',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>

        {!! Form::submit('Sign Up',array('class'=>'btn btn-default','style'=>'width:150; height:40; background: #0d2945; margin-left:210px; font: bold; color: #edfdfd;'))!!}
    </div>
</div>

</body>

</html>
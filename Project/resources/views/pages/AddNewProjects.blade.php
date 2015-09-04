<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Add New Projects </title>
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
    <nav class="navbar navbar-default navbar-fixed-top" style=" float:right; background: #4f788e;">
</div>

<div class="container">
    <div class="Jambotron" style="width:650; height:400; background: #4f788e; margin-top: 70px; margin-left:250px;">
        {!! Form::open(array('action'=>'PageController@addProjects', 'class'=>'form-horizontal')) !!}
            <div class="form-group">
                {!! Form::label('project_name','Project Name',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('project_name','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                {!! Form::label('owner','Owner',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('owner','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                {!! Form::label('description','Description',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('description','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                {!! Form::label('technologies','Technologies',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::text('technologies','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>
            <div class="form-group">
                {!! Form::label('deadline','Deadline',array('class'=>'col-sm-2 control-label')) !!}
                <div class="col-sm-6">
                    {!! Form::date('deadline','',array('class'=>'form-control'))!!}
                </div>
                <div class="col-sm-4 messages"></div>
            </div>


        <button type="button" class="btn btn-default" data-dismiss="modal" style="width:150; height:40; background: #0d2945; margin-left:115px; font: bold; color: #edfdfd;">RESET</button>
            <a href="{!! action('PageController@viewHome')!!}">
                <button type="button" class="btn btn-default" data-dismiss="modal" style="width:150; height:40; background: #0d2945;  font: bold; color: #edfdfd;">EXIT</button>
            </a>
        {!! Form::submit('CREATE PROJECT', array('class'=>'btn btn-primary', 'style'=>'font:bold; width:150; height:40; background: #0d2945;  font: bold; color: #edfdfd;')) !!}
        {!! Form::close() !!}

    </div>
</div>

</body>

</html>
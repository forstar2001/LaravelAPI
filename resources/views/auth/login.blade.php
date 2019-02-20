<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{APP_NAME}}</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="{{url('logo.png')}}"/>

</head>
<body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{url('logo.png')}}" style="width: 20%;margin-top: 30px">
                </div>
            </div>
           
            <div class="row center-block">
            <div class="col-lg-4 col-md-offset-4 ">
                <br/>
                <br/>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                   <div class="form-group">
                        <input type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group pull-right">
                        <a href="{{ url('password/email') }}" style="color: grey"> Forgot Password?</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-lg-6 col-md-offset-3">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

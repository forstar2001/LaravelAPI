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
    <style>
        .col-centered{
            float: none;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{url('logo.png')}}" style="width: 15%;margin-top: 100px">
            </div>
        </div>
        <br/>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <p style="text-align: center;padding: 10px;"> Enter your email address so that we can send you instructions on how to reset your password </p>

        <div class="col-lg-3 col-centered">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                <div class="form-group-lg form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div>
                <div class="form-group form-group-lg">
                    <button type="submit" class="btn btn-primary btn-block">
                             Submit
                    </button>
                </div>
            </form>
        </div>
        <div style="text-align:center"><a style="text-align: center;color: gray; padding-top: 20px;" href="{{url('login')}}"><i class="fa fa-angle-left" aria-hidden="true"></i> Back to login</a></div>
    </div>
</body>
</html>


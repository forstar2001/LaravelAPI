<!DOCTYPE html>
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
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
    
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="shortcut icon" type="image/png" href="{{url('logo.png')}}"/>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        :focus {
            outline: none;
        }
        .row {
          margin-right: 0;
          margin-left: 0;
        }


        .side-menu {
          position: fixed;
          width: 300px;
          height: 100%;
          background-color: #f8f8f8;
          border-right: 1px solid #e7e7e7;
          margin-left: -14px;
        }
        .side-menu .navbar {
          border: none;
        }
        .side-menu .navbar-header {
          width: 100%;
          border-bottom: 1px solid #e7e7e7;
        }
        .side-menu .navbar-nav .active a {
          background-color: transparent;
          margin-right: -1px;
          border-right: 5px solid #e7e7e7;
        }
        .side-menu .navbar-nav li {
          display: block;
          width: 100%;
          border-bottom: 1px solid #e7e7e7;
        }
        .side-menu .navbar-nav li a {
          padding: 15px;
        }
        .side-menu .navbar-nav li a .glyphicon {
          padding-right: 10px;
        }
        .side-menu #dropdown {
          border: 0;
          margin-bottom: 0;
          border-radius: 0;
          background-color: transparent;
          box-shadow: none;
        }
        .side-menu #dropdown .caret {
          float: right;
          margin: 9px 5px 0;
        }
        .side-menu #dropdown .indicator {
          float: right;
        }
        .side-menu #dropdown > a {
          border-bottom: 1px solid #e7e7e7;
        }
        .side-menu #dropdown .panel-body {
          padding: 0;
          background-color: #f3f3f3;
        }
        .side-menu #dropdown .panel-body .navbar-nav {
          width: 100%;
        }
        .side-menu #dropdown .panel-body .navbar-nav li {
          padding-left: 15px;
          border-bottom: 1px solid #e7e7e7;
        }
        .side-menu #dropdown .panel-body .navbar-nav li:last-child {
          border-bottom: none;
        }
        .side-menu #dropdown .panel-body .panel > a {
          margin-left: -20px;
          padding-left: 35px;
        }
        .side-menu #dropdown .panel-body .panel-body {
          margin-left: -15px;
        }
        .side-menu #dropdown .panel-body .panel-body li {
          padding-left: 30px;
        }
        .side-menu #dropdown .panel-body .panel-body li:last-child {
          border-bottom: 1px solid #e7e7e7;
        }
        .side-menu #search-trigger {
          background-color: #f3f3f3;
          border: 0;
          border-radius: 0;
          position: absolute;
          top: 0;
          right: 0;
          padding: 15px 18px;
        }
        .side-menu .brand-name-wrapper {
          min-height: 50px;
        }
        .side-menu .brand-name-wrapper .navbar-brand {
          display: block;
        }
        .side-menu #search {
          position: relative;
          z-index: 1000;
        }
        .side-menu #search .panel-body {
          padding: 0;
        }
        .side-menu #search .panel-body .navbar-form {
          padding: 0;
          padding-right: 50px;
          width: 100%;
          margin: 0;
          position: relative;
          border-top: 1px solid #e7e7e7;
        }
        .side-menu #search .panel-body .navbar-form .form-group {
          width: 100%;
          position: relative;
        }
        .side-menu #search .panel-body .navbar-form input {
          border: 0;
          border-radius: 0;
          box-shadow: none;
          width: 100%;
          height: 50px;
        }
        .side-menu #search .panel-body .navbar-form .btn {
          position: absolute;
          right: 0;
          top: 0;
          border: 0;
          border-radius: 0;
          background-color: #f3f3f3;
          padding: 15px 18px;
        }
        /* Main body section */
        .side-body {
          margin-left: 310px;
        }
        /* small screen */
        @media (max-width: 768px) {
          .side-menu {
            position: relative;
            width: 100%;
            height: 0;
            border-right: 0;
            border-bottom: 1px solid #e7e7e7;
          }
          .side-menu .brand-name-wrapper .navbar-brand {
            display: inline-block;
          }
          /* Slide in animation */
          @-moz-keyframes slidein {
            0% {
              left: -300px;
            }
            100% {
              left: 10px;
            }
          }
          @-webkit-keyframes slidein {
            0% {
              left: -300px;
            }
            100% {
              left: 10px;
            }
          }
          @keyframes slidein {
            0% {
              left: -300px;
            }
            100% {
              left: 10px;
            }
          }
          @-moz-keyframes slideout {
            0% {
              left: 0;
            }
            100% {
              left: -300px;
            }
          }
          @-webkit-keyframes slideout {
            0% {
              left: 0;
            }
            100% {
              left: -300px;
            }
            
           
          }
           img {
                display: none;
            }
          @keyframes slideout {
            0% {
              left: 0;
            }
            100% {
              left: -300px;
            }
          }
          /* Slide side menu*/
          /* Add .absolute-wrapper.slide-in for scrollable menu -> see top comment */
          .side-menu-container > .navbar-nav.slide-in {
            -moz-animation: slidein 300ms forwards;
            -o-animation: slidein 300ms forwards;
            -webkit-animation: slidein 300ms forwards;
            animation: slidein 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
          }
          .side-menu-container > .navbar-nav {
            /* Add position:absolute for scrollable menu -> see top comment */
            position: fixed;
            left: -300px;
            width: 300px;
            top: 43px;
            height: 100%;
            border-right: 1px solid #e7e7e7;
            background-color: #f8f8f8;
            -moz-animation: slideout 300ms forwards;
            -o-animation: slideout 300ms forwards;
            -webkit-animation: slideout 300ms forwards;
            animation: slideout 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
          }
          /* Uncomment for scrollable menu -> see top comment */
          /*.absolute-wrapper{
                width:285px;
                -moz-animation: slideout 300ms forwards;
                -o-animation: slideout 300ms forwards;
                -webkit-animation: slideout 300ms forwards;
                animation: slideout 300ms forwards;
                -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
            }*/
          @-moz-keyframes bodyslidein {
            0% {
              left: 0;
            }
            100% {
              left: 300px;
            }
          }
          @-webkit-keyframes bodyslidein {
            0% {
              left: 0;
            }
            100% {
              left: 300px;
            }
          }
          @keyframes bodyslidein {
            0% {
              left: 0;
            }
            100% {
              left: 300px;
            }
          }
          @-moz-keyframes bodyslideout {
            0% {
              left: 300px;
            }
            100% {
              left: 0;
            }
          }
          @-webkit-keyframes bodyslideout {
            0% {
              left: 300px;
            }
            100% {
              left: 0;
            }
          }
          @keyframes bodyslideout {
            0% {
              left: 300px;
            }
            100% {
              left: 0;
            }
          }
          /* Slide side body*/
          .side-body {
            margin-left: 5px;
            margin-top: 70px;
            position: relative;
            -moz-animation: bodyslideout 300ms forwards;
            -o-animation: bodyslideout 300ms forwards;
            -webkit-animation: bodyslideout 300ms forwards;
            animation: bodyslideout 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
          }
          .body-slide-in {
            -moz-animation: bodyslidein 300ms forwards;
            -o-animation: bodyslidein 300ms forwards;
            -webkit-animation: bodyslidein 300ms forwards;
            animation: bodyslidein 300ms forwards;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
          }
          /* Hamburger */
          .navbar-toggle {
            border: 0;
            float: left;
            padding: 18px;
            margin: 0;
            border-radius: 0;
            background-color: #f3f3f3;
          }
          /* Search */
          #search .panel-body .navbar-form {
            border-bottom: 0;
          }
          #search .panel-body .navbar-form .form-group {
            margin: 0;
          }
          .navbar-header {
            /* this is probably redundant */
            position: fixed;
            z-index: 3;
            background-color: #f8f8f8;
          }
          /* Dropdown tweek */
          #dropdown .panel-body .navbar-nav {
            margin: 0;
          }
        }
    </style>
</head>
<body id="app-layout">
    
    <div class="container-fluid" >
        <div class="row">
    <!-- uncomment code for absolute positioning tweek see top comment in css -->
    <!-- <div class="absolute-wrapper"> </div> -->
    <!-- Menu -->
    <div class="side-menu">
    
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="brand-wrapper">
                <!-- Hamburger -->
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Brand -->
                <div class="brand-name-wrapper">
                    <div class="text-center"><img src="{{url('logo.png')}}" style="width: 60%; padding: 20px"></div>
                </div>
            </div>
        </div>
        <!-- Main Menu -->
        <div class="side-menu-container">
            <ul class="nav navbar-nav">

                <li @if(Request::segment(1)=='users') {{'class=active'}} @endif><a href="{{url('users')}}">Users Management</a></li>
                <li @if(Request::segment(1)=='templates') {{'class=active'}} @endif><a href="{{url('templates/list')}}">Templates</a></li>
                <li @if(Request::segment(1)=='test_templates') {{'class=active'}} @endif><a href="{{url('test-area')}}">Test Area</a></li>
                <li @if(Request::segment(1)=='settings') {{'class=active'}} @endif><a href="{{url('settings')}}">Settings</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="side-body">
            <div class="row" style="margin-bottom:15px;margin-top:15px;">
                <div class="col-lg-2 col-lg-offset-10 pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> Login</a>
                    @else
                        <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-user"></span> Logout</a>
                    @endif
                </div>
            </div>
            @yield('content')
        </div>
    </div>
</div>
    </div>
    
    
<script>
        
    $(document).ready(function() {
        $(function () {
            $('.navbar-toggle').click(function () {
                $('.navbar-nav').toggleClass('slide-in');
                $('.side-body').toggleClass('body-slide-in');
                $('#search').removeClass('in').addClass('collapse').slideUp(200);

                /// uncomment code for absolute positioning tweek see top comment in css
                //$('.absolute-wrapper').toggleClass('slide-in');

            });

           // Remove menu for searching
           $('#search-trigger').click(function () {
                $('.navbar-nav').removeClass('slide-in');
                $('.side-body').removeClass('body-slide-in');

                /// uncomment code for absolute positioning tweek see top comment in css
                //$('.absolute-wrapper').removeClass('slide-in');

            });
        });
        $('.app_user_table').DataTable();
        $('.packages_list').DataTable();
        var oTable = $('#question_list').DataTable({
            "oSearch": {"bSmart": false,"bRegex": false},
            "columnDefs": [
                { "targets": [0,1], "searchable": false }
            ]

        });

    });


    function delete_confirmation()
    {
        var result = confirm("Do you want to delete the record?");
        if(result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>
</body>
</html>

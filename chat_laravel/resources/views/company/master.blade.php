<!doctype html>
<html lang="{{Config('app.locale') }}">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Company</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="{{Config::get('app.url')}}/company_theme/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="{{Config::get('app.url')}}/company_theme/assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{Config::get('app.url')}}/company_theme/assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{Config::get('app.url')}}/company_theme/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{Config::get('app.url')}}/company_theme/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-color="azure"data-image="{{Config::get('app.url')}}/company_theme/assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('/company')}}" class="simple-text">Company</a>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="{{url('/company')}}"><i class="pe-7s-graph"></i><p> Dashboard</p></a>
                </li>
                <li>
                    <a href="{{url('/company/jobs')}}"><i class="pe-7s-graph3"></i><p>View Jobs</p></a>
                </li>
                <li>
                    <a href="{{url('/company/addJobFrom')}}"><i class="pe-7s-plus"></i><p>Add Jobs</p></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> <i class="pe-7s-home"></i>Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><p>Account<b class="caret"></b></p></a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <a href="{{url('/logout')}}"><p>Log out</p></a>
                        </li>
						<li class="separator hidden-lg hidden-md">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
     @yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Jobs</a></li>
                    </ul>
                </nav>
                <p class="copyright pull-right">Company Dashboard </p>
            </div>
        </footer>
    </div>
</div>
</body>
    <!--   Core JS Files   -->
    <script src="{{Config::get('app.url')}}/company_theme/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="{{Config::get('app.url')}}/company_theme/assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{Config::get('app.url')}}/company_theme/assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!--  Charts Plugin -->
	<script src="{{Config::get('app.url')}}/company_theme/assets/js/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="{{Config::get('app.url')}}/company_theme/assets/js/bootstrap-notify.js"></script>
    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="{{Config::get('app.url')}}/company_theme/assets/js/light-bootstrap-dashboard.js"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="{{Config::get('app.url')}}/company_theme/assets/js/demo.js"></script>
	<script type="text/javascript">
    	$(document).ready(function(){
        	demo.initChartist();
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Company Dashboard</b> "
            },{
                type: 'info',
                timer: 1000
            });
    	});
	</script>
</html>

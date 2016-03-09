<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lara-book</title>

	<link href="{{ secure_asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('/css/larabook.css') }}" rel="stylesheet">
	<link href="{{ secure_asset('/css/sweetalert.css') }}" rel="stylesheet">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>  
	<script src="{{ asset('/js/sweetalert.min.js') }}"></script>       
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                            <a class="navbar-brand" href="{{ url('/') }}"><span id="logopart1">LARA</span><span id="logopart2">BOOKSHOP</span></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}"><i class="fa fa-home menu-haut"></i>  Home</a></li>
					<li><a href="{{ url('/catalogue') }}"><i class="fa fa-book menu-haut"></i>  Catalogue  </a></li>
					<!--li><a href="{{ url('/') }}"><i class="fa fa-file-pdf-o menu-haut"></i>  PDF books  </a></li-->
					<li><a href="{{ url('/') }}"><i class="fa fa-usd menu-haut"></i>  Promotions  </a></li>
					<li><a href="{{ url('/') }}"><i class="fa fa-plus-square-o menu-haut"></i>  Novelties  </a></li>
                                        <li id="shoppingcart"><a href="{{ route('showcart') }}"><i class="fa fa-shopping-cart menu-haut"></i>  Cart <span id="nb_items" class="badge"> {{ $total_books or 0 }} </span></a></li>                                        
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->email }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
        <?php 
            //var_dump(Auth::user());
        ?>
	@yield('content')

        <footer>
            Fahmi Derbali <span class="glyphicon glyphicon-copyright-mark" aria-hidden="true"></span> <?php echo date('Y'); ?>
            <br />
            <i class="fa fa-cogs"></i> Powered by Laravel
        </footer>
</body>
</html>

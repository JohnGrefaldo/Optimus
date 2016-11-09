<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Upload CSV</title>
	
		<meta name="author" content="Osvaldas Valutis for Codrops" />
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="/assets//css/component.css" />
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- papaparse -->
		<script src="/assets/csv/js/papaparse.js"></script>
		<script src="/assets/csv/js/player.js"></script>
		<!-- papaparse -->
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
		<script
		  src="https://code.jquery.com/jquery-3.1.1.min.js"
		  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		  crossorigin="anonymous"></script>
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- remove this if you use Modernizr -->
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
	<body>
	@yield('content')
	

		<script src="/assets/js/csv/custom-file-input.js"></script>

		<!-- // If you'd like to use jQuery, check out js/jquery.custom-file-input.js
		<script src="js/jquery-v1.min.js"></script>
		<script src="js/jquery.custom-file-input.js"></script>
		-->

	</body>
</html>

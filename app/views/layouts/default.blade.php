<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
	@include('layouts.partials.nav')


	<div class="container">
		@include('flash::message')
		@yield('content')
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>
		$('#flash-overlay-modal').modal()
		
		$('.comments__create-form').on('keydown', function(e) {
			if (e.keyCode == 13) {
				e.preventDefault();
				$(this).submit();
			}
		});
	</script>
</body>
</html>
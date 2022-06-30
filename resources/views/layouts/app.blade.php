<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
		<link rel="stylesheet" href="{{ asset('styles/common_style.css') }}">
        @yield('style')
        @yield('script')
		<title>Blog del Cinema | @yield('title')</title>
	</head>
	@yield('body')
</html>
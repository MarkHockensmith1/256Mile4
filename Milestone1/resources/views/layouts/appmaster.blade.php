<html lang="en">
<head>
	<title>@yield('title')</title>
</head>
<style>
body {
  background-color: linen;
}

h1 {
  color: maroon;
  margin-left: 40px;
} 
</style>

<body>
	@include('layouts.header')
	<div align="center">
		@yield('content')
	</div>
	@include('layouts.footer')
</body>
</html>
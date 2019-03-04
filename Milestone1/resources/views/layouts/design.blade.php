
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
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #ffffff;
}

li {
  float: left;
}

li a {
  display: block;
  color: gray;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
</style>
<body>
	@include('layouts.header')
	<div id='cssmenu'>
    	<nav><!--Navigation around website-->
            <ul>
              <li><a href="login">Login</a></li>
              <li><a href="register">Register</a></li>
              
              <li><a href="createProfile">Create Profile</a></li>
              <li><a href="createJobInfo">Create Portfolio</a></li>
              <li><a href="editPortfolioView">Edit Portfolio</a></li>
              <li><a href="">Job Listings</a></li>
            </ul>
      	</nav>
	</div>
	<div align="center">
		@yield('content')
	</div>
	@include('layouts.footer')
</body>

</html>
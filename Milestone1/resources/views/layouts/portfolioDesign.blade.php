
<html lang="en">

<head>
	<title>@yield('title')</title>

</head>
<style>
body {
  background-color: linen;
}








.navbar {
  overflow: hidden;
  background-color: #333;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px; 
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
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
	

  
	<div class="navbar">
    	
            <a href="login">Login</a>
            <a href="register">Register</a>
            <a href="createProfile">Create Profile</a>
              	<div class="dropdown">
    				<button class="dropbtn">Portfolio Options
      				<i class="fa fa-caret-down"></i>
    				</button>
    				<div class="dropdown-content">
      					<a href="addSkill">Add Skills</a>
      					<a href="#">Add Job History</a>
      					<a href="#">Add Education</a>
    				</div>
    			</div>
              <a href="">Job Listings</a>
              
      </div>
           
      	
	
	<div align="center">
		@yield('content')
	</div>
	@include('layouts.footer')
</body>

</html>
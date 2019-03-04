@extends('layouts.appmaster')
@section('title','Login Page')

@section('content')
	<form action = "login" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Please Login</h2>
		<table>
			<tr>
				<td>Username: </td>
				<td><input type = "text" name = "username" /></td>
			</tr><br/>
			<tr>
				<td>Password: </td>
				<td><input type = "password" name = "password" /></td>
			</tr><br/><br/>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Login In" />
				</td>
			</tr>
		</table>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	</form>
@endsection
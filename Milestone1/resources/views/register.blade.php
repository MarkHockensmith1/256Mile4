@extends('layouts.appmaster')
@section('title','Register Page')

@section('content')
	<form action = "register" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter your Information Below</h2>
		<table>
			<tr>
				<td>First Name: </td>
				<td><input type = "text" name = "firstname" /></td>
			</tr><br/>
			<tr>
				<td>Last Name: </td>
				<td><input type = "text" name = "lastname" /></td>
			</tr><br/>
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
					<input type = "submit" value = "Register" />
				</td>
			</tr>
		</table>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	</form>
@endsection
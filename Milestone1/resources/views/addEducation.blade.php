@extends('layouts.design')
@section('title','Add Skill')

@section('content')
	<form action = "addEducation" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter Education below</h2>
		
		<table>
			<tr>
				<td>Enter Education here </td>
				<td><input type = "text" name = "education" size="65" style="height: 125px;" /></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Add Educations" />
				</td>
			</tr>
		</table>
		</form>
		<br>
		<br>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	
@endsection
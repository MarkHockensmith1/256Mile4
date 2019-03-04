@extends('layouts.design')
@section('title','User Job Skills Page')

@section('content')
	<form action = "createJobInfo" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter Skills, Job History, and Education below</h2>
		
		<table>
			<tr>
				<td>Enter Skills here </td>
				<td><input type = "text" name = "skills" size="65" style="height: 125px;" /></td>
			</tr>
		
			<tr>
				<td>Enter Job History Here </td>
				<td><input type = "text" name = "history" size="65" style="height: 125px;"/></td>
			</tr>
	
			<tr>
				<td>Enter Education here </td>
				<td><input type = "text" name = "education" size="65" style="height: 125px;"/></td>
			</tr>
	
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Add Data" />
				</td>
			</tr>
		</table>
	
		
		<br>
		<br>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	</form>
	
@endsection
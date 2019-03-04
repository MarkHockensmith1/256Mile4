@extends('layouts.design')
@section('title','Create Portfolio Page')

@section('content')
	<form action = "addJob" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter Job History below</h2>
		
		<table>
			<tr>
				<td>Enter Job here </td>
				<td><input type = "text" name = "job" size="65" style="height: 125px;" /></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Add to Jobs" />
				</td>
			</tr>
		</table>
		</form>
		
		<br>
		<br>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	
@endsection
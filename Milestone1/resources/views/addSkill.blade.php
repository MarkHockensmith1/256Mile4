@extends('layouts.design')
@section('title','Add Skill')

@section('content')
	<form action = "addSkill" method = "POST">
		<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
		<h2> Enter Skills below</h2>
		
		<table>
			<tr>
				<td>Enter Skills here </td>
				<td><input type = "text" name = "skills" size="65" style="height: 125px;" /></td>
			</tr>
			<tr>
				<td colspan = "2" align = "center">
					<input type = "submit" value = "Add to Skills" />
				</td>
			</tr>
		</table>
		</form>
		<br>
		<br>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	
@endsection
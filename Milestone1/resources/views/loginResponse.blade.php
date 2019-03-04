@extends('layouts.appmaster')
@section('title','Home View')

@section('content')
	<h2>Login Sucessful</h2>
	<?= $user->getUsername() . "you have successfully logged in." ?>
	<form>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
	</form>
	
	<button ><a href="http://localhost:8888/MilestoneCLC/admin">Admin</a></button><br>
	<button><a href="http://localhost:8888/MilestoneCLC/createProfile">Create Profile</a></button>
@endsection
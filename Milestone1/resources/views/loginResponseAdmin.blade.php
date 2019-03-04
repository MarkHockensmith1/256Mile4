@extends('layouts.design')
@section('title', 'Home Page')

@section('content')
	<h2>Login Sucessful</h2>
	<?= $user->getUsername() . " you have successfully logged in. Welcome Admin" ?>
	<form action="admin" method = "POST">
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
    		<input type="submit" value="Admin Page" />
	</form>
@endsection

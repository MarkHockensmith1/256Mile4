@extends('layouts.design')
@section('title','Portfolio View')

@section('content')
	<form>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
	</form>
	<h2>User Skills, Job history, and Education</h2>
	<br>
	<h3>Your current Skills: </h3>
	<?= $skill->getSkills()?>
	<br>
	<h3>Your current Job History: </h3>
	<?= $history->getHistory()?>
	<br>
	<h3>Your current Education: </h3>
	<?= $education->getEducation()?>

	
	
@endsection
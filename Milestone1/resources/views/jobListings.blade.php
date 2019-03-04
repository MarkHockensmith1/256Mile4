@extends('layouts.appmaster')
@section('title','Job Listings Page')

@section('content')
	<form>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
	</form>
	<h2>Job Listing Page</h2>
	<br>
	<h3>Available Jobs </h3>
	<?= $jobPosting->getJobPosting()?>
	<br>
	
	
	
@endsection
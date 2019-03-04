@extends('layouts.design')
@section('content')

<h2>This is the admin page</h2><br>
<h4>for admin, 0 = standard user, 1 = Admin User, 2 = dissabled account.</h4>

<div>
<form>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
	{{ print_r($result)}};
</form>

</div>
@endsection
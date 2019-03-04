@extends('layouts.appmaster')
@section('title','Exeption Error Message')

@section('content')
<?php 
    echo "Exception " . $errorMsg;
?>

<br>
<a href="login">Try Again</a>
@endsection
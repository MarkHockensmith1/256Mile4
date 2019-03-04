@extends('layouts.portfolioDesign')
@section('title','all portfolio data')

@section('content')
	<form>
	<input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>"/>
	<h2>User Skills, Job history, and Education</h2>
	<br>
	<table>
	<tr><h3>Your current Skills: </h3></tr>
	
		<?php 
		foreach($skillr as $value){
		    echo "<tr>";
		    echo"<td> " . $value->getSkills() . "</td>";
			echo "<td><input type='hidden' value= ".$value->getSkills(). " name='job'/><input action = 'delete' method = 'POST' type='submit' value='delete' /></td>";
			echo "<td><input type='hidden' value= ".$value->getSkills(). " name='job'/><input action = 'update' method = 'POST' type='submit' value='update' /></td>";
		    echo "</tr>";
		}
		?>
		
	</table>
	<br/>
	<table>
	<tr><h3>Your Job History: </h3></tr>
	
		<?php 
		foreach($historyr as $value){
		    echo "<tr>";
		    echo"<td> " . $value->getHistory() . "</td>";
			echo "<td><input type='hidden' value= ".$value->getHistory(). " name='job'/><input action = 'delete' method = 'POST' type='submit' value='delete' /></td>";
			echo "<td><input type='hidden' value= ".$value->getHistory(). " name='job'/><input action = 'update' method = 'POST' type='submit' value='update' /></td>";
		    echo "</tr>";
		}
		?>
		
	</table>
	<br/>
	<table>
	<tr><h3>Your Education: </h3></tr>
	
		<?php 
		foreach($educationr as $value){
		    echo "<tr>";
		    echo"<td> " . $value->getEducation() . "</td>";
			echo "<td><input type='hidden' value= ".$value->getEducation(). " name='job'/><input action = 'delete' method = 'POST' type='submit' value='delete' /></td>";
			echo "<td><input type='hidden' value= ".$value->getEducation(). " name='job'/><input action = 'update' method = 'POST' type='submit' value='update' /></td>";
		    echo "</tr>";
		}
		?>
		
	</table>
		<button><a href="http://localhost:8888/MilestoneCLC/home">Home</a></button>
	</form>
	
@endsection
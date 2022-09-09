<?php

include './backend/db.php';

$db = db_connect('localhost', 'root', '', 'Library');

if(!$db){echo "-- Error occured."; die();}

if(isset($_COOKIE['user']))
{
	echo $_COOKIE['user'];
} else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prakash Library</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript">
		function pass()
		{
			var p = document.getElementById('pass')
			p
		}
	</script>
</head>
<body>
	<div class='form'>
		<div class='image'></div>
		<form>
			<br>
			<u><h2>Prakash Library</h2></u>
			<br>
			<input class='input' type="text" name="" placeholder="Your Name">
			<br><br>
			<input onkeypress="pass()" class='input-pass' type="password" name="" placeholder="Password">
			<br><br>
			<input type="text" class='lb' value="Date of delivery :-" readonly>
			<input class='input' type="date" name="" pattern="
			(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))
			"><br><br><br>
			
			<input type="text" class='lb' value="Calculated price :-" readonly>
			<input id='price' class='money' type="text" value="$0" readonly><br>
			<input class='btn' type="submit" value="Order Now!">
		</form>
	</div>
</body>
</html>

<?php
}
?>
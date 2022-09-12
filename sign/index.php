<!-- php + html combined logic with smooth redirect -->
<!-- also used it so that user doesn't get redirected to ?signup=true instead
the content gets overwritten via javascript [ makes redirection much smoother ]
 -->
<?php
// if signup!
if(isset($_REQUEST['signup']))
{ ?>
	<div class="form" id='form'>
		<div class='image'></div>
		<form>
			<br>
			<u><h2>Prakash Library</h2></u>
			<br>
			<input id='name' class='input' type="text" placeholder="Your Full Name" required>
			<br><br>
			<input type="email" id='email' class='input' placeholder="Your email address" required>
			<br><br>
			<input id='passw' type="password" class='input' placeholder="Your Password" required>
			<br><br>
			<input type="text" class='lb' value="Date of birth: " readonly>
			<input class='input' id='date' mindays="34675" maxdays="-3650" type="date" pattern="" required><br><br>
			<input id='submit' type="submit" class='btn' value="Sign Up"><br><br>
			<a onclick='redir("?")' class='link'>Click here to login if you already have one.</a><br>
		</form>
		<script>load()</script>
	</div>
<?php
} else { ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PrLibrary | Login</title>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script>
		// used for redirecting smoothly
		redir = (a) => {
			$.get(a, (data)=>{
				$('#form').remove()
				$('body').append(data)
			})
			
		}
	</script>
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<script src="script.js"></script>
</head>
<body>
	<div class='form' id='form'>
		<div class='image'></div>
		<form>
			<br>
			<u><h2>Prakash Library</h2></u>
			<br>
			<br><br>
			<input type="email" id='email' class='input' placeholder="Your email address" required>
			<br><br>
			<input id='passw' type="password" class='input' placeholder="Your Password" required>
			<br><br><br><br>
			<input id='submit' type="submit" class='btn' value="Log In">
			<br><br><br>
			<a onclick='redir("?signup=true")' class='link'>Click here to signup if you don't have account.</a>
		</form>
		<script>load()</script>
	</div>
</body>
</html>
<?php
}
?>
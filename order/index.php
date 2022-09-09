<?php
include '../backend/order.php';

if(isset($_REQUEST['price_query']))
{
	$p = getPrice($_REQUEST['price_query']);
	if($p){
		echo $p;
	} else {
		header('location: ?');
	}
} else {

function getBooks()
{
	// array to option element aka listing
	$element = getBookList();
	foreach ($element as $elem) {
		$rt .= "<option value='".$elem["value"]."'>".$elem["text"]."</option>";
	}
	echo $rt;
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prakash Library</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script defer>
		function httpGetAsync(theUrl, callback)
		{
	    	var xmlHttp = new XMLHttpRequest();
    		xmlHttp.onreadystatechange = function() { 
	        	if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            		callback(xmlHttp.responseText);
	    	}
	    	xmlHttp.open("GET", theUrl, true); // true for asynchronous 
	    	xmlHttp.send(null);
		}

		function o_change()
		{
			var b = document.getElementById('s1');
			bookVal = b.options[b.selectedIndex].value;
			httpGetAsync('?price_query='+bookVal, (a)=>{
				document.getElementById('price').value = "$" + a
			})
		}

		function s_focus()
		{
			document.getElementById('n1').remove();
			var b = document.getElementById('s1');
			bookVal = b.options[b.selectedIndex].value;
			httpGetAsync('?price_query='+bookVal, (a)=>{
				document.getElementById('price').value = "$" + a
			})
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
			
			<select id='s1' onfocus="s_focus()" onchange="o_change()">
				<option id='n1' value="none">Select a book</option>
				<?php getBooks(); ?>
			</select><br>

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
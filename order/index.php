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
} else if(isset($_REQUEST['order_book'])) {
	echo $_GET['order_book'] . ' is successfully ordered.';
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
	<link rel="stylesheet" type="text/css" href="../assets/style.css">
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<script src="script.js" defer></script>
</head>
<body>
	<div class='form'>
		<div class='image'></div>
		<form>
			<br>
			<u><h2>Prakash Library</h2></u>
			<br>
			<input id='name' class='input' placeholder="Your Full Name" required>
			<br><br>
			
			<select required id='select'>
				<option>Select a book</option>
				<?php getBooks(); ?>
			</select><br>

			<input class='lb' value="Date of delivery [must be within 30 days] :-" readonly>
			<input class='input' id='date' type="date" pattern="" required><br><br><br>
			
			<input class='lb' value="Calculated price :-" readonly>
			<input id='price' class='money' type="text" value="$0" readonly><br>
			<input id='submit' type="submit" class='btn' value="Order Now!">
		</form>
	</div>
</body>
</html>

<?php
}
?>
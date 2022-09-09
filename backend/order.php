<?php

function getPrice($bookname)
{
	$priceList = array("munamadan" => "50", "infinity" => "100");
	return $priceList[$bookname];
}



function getBookList()
{
	return array(
		array("text"=>"Muna Madan - Laxmi Prasad Devkota", "value"=>"munamadan"),
		array("text"=>"The World of infinity - Prakash Niroula", "value"=>"infinity")
	);
}

?>
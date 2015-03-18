<?php
echo $cFunctionDB->gen_json();

$strSQL = "SELECT * FROM categories";

$objQuery = $cDB->execute($strSQL);
while ( $objResult = $cDB->fetch_array($objQuery) ) {
	$json_data [] = array (
			"category_id" => $objResult ['category_id'],
			"category_image" => $objResult ['category_image'],
			"category_name" => $objResult ['category_name'],
			"thai_category_name" => $objResult ['thai_category_name']
	);
}

$json = json_encode ( array( Categories => $json_data) );
echo $json;

?>
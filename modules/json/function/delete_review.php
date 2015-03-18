<?php
echo $cFunctionDB->gen_json();

$strSQL = "DELETE FROM review
			WHERE review_id = '".$cRoute->Get('item2')."'";

$objQuery = $cDB->execute($strSQL);
if ( $objQuery ) {
	$json_data = "Delete review success.";
}else{
	$json_data = "Can't delete review, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
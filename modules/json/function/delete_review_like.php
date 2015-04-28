<?php
echo $cFunctionDB->gen_json();
if(!empty($_POST['review_id']) && !empty($_POST['user_id'])){
	$strSQL = "DELETE FROM review_like
				WHERE review_id = ".$_POST['review_id']." AND user_id = '".$_POST['user_id']."'";
	
	$objQuery = $cDB->execute($strSQL);
}
if ( $objQuery ) {
	$json_data = "Delete review_like success.";
}else{
	$json_data = "Can't delete review_like, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
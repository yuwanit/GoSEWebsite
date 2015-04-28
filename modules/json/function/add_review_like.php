<?php

echo $cFunctionDB->gen_json();
if(!empty($_POST['review_id']) && !empty($_POST['user_id'])){
	$strSQL = "INSERT INTO review_like(
					user_id,
					review_id
				)VALUES(
					'".$_POST['user_id']."',
					'".$_POST['review_id']."'
				)";
	
	$objQuery = $cDB->execute($strSQL);
}
if ( $objQuery ) {
	$json_data = "Post review_like success.";
}else{
	$json_data = "Can't post review_like, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
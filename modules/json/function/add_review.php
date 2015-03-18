<?php

echo $cFunctionDB->gen_json();
if(!empty($_POST['government_id']) && !empty($_POST['user_id']) 
		&& !empty($_POST['review']) && !empty($_POST['create_date'])){
	$strSQL = "INSERT INTO review(
					government_id,
					user_id,
					review,
					create_date
				)VALUES(
					'".$_POST['government_id']."',
					'".$_POST['user_id']."',
					'".$_POST['review']."',
					'".$_POST['create_date']."'
				)";
	
	$objQuery = $cDB->execute($strSQL);
}
if ( $objQuery ) {
	$json_data = "Post review success.";
}else{
	$json_data = "Can't post review, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
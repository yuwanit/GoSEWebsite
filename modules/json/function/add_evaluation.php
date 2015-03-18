<?php

echo $cFunctionDB->gen_json();
if(!empty($_POST['government_id']) && !empty($_POST['user_id']) && !empty($_POST['evaluation'])){
	$strSQL = "INSERT INTO evaluation(
					government_id,
					user_id,
					evaluation
				)VALUES(
					'".$_POST['government_id']."',
					'".$_POST['user_id']."',
					'".$_POST['evaluation']."'
				)";
	
	$objQuery = $cDB->execute($strSQL);
}
if ( $objQuery ) {
	$json_data = "Evaluation success.";
}else{
	$json_data = "Can't receive evaluation, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
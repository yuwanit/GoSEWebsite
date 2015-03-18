<?php

echo $cFunctionDB->gen_json();

if(!empty($_POST['government_id']) && !empty($_POST['user_id']) && !empty($_POST['evaluation'])){
	$strSQL = "UPDATE evaluation SET 
					evaluation = '".$_POST['evaluation']."'
				WHERE government_id = ".$_POST['government_id']." AND user_id = '".$_POST['user_id']."'";
	
	$objQuery = $cDB->execute($strSQL);
}
if ( $objQuery ) {
	$json_data = "Update evaluation success.";
}else{
	$json_data = "Can't receive evaluation, Please try again later.";
}

$json = json_encode ( array( message => $json_data) );
echo $json;

?>
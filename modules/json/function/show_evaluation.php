<?php

echo $cFunctionDB->gen_json();

$strSQL = "SELECT DISTINCT *
				FROM evaluation
			WHERE government_id = '".$_POST['government_id']."' AND user_id = '".$_POST['user_id']."'";

$objQuery = $cDB->execute($strSQL);
while ( $objResult = $cDB->fetch_array($objQuery) ) {
	$json_data [] = array (
			"evaluation_id" => $objResult ['evaluation_id'],
			"government_id" => $objResult ['government_id'],
			"user_id" => $objResult ['user_id'],
			"evaluation" => $objResult ['evaluation']
	);
}

$json = json_encode ( array( Evaluation => $json_data) );
echo $json;

?>
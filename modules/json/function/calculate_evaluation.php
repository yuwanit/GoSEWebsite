<?php

echo $cFunctionDB->gen_json();

$strSQL = "SELECT COUNT(evaluation_id) AS total_people, SUM( evaluation ) AS sum_evaluation
				FROM evaluation
			WHERE government_id = ".$_POST['government_id']."";

$objQuery = $cDB->execute($strSQL);
while ( $objResult = $cDB->fetch_array($objQuery) ) {
	
	$Sum_evaluation = $objResult ['sum_evaluation'];
	if($Sum_evaluation == null){
		$Sum_evaluation = "0";
	}
	
	$json_data [] = array (
			"total_people" => $objResult ['total_people'],
			"sum_evaluation" => $Sum_evaluation,
	);
}

$json = json_encode ( array( Evaluation => $json_data) );
echo $json;

?>
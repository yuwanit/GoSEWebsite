<?php
echo $cFunctionDB->gen_json();

$strSQL = "SELECT r.review_id, r.government_id, r.user_id, r.review, r.create_date, e.evaluation
				FROM review r LEFT JOIN evaluation e ON r.user_id = e.user_id
			WHERE r.government_id = '".$_POST['government_id']."' AND r.review_id > ".$_POST['max_review_id']."
			LIMIT ".$_POST['limit']."";

$objQuery = $cDB->execute($strSQL);
while ( $objResult = $cDB->fetch_array($objQuery) ) {
	$json_data [] = array (
			"review_id" => $objResult ['review_id'],
			"government_id" => $objResult ['government_id'],
			"user_id" => $objResult ['user_id'],
			"review" => $objResult ['review'],
			"create_date" => $objResult ['create_date'],
			"evaluation" => $objResult ['evaluation']
	);
}

$json = json_encode ( array( Review => $json_data) );
echo $json;

?>
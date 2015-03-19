<?php
echo $cFunctionDB->gen_json();

$strSQL = "SELECT DISTINCT *
				FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
					LEFT JOIN categories ca ON g.category_id = ca.category_id";
$objQuery = $cDB->execute($strSQL);
while ( $objResult = $cDB->fetch_array($objQuery) ) {
	$json_data [] = array (
			"government_id" => $objResult ['government_id'],
			"government_name" => $objResult ['name'],
			"location" => $objResult ['location'],
			"head_agency" => $objResult ['head_agency'],
			"offices_hours_start" => $objResult ['offices_hours_start'],
			"offices_hours_end" => $objResult ['offices_hours_end'],
			"tel" => $objResult ['tel'],
			"fax" => $objResult ['fax'],
			"keyword_search" => $objResult ['keyword_search'],
			"image" => $objResult ['image'],
			"latitude" => $objResult ['latitude'],
			"longitude" => $objResult ['longitude'],
			"category_name" => $objResult ['category_name'],
			"website" => $objResult ['website'],
			"thai_name" => $objResult ['thai_name'],
			"thai_location" => $objResult ['thai_location'],
			"thai_head_agency" => $objResult ['thai_head_agency']
			
	);
}
$json = json_encode ( array( GovernmentOffice => $json_data) );
echo $json;
?>
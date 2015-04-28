<?php
echo $cFunctionDB->gen_json();

if($_POST['category_id'] != 0){
	$strSQL = "SELECT *
					FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
						LEFT JOIN categories ca ON g.category_id = ca.category_id
				WHERE (keyword_search LIKE '%".$_POST['keyword_search']."%'
				OR g.name LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_name LIKE '%".$_POST['keyword_search']."%'
				OR g.location LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_location LIKE '%".$_POST['keyword_search']."%'
				OR g.head_agency LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_head_agency LIKE '%".$_POST['keyword_search']."%'
				OR g.tel LIKE '%".$_POST['keyword_search']."%'
				OR g.fax LIKE '%".$_POST['keyword_search']."%'
				OR ca.category_name LIKE '%".$_POST['keyword_search']."%'
				OR ca.thai_category_name LIKE '%".$_POST['keyword_search']."%')
				AND ca.category_id = '".$_POST['category_id']."'";
}else{
	$strSQL = "SELECT *
					FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
						LEFT JOIN categories ca ON g.category_id = ca.category_id
				WHERE keyword_search LIKE '%".$_POST['keyword_search']."%'
				OR g.name LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_name LIKE '%".$_POST['keyword_search']."%'
				OR g.location LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_location LIKE '%".$_POST['keyword_search']."%'
				OR g.head_agency LIKE '%".$_POST['keyword_search']."%'
				OR g.thai_head_agency LIKE '%".$_POST['keyword_search']."%'
				OR g.tel LIKE '%".$_POST['keyword_search']."%'
				OR g.fax LIKE '%".$_POST['keyword_search']."%'
				OR ca.category_name LIKE '%".$_POST['keyword_search']."%'
				OR ca.thai_category_name LIKE '%".$_POST['keyword_search']."%'";
}

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
			"latitude" => $objResult ['latitude'],
			"category_image" => $objResult ['category_image'],
			"thai_name" => $objResult ['thai_name'],
			"thai_category_name" => $objResult ['thai_category_name'],
			"thai_location" => $objResult ['thai_location'],
			"thai_head_agency" => $objResult ['thai_head_agency']
	);
}
$json = json_encode ( array( GovernmentOffice => $json_data) );
echo $json;
?>
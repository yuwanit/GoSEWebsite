<?php
if (empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = 'SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
								LEFT JOIN categories ca ON g.category_id = ca.category_id';
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (! empty ( $_POST ['txtGovernmentName'] ) && empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.name LIKE '%" . $_POST ['txtGovernmentName'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
} elseif (empty ( $_POST ['txtGovernmentName'] ) && ! empty ( $_POST ['txtHeadAgency'] ) && ! empty ( $_POST ['txtKeywordSearch'] ) && ! empty ( $_POST ['ddlCategory'] )) {
	$strSQL_government = "SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
									LEFT JOIN categories ca ON g.category_id = ca.category_id
							WHERE g.head_agency LIKE '%" . $_POST ['txtHeadAgency'] . "%'
									AND g.keyword_search LIKE '%" . $_POST ['txtKeywordSearch'] . "%'
									AND ca.category_id = '" . $_POST ['ddlCategory'] . "'";
}

$result_government = $cDB->execute ( $strSQL_government );
$numRows_government = $cDB->num_rows ( $result_government );

if ($result_government) {
	if ($numRows_government == 0) {
		$search_government .= '
						<tr>
							<td height="40" colspan="6" align="center">Not found' . $_POST ['ddlCategory'] . '</td>
						</tr>';
	} else {
		while ( $objResult_government = $cDB->fetch_array ( $result_government ) ) {
			$search_government .= '
							<tr>
								<td align="center"><a href="' . PATH . '/uploads/pic_government/' . $objResult_government ['image'] . '" title="' . $objResult_government ['name'] . '" rel="lightbox[home]"><img height="30px" src="' . PATH . '/uploads/pic_government/' . $objResult_government ['image'] . '"></a></td>
								<td align="center">' . $objResult_government ['name'] . '</td>
								<td align="center">' . $objResult_government ['category_name'] . '</td>
								<td align="center">' . $objResult_government ['head_agency'] . '</td>
								<td align="center">
									<center>
									<a id="linkMap" class="pointer" OnClick="linkMap(\'' . $objResult_government ['government_id'] . '\')">
										<img src="'.PATH.'/templates/templates1/images/maps.png" />
									</a>
									</center>
								</td>
								<td align="center">
									<a href="javascript:popup(\'
										<b>Government Name: </b>  ' . $objResult_government ['name'] . '
										<br/><br/>
										<b>Head Agency: </b> ' . $objResult_government ['head_agency'] . '
										<br/><br/>
										<b>Location: </b>' . $objResult_government ['location'] . '
										<br/><br/>
										<b>Offices hours start: </b> ' . $objResult_government ['offices_hours_start'] . '
										<br/><br/>
										<b>Offices hours end: </b>' . $objResult_government ['offices_hours_end'] . '
										<br/><br/>
										<b>Tel: </b>' . $objResult_government ['tel'] . '
										<br/><br/>
										<b>Fax: </b>' . $objResult_government ['fax'] . '
										<br/><br/>
										<b>Keyword Search: </b>' . $objResult_government ['keyword_search'] . '
										<br/><br/>
										<b>Latitude: </b>' . $objResult_government ['latitude'] . '
										<br/><br/>
										<b>Longitude: </b>' . $objResult_government ['longitude'] . '
										<br/><br/>
										<b>Category: </b>' . $objResult_government ['category_name'] . '
										<br/><br/>
									\')
									">
										<img src="' . PATH . '/templates/templates1/images/icon/view.png">
									</a>
								</td>
								<td align="center" width="5%">
									<a href="' . PATH . '/manage/edit_government/' . $objResult_government ['government_id'] . '.html">
										<img src="' . PATH . '/templates/templates1/images/icon/edit.png">
									</a>
								</td>
								<td align="center" width="5%">
									<div class="item" >
            							<div class="delete pointer" ><img OnClick="setGovernmentId(\'' . $objResult_government ['government_id'] . '\')" src="' . PATH . '/templates/templates1/images/icon/delete.png"/></div>
        							</div>
								</td>
							</tr>';
		}
	}
}

if (! empty ( $search_government )) {
	$tbSearch_government = '
				<table class="bordered">
				<tr>
					<th>Image</th>
					<th>Government name</th>
					<th>Category</th>
					<th>Head agency</th>
					<th>View map</th>
					<th colspan="3">Manage</th>
				</tr>
				' . $search_government . '
			</table>';
}

?>

<div><?php echo $tbSearch_government; ?></div>
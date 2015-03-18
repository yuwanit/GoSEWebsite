<?php

if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL_government = 'SELECT DISTINCT *
							FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
								LEFT JOIN categories ca ON g.category_id = ca.category_id';

$result_government = $cDB->execute ( $strSQL_government );
$numRows_government = $cDB->num_rows ( $result_government );

if ($result_government) {
	if ($numRows_government == 0) {
		$view_government .= '
					<tr>
						<td height="40" colspan="6" align="center">Not found</td>
					</tr>';
	} else {
		while ( $objResult_government = $cDB->fetch_array ( $result_government ) ) {
			
			$view_government .= '	
							<tr>
								<td align="center"><a href="'.PATH.'/uploads/pic_government/'.$objResult_government['image'].'" title="'. $objResult_government ['name'].'" rel="lightbox[home]"><img height="30px" src="'.PATH.'/uploads/pic_government/'.$objResult_government['image'].'"></a></td>
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
										<b>Government Name: </b>  '. $objResult_government ['name'].'
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
									<a href="'.PATH.'/manage/edit_government/' . $objResult_government ['government_id'] . '.html">
										<img src="' . PATH . '/templates/templates1/images/icon/edit.png">
									</a>
								</td>
								<td align="center" width="5%">
									<div class="item" >
            							<div class="delete pointer"><img OnClick="setGovernmentId(\'' . $objResult_government ['government_id'] . '\')" src="' . PATH . '/templates/templates1/images/icon/delete.png"/></div>
        							</div>
								</td>
							</tr>';
		}
	}
}

if (! empty ( $view_government )) {
	$tbView_government = '
			<table class="bordered">
				<tr>
					<th>Image</th>
					<th>Government name</th>
					<th>Category</th>
					<th>Head agency</th>
					<th>View map</th>
					<th colspan="3">Manage</th>
				</tr>
				' . $view_government . '
			</table>';
}

$_CONTENT = '		
<div id="templatemo_header">
    <div id="site_title">
		<a href="'.PATH.'/menu.html" rel="nofollow">GoSE</a>
		<a href="'.PATH.'/index/logout.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img height="30px" src="'.PATH.'/templates/templates1/images/icon/logout.png" /></a>
    </div>
</div>
<div id="templatemo_main">
	<div id="content"> 
		<div class="section_with_padding scrollbar">
			<h1>Manage government</h1>
			<div class="lage_left" >
				'.$tbView_government.'
			</div>	
			<div class="small_right" style="overflow-y: scroll; scrollbar-arrow-color:blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; scrollbar-darkshadow-color:#888888">
				<div class="new_menu">
					<center>
						<a href="'.PATH.'/manage/add_government.html">
							<img src="' . PATH . '/templates/templates1/images/add_government.png" alt="add government" />
							<br/>
							Add Government Office
						</a>
					</center>
			    </div>
			</div>
			<a href="'.PATH.'/menu.html" class="home_btn">home</a>
		</div>
	</div>
</div>';

$_SCP = '
<script>         		
	function linkMap(id){
		window.open("'.PATH.'/map/government_map/"+id+".html","_blank","location=yes,height=600,width=900,scrollbars=yes,status=yes") ;
	}
</script>';
?>
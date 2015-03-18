<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

if(!empty($_FILES['file']['name'])){
	
	$typefile = explode('.',$_FILES['file']['name']);
	$filename = $_POST['txtGovernmentName'].'.'.end($typefile);
	
	$strSQL_government = "UPDATE government_offices g
			SET g.name ='".$_POST['txtGovernmentName']."',
				g.location ='".$_POST['txtLocation']."',
				g.head_agency ='".$_POST['txtHeadAgency']."',
				g.offices_hours_start ='".$_POST['txtOffices_hours_start']."',
				g.offices_hours_end ='".$_POST['txtOffices_hours_end']."',
				g.tel ='".$_POST['txtTel']."',
				g.fax ='".$_POST['txtFax']."',
				g.keyword_search ='".$_POST['txtKeywordSearch']."',
				g.image = '".$filename."',
				g.category_id = '".$_POST['ddlCategory']."'
			WHERE g.government_id = '".$_POST['gmID']."'";
	
	if($_FILES['file']['tmp_name'] != "")
	{		
		chmod("uploads/pic_government", 0777);
		
		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/pic_government/".$filename);
	}
}else{
		$strSQL_government = "UPDATE government_offices g
			SET g.name ='".$_POST['txtGovernmentName']."',
				g.location ='".$_POST['txtLocation']."',
				g.head_agency ='".$_POST['txtHeadAgency']."',
				g.offices_hours_start ='".$_POST['txtOffices_hours_start']."',
				g.offices_hours_end ='".$_POST['txtOffices_hours_end']."',
				g.tel ='".$_POST['txtTel']."',
				g.fax ='".$_POST['txtFax']."',
				g.keyword_search ='".$_POST['txtKeywordSearch']."',
				g.category_id = '".$_POST['ddlCategory']."'
			WHERE g.government_id = '".$_POST['gmID']."'";
}

$objQuery_government = $cDB->execute($strSQL_government);

$strSQL_coordinates = "UPDATE coordinates c
			SET c.latitude = '".$_POST['txtLatitude']."',
				c.longitude ='".$_POST['txtLongitude']."'
			WHERE c.coordinates_id = '".$_POST['coordinates_id']."'";

$objQuery_coordinates = $cDB->execute($strSQL_coordinates);

if($objQuery_government&&$objQuery_coordinates)
{
	$_SCP = '<script> 
				alert("UPDATE SUCCESS");
				window.location.assign("'.PATH.'/menu/manage_government.html");
			</script>';
}
else
{
	$_SCP = '<script>
				alert("UPDATE UNSUCCESS !!!");
				window.location.assign("'.PATH.'/menumanage_government.html");
			</script>';
}

?>
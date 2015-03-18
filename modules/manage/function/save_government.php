<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$typefile = explode('.',$_FILES['file']['name']);
$filename = $_POST['txtGovernmentName'].'.'.end($typefile);

$strSQL_max = "SELECT MAX(coordinates.coordinates_id) as maxID FROM coordinates";

$objQuery_max = $cDB->execute($strSQL_max);

$objResult_max = $cDB->fetch_array($objQuery_max);

$coordinates_id = $objResult_max['maxID']+1;

$strSQL_government = "INSERT INTO government_offices(
							name, 
							location, 
							head_agency, 
							offices_hours_start, 
							offices_hours_end, 
							tel, 
							fax, 
							keyword_search, 
							image, 
							category_id, 
							coordinates_id)
						VALUES(
							'".$_POST['txtGovernmentName']."',
							'".$_POST['txtLocation']."',
							'".$_POST['txtHeadAgency']."',
							'".$_POST['txtOffices_hours_start']."',
							'".$_POST['txtOffices_hours_end']."',
							'".$_POST['txtTel']."',
							'".$_POST['txtFax']."',
							'".$_POST['txtKeywordSearch']."', 
							'".$filename."',
							'".$_POST['ddlCategory']."',
							'".$coordinates_id."')";

$objQuery_government = $cDB->execute($strSQL_government);

$strSQL_coordinates = "INSERT INTO coordinates(
							coordinates_id, 
							latitude, 
							longitude)
						VALUES(
							'".$coordinates_id."', 
							'".$_POST['txtLatitude']."',
							'".$_POST['txtLongitude']."')";

$objQuery_coordinates = $cDB->execute($strSQL_coordinates);

if($_FILES['file']['tmp_name'] != "")

{
	chmod("uploads/pic_government", 0777);

	move_uploaded_file($_FILES['file']['tmp_name'],"uploads/pic_government/".$filename);
}


if($objQuery_government&&$objQuery_coordinates)
{
	$_SCP = '<script> alert("INSERT SUCCESS");
				window.location.assign("'.PATH.'/menu/manage_government.html");
			</script>';
}

else
{
	$_SCP = '<script> 
				alert("INSERT UNSUCCESS !!!"); 
				window.location.assign("'.PATH.'/menu/manage_government.html");
			</script>';
}

?>


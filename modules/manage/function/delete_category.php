<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL_government = "SELECT g.category_id FROM government_offices g
							WHERE g.category_id = '".$cRoute->Get('item2')."'";
$result_government = $cDB->execute($strSQL_government);
$numRows_government = $cDB->num_rows($result_government);

if($numRows_government == 0){
	$strSQL_categories = "SELECT c.category_image
					FROM categories c
					WHERE c.category_id = '".$cRoute->Get('item2')."'";
	$result_categories = $cDB->execute($strSQL_categories);
	$objResult_categories = $cDB->fetch_array($result_categories);
	
	chown("uploads/pic_categories", 666);
	
	$deleteFile = unlink('uploads/pic_categories/'.$objResult_categories['category_image'].'');
	echo $deleteFile;
	
	$strSQL = "DELETE FROM categories WHERE category_id ='".$cRoute->Get('item2')."'";

	$objQuery = $cDB->execute($strSQL);
	
	if($objQuery&&$deleteFile)
	{
		$_SCP = '<script> alert("DELETE SUCCESS");
					window.location.assign("'.PATH.'/menu/manage_category.html");
				</script>';
	}
	else
	{
		$_SCP = '<script>
					alert("DELETE UNSUCCESS !!! ");
					window.location.assign("'.PATH.'/menu/manage_category.html");
				</script>';
	}
}else{
	$_SCP = '<script>
				alert("Can not delete this category \nbecause it use in government_offices table");
				window.location.assign("'.PATH.'/menu/manage_category.html");
			</script>';
}
?>

<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

if(!empty($_FILES['file']['name'])){
	
	$typefile = explode('.',$_FILES['file']['name']);
	$filename = $_POST['catID'].'.'.end($typefile);
	
	$strSQL = "UPDATE categories c
			SET c.category_name ='".$_POST['txtCategoryName']."',
				c.definition ='".$_POST['txtDefinition']."',
				c.category_image = '".$filename."'
			WHERE c.category_id = '".$_POST['catID']."'";
	
	if($_FILES['file']['tmp_name'] != "")
	{		
		chmod("uploads/pic_categories", 0777);
		
		move_uploaded_file($_FILES['file']['tmp_name'],"uploads/pic_categories/".$filename);
	}
}else{
		$strSQL = "UPDATE categories c
			SET c.category_name ='".$_POST['txtCategoryName']."',
				c.definition ='".$_POST['txtDefinition']."'
			WHERE c.category_id = '".$_POST['catID']."'";
}

$objQuery = $cDB->execute($strSQL);

if($objQuery)
{
	$_SCP = '<script> alert("UPDATE SUCCESS");
				window.location.assign("'.PATH.'/menu/manage_category.html");
			</script>';
}

else
{
	$_SCP = '<script>
				alert("UPDATE UNSUCCESS !!!");
				window.location.assign("'.PATH.'/menu/manage_category.html");
			</script>';
}

?>
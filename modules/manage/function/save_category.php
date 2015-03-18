<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$typefile = explode('.',$_FILES['file']['name']);
$filename = $_POST['txtCategoryName'].'.'.end($typefile);

$strSQL = "INSERT INTO categories(
							definition, 
							category_image,
							category_name)
						VALUES(
							'".$_POST['txtDefinition']."',
							'".$filename."',
							'".$_POST['txtCategoryName']."')";

$objQuery = $cDB->execute($strSQL);

if($_FILES['file']['tmp_name'] != "")

{
	chmod("uploads/pic_categories", 0777);

	move_uploaded_file($_FILES['file']['tmp_name'],"uploads/pic_categories/".$filename);
}


if($objQuery)
{
	$_SCP = '<script> alert("INSERT SUCCESS");
				window.location.assign("'.PATH.'/menu/manage_category.html");
			</script>';
}

else
{
	$_SCP = '<script> 
				alert("INSERT UNSUCCESS !!!"); 
				window.location.assign("'.PATH.'/menu/manage_category.html");
			</script>';
}

?>


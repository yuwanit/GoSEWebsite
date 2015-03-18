<?php
if(empty($_POST['txtCategoryName'])){
	$strSQL_category = 'SELECT DISTINCT * FROM categories';
}elseif (!empty($_POST['txtCategoryName'])){
	$strSQL_category = "SELECT DISTINCT * FROM categories c
							WHERE c.category_name LIKE '%".$_POST['txtCategoryName']."%'";
}

if(!empty($strSQL_category)){

	$result_category = $cDB->execute($strSQL_category);
	$numRows_category = $cDB->num_rows($result_category);

	if($result_category){
		if($numRows_category==0)
		{
			$search.='
					<tr>
						<td height="40" colspan="5" align="center">Not found</td>
					</tr>';
		}
		else
		{
			while($objResult_category = $cDB->fetch_array($result_category))
			{
				$search.= '
							<tr>
								<td align="center"><a href="'.PATH.'/uploads/pic_categories/'.$objResult_category['category_image'].'" title="'.$objResult_category['category_name'].'" rel="lightbox[home]"><img height="30px" src="'.PATH.'/uploads/pic_categories/'.$objResult_category['category_image'].'"></a></td>
								<td align="center">'.$objResult_category['category_name'].'</td>
								<td align="center">
									<a href="javascript:popup(\'
										<b>Category Name: </b>  '. $objResult_category['category_name'].'
										<br/><br/>
										<b>Definition: </b> ' . $objResult_category['definition'] . '
										<br/><br/>
									\')
									">
										<img src="' . PATH . '/templates/templates1/images/icon/view.png">
									</a>
								</td>
								<td align="center">
									<a  href="'.PATH.'/manage/edit_category/'.$objResult_category['category_id'].'.html">
										<img src="'.PATH.'/templates/templates1/images/icon/edit.png">
									</a>
								</td>
								<td align="center">
									<div class="item" >
            							<div class="delete pointer" ><img OnClick="setGovernmentId(\'' . $objResult_category ['category_id'] . '\')" src="' . PATH . '/templates/templates1/images/icon/delete.png"/></div>
        							</div>
								</td>
							</tr>';
			}
		}
	}
}

if(!empty($search)){
	$tbSearchCategory = '
			<table class="bordered">
				<tr>
					<th>Image</th>
					<th>Category name</th>
					<th colspan="3">Manage</th>
				</tr>
				'.$search.'
			</table>';
}
?>

<div><?php echo $tbSearchCategory; ?></div>
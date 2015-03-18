<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL_categories = 'SELECT DISTINCT * FROM categories';

$result_categories = $cDB->execute ( $strSQL_categories );
$numRows_categories = $cDB->num_rows ( $result_categories );

if ($result_categories) {
	if ($numRows_categories == 0) {
		$view_category .= '
					<tr>
						<td height="40" colspan="5" align="center">Not found</td>
					</tr>';
	} else {
		while ( $objResult_categories = $cDB->fetch_array ( $result_categories ) ) {
			$view_category.= '
							<tr>
								<td align="center"><a href="'.PATH.'/uploads/pic_categories/'.$objResult_categories['category_image'].'" title="'.$objResult_categories['category_name'].'" rel="lightbox[home]"><img height="30px" src="'.PATH.'/uploads/pic_categories/'.$objResult_categories['category_image'].'"></a></td>
								<td align="center">'.$objResult_categories['category_name'].'</td>
								<td align="center">
									<a href="javascript:popup(\'
										<b>Category Name: </b>  '. $objResult_categories['category_name'].'
										<br/><br/>
										<b>Definition: </b> ' . $objResult_categories['definition'] . '
										<br/><br/>
									\')
									">
										<img src="' . PATH . '/templates/templates1/images/icon/view.png">
									</a>
								</td>
								<td align="center">
									<a  href="'.PATH.'/manage/edit_category/'.$objResult_categories['category_id'].'.html">
										<img src="'.PATH.'/templates/templates1/images/icon/edit.png">
									</a>
								</td>
								<td align="center">
									<div class="item" >
            							<div class="delete pointer"><img OnClick="setCategoryId(\'' . $objResult_categories['category_id'] . '\')" src="' . PATH . '/templates/templates1/images/icon/delete.png"/></div>
        							</div>
								</td>
							</tr>';
		}
	}
}

if (! empty ( $view_category )) {
	$tbView_category = '
			<table class="bordered">
				<tr>
					<th>Image</th>
					<th>Category name</th>
					<th colspan="3">Manage</th>
				</tr>
				'.$view_category.'
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
			<h1>Manage category</h1>
			<div class="lage_left">
				'.$tbView_category.'
			</div>	
			<div class="small_right">
				<div class="new_menu">
					<center>
						<a href="'.PATH.'/manage/add_category.html">
							<img src="' . PATH . '/templates/templates1/images/add_government.png" alt="add category" />
							<br/>
							Add Category
						</a>
					</center>
			    </div>
			</div>
			<a href="'.PATH.'/menu.html" class="home_btn">home</a>
		</div>
	</div>
</div>';
?>
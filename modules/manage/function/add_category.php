<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL = "SELECT * FROM categories";

$result = $cDB->execute($strSQL);
$html_category = '';
while($objResult = $cDB->fetch_array($result))
{
	$html_category.= '<option value="'.$objResult['category_id'].'">'.$objResult['category_name'].'</option>';
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
		<form method="post" action="'.PATH.'/manage/save_category.html" id="form_add_category"
			name="form_add_category" enctype="multipart/form-data" onSubmit="return  Checkbc()">
			<div class="section_with_padding">
				<h1>Add Category</h1>
				<div class="half left">
					<div id="contact_form">
						<div>
							<div class="clear">
								<label>Category Name: <span class="req">*</span></label>
								<input name="txtCategoryName" type="text" 
									class="input_field field text" data-validetta="required" /> 
				
								<label>Definition:</label>
								<textarea name="txtDefinition"></textarea>
		
								<label>Category image: <span class="req">*</span></label> 
								<input type="file" name="file" data-validetta="required"/>
								
								<label>&nbsp;</label>
								
								<input type="reset" class="submit_btn float_l" name="buttonReset"
									id="submit" value="Reset" /> <input type="submit"
									class="submit_btn float_l" name="buttonConfirm" id="submit"
									value="Submit" />
							</div>
						</div>
					</div>
					<a href="'.PATH.'/menu.html" class="home_btn">home</a>
				</div>
			</div>
		</form>
	</div>
</div>';

$_SCP = '
<script type="text/javascript">
	$(function() {
	    $("#form_add_category").validetta({
		customReg : {
			regname : {
				method : /^[\+][0-9]+?$|^[0-9]+?$/,
				errorMessage : "Custom Reg Error Message !"
			},
            // you can add more
			example : { 
				method : /^[\+][0-9]+?$|^[0-9]+?$/,
				errorMessage : "Lan mal !"
			}
		},
        realTime : true
		});
	});
		
	function Checkbc(){
		if(document.form_add_category.file.value==""){
			alert("Please select category image");
			document.form_add_category.file.focus();
			return false;
		}
	}
</script>';
?>
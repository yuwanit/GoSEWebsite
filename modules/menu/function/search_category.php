<?php

if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$_CONTENT = '
<div id="templatemo_header">
    <div id="site_title">
		<a href="'.PATH.'/menu.html" rel="nofollow">GoSE</a>
		<a href="'.PATH.'/index/logout.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img height="30px" src="'.PATH.'/templates/templates1/images/icon/logout.png" /></a>
    </div>
</div>
<div id="templatemo_main">
	<div id="content"> 
		<div class="section_with_padding scrollbar" id="search_category">
			<h1>Search category</h1>
			<center>
				<label>Category Name:</label>
				<input name="txtCategoryName" id="txtCategoryName"
					type="text" class="required input_field" maxlength="30" />
		
				<input type="submit" class="submit_btn"
					name="btnSearchCategory" id="btnSearchCategory" value="Search" />
				<br/>
				<br/>
				<div id="contact_form">
					<div>
						<div id="view_search_category"></div>
					</div>
				</div>
			</center>
			<a href="'.PATH.'/menu.html" class="home_btn">home</a>
		</div>
	</div>
</div>';

$_SCP = '
<script language="JavaScript">
	$(function(){
	    $("#btnSearchCategory").click(function() {
			  var data = $.ajax({
	          url: "'.PATH.'/manage/search_category.html",
	          type: "POST",
	          data: "txtCategoryName="+$("#txtCategoryName").val(),
	          async: false
			  }).responseText;
	          		$("#view_search_category").html(data)
		});    		
	});
</script>';
?>
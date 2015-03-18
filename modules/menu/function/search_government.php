<?php

if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL_ddlCategory = "SELECT * FROM categories";

$result_ddlCategory = $cDB->execute($strSQL_ddlCategory);
$html_ddlCategory = '';
while($objResult_ddlCategory = $cDB->fetch_array($result_ddlCategory))
{
	$html_ddlCategory.= '<option value="'.$objResult_ddlCategory['category_id'].'">'.$objResult_ddlCategory['category_name'].'</option>';
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
			<h1>Search government</h1>
			<div class="small_left">
				<div id="contact_form">
					<div>
						<label>Government Name:</label> 
						<input name="txtGovernmentName" id="txtGovernmentName"
							type="text" class="required input_field" />
					
						<label>Head Agency:</label>
						<input name="txtHeadAgency" id="txtHeadAgency"
							type="text" class="required input_field" />
						
						<label>Keyword Search:</label>
						<input name="txtKeywordSearch" id="txtKeywordSearch"
							type="text" class="required input_field" />
						
						<label>Category:</label> 
						<select name="ddlCategory" id="ddlCategory">
							<option value="" selected> - - Select Category - - </option>
							' . $html_ddlCategory . '
						</select>
						
						<br/><br/>
						<input type="button" class="submit_btn float_l"
							name="btnSearchGovernment" id="btnSearchGovernment" value="Search" />
						<br/><br/>
					</div>
				</div>
			</div>
		
			<div class="lage_right">
				<div id="contact_form">
					<div>
						<div id="view_search_government"></div>
					</div>
				</div>
			</div>
			<a href="'.PATH.'/menu.html" class="home_btn">home</a>
		</div>
	</div>
</div>';

$_SCP = '
<script language="JavaScript">
	$(function(){
		$("#btnSearchGovernment").click(function() {
			  var data = $.ajax({
	          url: "'.PATH.'/manage/search_government.html",
	          type: "POST",
	          data: "txtGovernmentName="+$("#txtGovernmentName").val()
	          		+"&txtHeadAgency="+$("#txtHeadAgency").val()
	          		+"&txtKeywordSearch="+$("#txtKeywordSearch").val()
	          		+"&ddlCategory="+$("#ddlCategory").val(),
	          async: false
			  }).responseText;
	          		$("#view_search_government").html(data)
		});          		
	});
	          		
	function linkMap(id){
		window.open("'.PATH.'/map/government_map/"+id+".html","_blank","location=yes,height=600,width=900,scrollbars=yes,status=yes") ;
	}
</script>';
?>

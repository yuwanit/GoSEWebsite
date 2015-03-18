<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

$strSQL_category = "SELECT * FROM categories";

$result_category = $cDB->execute($strSQL_category);
$html_category = '';

while($objResult_category = $cDB->fetch_array($result_category))
{
	$selected = "";
	$html_category.= '<option value="'.$objResult_category['category_id'].'" >'.$objResult_category['category_name'].'</option>';
}

$_CONTENT = '
<div id="templatemo_header">
    <div id="site_title">
		<a href="'.PATH.'/menu.html" rel="nofollow">GoSE</a>
		<a href="'.PATH.'/index/logout.html">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img style="position:absolute; right:0px; z-index:999;" src="'.PATH.'/templates/templates1/images/icon/logout.png" /></a>
    </div>
</div>
<div id="templatemo_main">
	<form method="post" action="'.PATH.'/manage/save_government.html" id="form_add_government"
		name="form_add_government" enctype="multipart/form-data" onSubmit="return  Checkbc()">
		<div class="section_with_padding">
			<h1>Add Government Office</h1>
			<div class="half left">
				<div id="contact_form">
					<div>
						<div class="left" >
							<label>Government Name: <span class="req">*</span></label>
							<input name="txtGovernmentName"
								type="text" data-validetta="required" class="input_field" />
						</div>
						<div class="right">
							<label>Head Agency: <span class="req">*</span></label> <input name="txtHeadAgency"
								type="text" class="input_field" data-validetta="required"/>
						</div>
						<div class="clear">
							<label for="message">Location: <span class="req">*</span></label>
								<textarea name="txtLocation" data-validetta="required"></textarea>
						</div>
						<div class="clear">
							<div id="datetimepicker1" class="input-append">
								<label>Offices hours start: <span class="req">*</span></label> 
								<input data-format="hh:mm:ss" name="txtOffices_hours_start" type="text"
									class="input_field" data-validetta="required" readonly/>
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							    </span>
							</div>
							<div id="datetimepicker2" class="input-append">
								<label>Offices hours end: <span class="req">*</span></label>
								<input data-format="hh:mm:ss" name="txtOffices_hours_end" type="text"
									class="input_field" data-validetta="required" readonly/>
								<span class="add-on">
									<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
							    </span>
							 </div>
						</div>
						<div class="left">
							<label>Tel: <span class="req">*</span></label> 
							<input name="txtTel" type="text" OnKeyPress="return checkNumber()"
								class="input_field" data-validetta="required,minLength[9],customReg[phone]" />
						</div>
						<div class="right">
							<label>Fax: </label> 
							<input name="txtFax" type="text" class="input_field" OnKeyPress="return checkNumber()"
								data-validetta="minLength[9],customReg[phone]"/>
						</div>
					</div>
				</div>
			</div>

			<div class="half right">
				<div id="contact_form">
					<div>
						<div class="clear">
							<label>Keyword Search: <span class="req">*</span></label>
							<textarea name="txtKeywordSearch" data-validetta="required"></textarea>
						</div>
						<div class="left">
							<label>Latitude: <span class="req">*</span></label> 
							<input name="txtLatitude" type="text" OnKeyPress="return checkNumberAndDot(this)"
								class="input_field" data-validetta="required" />
						</div>
						<div class="right">
							<label>Longitude: <span class="req">*</span></label> 
							<input name="txtLongitude" type="text" OnKeyPress="return checkNumberAndDot(this)"
								class="input_field" data-validetta="required"/>
							<a id="linkMap" class="pointer">
								<img src="'.PATH.'/templates/templates1/images/maps.png" />
							</a>
						</div>
						<div class="clear">
							<label>Category: <span class="req">*</span></label> 
							<select name="ddlCategory" data-validetta="required">
								<option value="" selected>
									- - - - - - - - Please Select Category - - - - - - - -
								</option> 
								' . $html_category . '
							</select>
							<br/>	
							<label>Government image: <span class="req">*</span></label>
							<input type="file" name="file"/>
						</div>
						<div class="left">
							<label>&nbsp;</label> <input type="reset"
								class="submit_btn float_l" name="buttonReset" id="submit"
								value="Reset" /> <input type="submit" class="submit_btn float_l"
								name="buttonConfirm" id="submit" value="Submit" />
						</div>
					</div>
				</div>
				<a href="'.PATH.'/menu.html" class="home_btn">home</a>
			</div>
		</div>
	</form>
</div>';

$_SCP = '
<link href="'.PATH.'/templates/templates1/css/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet" />
<link href="'.PATH.'/templates/templates1/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="'.PATH.'/templates/templates1/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="'.PATH.'/templates/templates1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(function() {
	    $("#datetimepicker1").datetimepicker({
	      pickDate: false
	    });
	
		$("#datetimepicker2").datetimepicker({
	      pickDate: false
	    });
		
		$("#linkMap").click(function() {
			if(document.form_add_government.txtLatitude.value=="" || document.form_add_government.txtLongitude.value==""){
				alert("Please enter Latitude and Longitude.");
			}else{	
		        window.open("'.PATH.'/map/"+document.form_add_government.txtLatitude.value+"/"+document.form_add_government.txtLongitude.value+".html","_blank","location=yes,height=600,width=900,scrollbars=yes,status=yes") ;
			}
		});

		$("#form_add_government").validetta({
		customReg : {
			numberAndDot : {
				method : /^[\+][0-9]+?$|^[0-9]+?$/,
				errorMessage : "Invalid input"
			},
            // you can add more
			phone : { 
				method : /^[\+][0-9]+?$|^[0-9]+?$/,
				errorMessage : "Invalid phone number"
			}
		},
        realTime : true
		});
	});
		
	function Checkbc(){
		if(document.form_add_government.file.value==""){
			alert("Please select government offices image");
			document.form_add_government.file.focus();
			return false;
		}
	}
</script>';
?>
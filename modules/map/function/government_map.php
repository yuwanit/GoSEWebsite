<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

if($cRoute->Get('item2')==""){
	$_SCP = '
		<script>	
			alert("Please select government office.");
			window.close();
		</script>';
}else{
	$strSQL_government = "SELECT DISTINCT *
				FROM (government_offices g LEFT JOIN coordinates co ON g.coordinates_id = co.coordinates_id)
					LEFT JOIN categories ca ON g.category_id = ca.category_id
				WHERE g.government_id = '".$cRoute->Get('item2')."'";
	$result_government = $cDB->execute($strSQL_government);
	$objResult_government = $cDB->fetch_array($result_government);
	
	$_CONTENT = '
	<div id="templatemo_header">
	    <div id="site_title">
			<a href="'.PATH.'/menu.html" rel="nofollow">GoSE</a>
	    </div>
	</div>
	<div id="templatemo_main">
		<div id="map-canvas"></div>
	</div>
	<div id="templatemo_footer_wrapper">
		<div id="templatemo_footer">
	    	<p>Copyright © 2014 PSU Design</p>
	    </div>
	</div>
	';
	
	$_SCP = '
		<style>
	      #map-canvas {
	        height: 100%;
	        margin: 0px;
	        padding: 0px
	      }
	    </style>
	    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	    <script>
			function initialize() {
			  var mapOptions = {
			    scaleControl: true,
			    center: new google.maps.LatLng('.$objResult_government['latitude'].', '.$objResult_government['longitude'].'),
			    zoom: 18
			  };
			
			  var map = new google.maps.Map(document.getElementById("map-canvas"),
			      mapOptions);
			
			  var marker = new google.maps.Marker({
			    map: map,
			    position: map.getCenter()
			  });
			  var infowindow = new google.maps.InfoWindow();
			  infowindow.setContent("<div style=\"display:block; width:300px; height:auto;\"><center><span style=\"font-size: 16px;\"><b>'.$objResult_government['name'].'</b></span><br/><br/><img height=\"100px\" src=\"'.PATH.'/uploads/pic_government/'.$objResult_government['image'].'\"/></center><br/><p><b>Head Agency:</b> '.$objResult_government['head_agency'].'</p><p><b>Location:</b> '.$objResult_government['location'].'</p><p><b>Offices hours:</b> '.$objResult_government['offices_hours_start'].' - '.$objResult_government['offices_hours_end'].'</p><p><b>Tel:</b> '.$objResult_government['tel'].'</p><p><b>Fax:</b> '.$objResult_government['fax'].'</p></div>");
			  google.maps.event.addListener(marker, "click", function() {
			      infowindow.open(map, marker);
			  });
			}
			
			google.maps.event.addDomListener(window, "load", initialize);
	
	    </script>';
}
?>

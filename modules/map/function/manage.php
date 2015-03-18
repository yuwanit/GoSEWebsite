<?php
if(empty($_SESSION['admin_id']))
{
	header('Location: '.PATH);
}

$_TEMFILE = 'main2';

if($cRoute->Get('item1')=="" || $cRoute->Get('item2')==""){
	$_SCP = '
		<script>	
			alert("Please enter Latitude and Longitude.");
			window.close();
		</script>';
}else{
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
			    center: new google.maps.LatLng('.$cRoute->Get('item1').', '.$cRoute->Get('item2').'),
			    zoom: 18
			  };
			
			  var map = new google.maps.Map(document.getElementById("map-canvas"),
			      mapOptions);
			
			  var marker = new google.maps.Marker({
			    map: map,
			    position: map.getCenter()
			  });
			  var infowindow = new google.maps.InfoWindow();
			  infowindow.setContent("<b>Latitude:</b> '.$cRoute->Get('item1').'<br/><b>Longitude:</b> '.$cRoute->Get('item2').'");
			  google.maps.event.addListener(marker, "click", function() {
			      infowindow.open(map, marker);
			  });
			}
			
			google.maps.event.addDomListener(window, "load", initialize);
	
	    </script>';
}
?>

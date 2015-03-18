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
       <div id="home" class="section">
           <div class="text_box box1">
           		<div class="box_content">
                	<span class="manage_government"></span>
                    <a href="'.PATH.'/menu/manage_government.html" class="menu_title">Manage Government</a>
                    <div class="h10"></div>
                    Add, edit and delete government office.
				</div>
           </div>
           <div class="photo_box">
           		<a href="'.PATH.'/templates/templates1/images/gallery/01-l.jpg" title="Logo GoSE" rel="lightbox[home]"><img src="'.PATH.'/templates/templates1/images/gallery/01.jpg" alt="Logo GoSE" /></a>
            </div>
         	<div class="text_box box2">
            	<div class="box_content">
                	<span class="manage_category"></span>
                    <a href="'.PATH.'/menu/manage_category.html" class="menu_title">Manage category</a>
                    <div class="h10"></div>
                    Search government offices from database and view, edit and delete information.
				</div>
           </div>
           <div class="photo_box">
            	<a href="'.PATH.'/templates/templates1/images/gallery/02-l.jpg" title="Police" rel="lightbox[home]"><img src="'.PATH.'/templates/templates1/images/gallery/02.jpg" alt="Police" /></a>
           </div>
			<div class="text_box box3 no_margin_right">
            	<div class="box_content">
                	<span class="search_government"></span>
                    <a href="'.PATH.'/menu/search_government.html" class="menu_title">Search Government</a>
                    <div class="h10"></div>
                    Search categories from database and view, edit and delete information.
				</div>
           </div>
			<div class="photo_box">
           		<a href="'.PATH.'/templates/templates1/images/gallery/03-l.jpg" title="Police Station" rel="lightbox[home]"><img src="'.PATH.'/templates/templates1/images/gallery/03.jpg" alt="Police Station" /></a>
           </div>
           <div class="text_box box4">
           		<div class="box_content">
                	<span class="search_category"></span>
                    <a href="'.PATH.'/menu/search_category.html" class="menu_title">Search Category</a>
                    <div class="h10"></div>
                    View all government office on the map.
				</div>
           </div>
           <div class="photo_box">
           		<a href="'.PATH.'/templates/templates1/images/gallery/04-l.jpg" title="School and school bus" rel="lightbox[home]"><img src="'.PATH.'/templates/templates1/images/gallery/04.jpg" alt="School and school bus" /></a>       
           </div>
           <div class="text_box box5">
           		<div class="box_content">
                	<span class="other"></span>
                    <a href="#other" class="menu_title">Other</a>
                    <div class="h10"></div>
                    View all government office on the map.
				</div>
           </div>
           <div class="photo_box no_margin_right">           		
                <a href="'.PATH.'/templates/templates1/images/gallery/05-l.jpg" title="Hopital" rel="lightbox[home]"><img src="'.PATH.'/templates/templates1/images/gallery/05.jpg" alt="Hopital" /></a>
           </div>               
        </div>
	</div>
</div>';
?>
<?php
$xtpl->assign("path",$_PATH);

$xtpl->assign("title",$_TITLE);
$xtpl->assign("content",$_CONTENT);   
$xtpl->assign("scp",$_SCP);

$xtpl->parse("main.Content"); 
?>
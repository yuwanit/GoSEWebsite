<?php
if($cRoute->Get('item1')!='' && intval($cRoute->Get('item1'))==0)
{
	$includePath = 'modules/'.$_module.'/function/'.$cRoute->Get('item1').'.php';       
	if(file_exists($includePath))
    {
        include($includePath);
    }
    else
    {
        echo $cHtmlPage->notFound();
        exit;
    }
}
else
{  
	include('modules/'.$_module.'/function/manage.php');
} 
?> 
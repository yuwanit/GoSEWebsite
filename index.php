<?php    
include 'common.php';
if($cRoute) 
{
	$_module = $cRoute->Get(0);
	if($_module=='') $_module = 'index';
   
    $modpath = 'modules/'.$_module.'/index.php'; 
    
    if(file_exists($modpath))
    {  
    	$levels = substr_count($_SERVER['QUERY_STRING'], '/');
		for ($i=0; $i < $levels ; $i++) 
		{ 
			$_folder .= '../'; 
		}     
		        
		$_PATH = $_folder.'templates/'.$_TEMPLATES.'/';	
		
		include($modpath);
    }
    else
    {
        echo $cHtmlPage->notFound();
    }        
}

if($_TEMFILE)
{
    $xtpl = new Xtemplate('templates/'.$_TEMPLATES.'/'.$_TEMFILE.'.html');       
    include 'include/block/content.php';    
    $xtpl->parse('main');
    $xtpl->out('main');    
}
else
{
    if(!$cRoute) echo $cHtmlPage->notAccess();
	$cDB->close();
}
?>
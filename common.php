<?php
include 'include/setting.php';
include 'include/define.php'; 

$_TEMPLATES = 'templates1';
$_TITLE = 'GoSE';

include 'config.inc.php';           

include 'include/system/db.class.php'; 
include 'include/system/routing.class.php';  
include 'include/system/xtemplate.class.php';

include 'include/class/datetimecore.class.php'; 
include 'include/class/functioncore.class.php'; 
include 'include/class/functiondb.class.php'; 
include 'include/class/htmlpage.class.php'; 

if(class_exists('DateTimeCore')) $cTimeSum = new DateTimeCore();
if(class_exists('DateTimeCore')) $cTimePK = new DateTimeCore();
if(class_exists('DateTimeCore')) $cTimeDB = new DateTimeCore();
if(class_exists('DateTimeCore')) $cTime = new DateTimeCore();
if(class_exists('FunctionCore')) $cFunction = new FunctionCore();
if(class_exists('FunctionDb')) $cFunctionDB = new FunctionDb();
if(class_exists('HtmlPage')) $cHtmlPage = new HtmlPage();
if(class_exists("db")) $cDB = new db();
if(class_exists('ModRewriter')) $cRoute = ModRewriter::Route('routes.ini'); 
?>
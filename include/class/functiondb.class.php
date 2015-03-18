<?php 
class FunctionDb
{
	private $cDB;
	private $cTime;
	
	public function __construct()
    {
    	$this->cDB = new db();
    	$this->cTime = new DateTimeCore();
    }
    
    public function gen_json()
    {
    	header ( "Content-type:application/json; charset=UTF-8" );
    	header ( "Cache-Control: no-store, no-cache, must-revalidate" );
    	header ( "Cache-Control: post-check=0, pre-check=0", false );
    	
    	// ส่วนติดต่อกับฐานข้อมูล
    	$this->cDB = new db();
    	$this->cTime = new DateTimeCore();
    }
}
?>
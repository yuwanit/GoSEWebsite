<?php
class DateTimeCore
{
	public function __construct()
	{	
	}
	
	public function getDateTimeNow()
	{
		return date('Y-m-d H:i:s');
	}
	
	public function convertDate($dateOld)
	{
		list($month,$date,$year) = explode('/', $dateOld);
		return $year.'-'.$month.'-'.$date;
	}
	
	public function convertDateDB($date)
	{
		list($year,$month,$date) = explode('-', $date);
		$year=$year+543;
		return $date.'-'.$month.'-'.$year;
	}
	
	public function convertDatePK($date)
	{
		list($year,$month,$date) = explode('-', $date);
		return $month.'/'.$date.'/'.$year;
	}
	public function sumDate($date)
	{
		list($year,$month,$date) = explode('-', $date);
		$year=$year+543;
		return $year.'-'.$month.'-'.$date;
	}
}
?>
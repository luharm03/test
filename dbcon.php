<?php
//Connection Page
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');

   mysql_connect( HOST, USERNAME, PASSWORD) or die("Could not connect");
   mysql_select_db ("Setup")or die('Cannot connect to the database because: ' . mysql_error());

//functions
function checkVar($var)
{
	$var = str_replace("\n", " ", $var);
	$var = str_replace(" ", "", $var);
	if(isset($var) && !empty($var) && $var != '')
	{
		return true;
	}
	else
	{
		return false;	
	}
}
function renQry($query)
{	$rows = mysql_query($query)or die("somthing is wrong");
	$results = mysql_num_rows($rows);
	if($results == 0)
	{
		return false;  
	}
	else
	{
	while($row=mysql_fetch_object($rows)) {
		$respose[]=$row ; } return $respose;
	}
}
?>

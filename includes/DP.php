<?php 

$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="";
$db['db_name']="cms";

foreach($db as $key => $value)
{
	 define($yo = strtoupper($key), $value , "");
	
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME );
//$connection = mysqli_connect('localhost','root','','loginapp');

if ($connection)
{
	echo "we are ON line";
}
else 
{
	echo "we are off line";
}

// $go['alpha']="a";
// $go['beta']="b";
// $go['charlie']="c";
// $go['delta']="d";
// $go['echo']="e";

// foreach($go as $key => $value)
// {
// 	$to = strtoupper($key);
// 	echo($to). "<br>";

// }

?>
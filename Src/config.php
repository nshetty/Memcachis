<?php
$server="localhost";
$user="root";
$password="namitha";
$database="web";

$link=mysql_connect($server,$user,$password);
if(!link)
{
die('ERROR Connection');
}
else
echo( '  ');
$link2=mysql_select_db($database);
echo ('');
if(!$link2)
{
die('ERROR Database');
}
else
echo (' ');
$link2=mysql_select_db($database);
echo ('');

mysql_close($link1);
?>


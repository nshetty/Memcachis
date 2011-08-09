<?php
$username="*******";
$password="*********";
$server="******";
$database="*****";

$link1=mysql_connect($server,$username,$password);
if(!$link1)
echo "connection Failed"." <br/>";
else
echo  "   ";
$link2=mysql_select_db($database);
if(!$link2)
echo "Database Failed "." <br/>";
else
echo "   ";

?>
~                                                                               
~                           

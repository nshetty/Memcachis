<?php
$server= "Servername";//name of Server
$user= "username ";//username given to PHPMyAdmin
$password="password";//password of PHPMyAdmin
$database="database";//name of database where opeartions are performed
//Establishing   connection 
$link=mysql_connect($server,$user,$password);
if(!link)
{
die('Connection Failure');
}
else
{
echo('Connection Success');
}
//Connecting to database
$link2=mysql_select_db($database);
if(!$link2)
{
echo('Database Not Found');
}
else
echo('Database Found');
{
//operations to to be performed in database
}
 mysql_close($link);
//Closing link 
?>

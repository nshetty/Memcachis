<?php
/*Code is first Part of project consisiting of tracking all visitors and unique visitors on daily,monthly,yearly basis ,visitor identification,page loading time */

/*Page loading time*/

$startime=microtime();
$stime=explode(" ",$startime);
$startime=$stime[0]+$stime[1];
include('config.php');

/*Client address*/

$addr=$_SERVER['REMOTE_ADDR'];

/*Host Name*/

$name= $_SERVER['HTTP_HOST'];
/*User language*/

$lang= $_SERVER['HTTP_ACCEPT_LANGUAGE'];

/*Mime types*/
$mime= $_SERVER['HTTP_ACCEPT'];

/*HTTP USER AGENT*/

$agent= $_SERVER['HTTP_USER_AGENT'];

 /*Cookie*/

if(isset($_COOKIE["user"]))
$cookie= "YES";
else
$cookie= "NO";

/*Date */

$date= date("m/d/y");
$hour =date("h");
$minute=date("i");
$month=date("m");
$year=date("Y");

/*Inserting data into database created in phpmyadmin*/

$sql=mysql_query("INSERT INTO visitor(addr,name,lang,mime,agent,cookie,hour,month,year)VALUES('$addr','$name','$lang','$mime','$agent','$cookie','$hour','$month','$year')");

/* Total Number of visitors */
$result=mysql_query("SELECT * FROM visitor");
    $count  =mysql_num_rows($result);
echo "Total number of visitors to site $count"."<br/>";

/* Total Number of unique visitors*/
$result1=mysql_query("SELECT  DISTINCT addr FROM visitor");
$count1=mysql_num_rows($result1);
echo "Number of unique visitors$count1"."<br/>";

/*Total Number of visitors today */

$result3=mysql_query("SELECT * FROM visitor WHERE DATE(date)=DATE(NOW())");
$count3=mysql_num_rows($result3);
echo "Total number of visitors right today $date is $count3"."<br/>";

/*Total Number of Unique visitors of today */
$result4 =mysql_query("SELECT DISTINCT addr FROM visitor where DATE(date)=DATE(NOW())");
$count4=mysql_num_rows($result4);
echo "Total number of visitors today $date is $count4"."</br>";

/* Number of visitors at this time */
$result5=mysql_query("SELECT * from visitor WHERE date=now()");
$count5=mysql_num_rows($count5);
echo "Total Number of users are $result"."</br>";

/* Number of visitors monthly basis */
$result6 =mysql_query("SELECT * FROM visitor WHERE $month= Month(Current_timestamp)");
$count6=mysql_num_rows($result6);
echo "Total number of this month is $count6"."</br>";

/* Number of unique visitor present month */
$result7=mysql_query("SELECT DISTINCT addr  FROM visitor WHERE $month=Month(Current_timestamp)");
$count7=mysql_num_rows($result7);
echo " Total number of unique visitors this month is $count7"."</br>";

/* Number of visitor in present year */
$result8=mysql_query("SELECT * FROM visitor WHERE $year=Year(Current_timestamp)");
$count8 =mysql_num_rows($result8);
echo "Total number of visitors in present year are $count8 "."</br>";

/*Number of unique visitors in present year */
$result9=mysql_query("SELECT DISTINCT addr FROM visitor WHERE $year=Year(Current_timestamp)");
$count9=mysql_num_rows($result9);
echo " Total number of unique visitors this Year is $count9"."</br>";

/*Page Loading Time*/
$endtime=microtime();
$etime=explode(" ",$endtime);
$endtime=$etime[0]+$etime[1];
$total =$endtime-$startime;
$total =round($total,5);
echo " page load time is $total in seconds";
?>


-- INSERT --                                                                                                                                          15,1          Top


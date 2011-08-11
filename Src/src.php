<html>
<?php
/* 1.This code should be inserted in web page to collect stats about the web page */
/* 2.Code is run in Apache web browser - http://localhost/Src/src.php */
/* 3.Code should be connected to PHPMyadmin to store and fetch data */
/* 4. Code gives all sorts of information about number of visitors,unique visitors,Browser,IP,O.S,language,MIME,Cookie,HTTP User Agents on daily,monthly and yearly basis and data is collected and represented in form table and bargraph */

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

/*Inserting data into database*/

$sql=mysql_query("INSERT INTO visitor(addr,name,lang,mime,agent,cookie,hour,month,year)VALUES('$addr','$name','$lang','$mime','$agent','$cookie','$hour','$month','$year')");

/* Total Number of visitors */
$result=mysql_query("SELECT * FROM visitor");
$count  =mysql_num_rows($result);

/* Total Number of unique visitors*/
$result1=mysql_query("SELECT  DISTINCT addr FROM visitor");
$count1=mysql_num_rows($result1);

/*Total Number of visitors today */
$result3=mysql_query("SELECT * FROM visitor WHERE DATE(date)=DATE(NOW())");
$count3=mysql_num_rows($result3);

/*Total Number of Unique visitors of today */
$result4 =mysql_query("SELECT DISTINCT addr FROM visitor where DATE(date)=DATE(NOW())");
$count4=mysql_num_rows($result4);

/* Number of visitors at this time */
$result5=mysql_query("SELECT DISTINCT addr FROM visitor WHERE $month=Month(Current_timestamp)");
$count5=mysql_num_rows($result5);

/* Number of visitor in present year */
$result8=mysql_query("SELECT * FROM visitor WHERE $year=Year(Current_timestamp)");
$count8=mysql_num_rows($result8);

/*Number of unique visitors in present year */
$result9=mysql_query("SELECT DISTINCT addr FROM visitor WHERE $year=Year(Current_timestamp)");
$count9=mysql_num_rows($result9);

/*Total  Number of visitors monthly basis */
$result6 =mysql_query("SELECT * FROM visitor WHERE $month= Month(Current_timestamp)");
/*Statics Of Web page*/
echo "<h4> Web Statatics </h4>";
echo "<table width = '800' border='2' bordercolor='#3B3131'bgcolor='#EBDDE2'>";
echo "<tr>";
echo "<th align='left'>1.Total number of visitors to site</th><td>$count"."<td><tr>";
echo "<th align='left'>2.Total number of unique visitors to site</th> <td>$count1"."<td><tr>";
echo "<th align='left'>3.Total number of visitors today $date are</th><td>$count3"."<td><tr>";
echo "<th align='left'>4.Total number of unique visitors today $date are</th><td>$count4"."<td><tr>";
echo "<th align='left'>5.Total number of visitors for present month $month are</th><td>$count6"."<td><tr>";
echo "<th align='left'>6.Total Number of unique visitors for present month $month are</th><td>$count5"."<td><tr>";
echo "<th align='left'>7.Total number of visitors in present year $year are</th><td>$count8 "."<td><tr>";
echo "<th align='left'>8.Total number of unique visitors in present Year $year is</th> <td>$count9"."<td><tr>";
echo  "</tr></table>";

/*Number  of visitors every month of the present  year*/

/*Jan*/
$result70=mysql_query("SELECT * FROM  visitor WHERE month LIKE '1'AND $year=Year(Current_timestamp)");
$jan=mysql_num_rows($result70);

/*Feb*/
$result71=mysql_query("SELECT * FROM visitor WHERE month LIKE '2'AND $year=Year(Current_timestamp)");
$feb=mysql_num_rows($result71);

/*Mar*/
$result72=mysql_query("SELECT * FROM visitor WHERE month LIKE '3'AND $year=Year(Current_timestamp)");
$mar=mysql_num_rows($result72);

/*April*/
$result73=mysql_query("SELECT * FROM visitor WHERE month LIKE '4'AND $year=Year(Current_timestamp)");
$apr=mysql_num_rows($result73);

/*May*/
$result74=mysql_query("SELECT * FROM visitor WHERE month LIKE '5'AND $year=Year(Current_timestamp)");
$may=mysql_num_rows($result74);

/*June*/ 
$result75=mysql_query("SELECT * FROM visitor WHERE month LIKE '6'AND $year=Year(Current_timestamp)");
$jun=mysql_num_rows($result75);

/*July*/

$result76=mysql_query("SELECT * FROM visitor WHERE month LIKE '7'AND $year=Year(Current_timestamp)");
$jul=mysql_num_rows($result76);

/*August */

$result77=mysql_query("SELECT * FROM visitor WHERE month LIKE '8'AND $year=Year(Current_timestamp)");
$aug=mysql_num_rows($result77);

/*September */
$result78=mysql_query("SELECT * FROM visitor WHERE month LIKE '9'AND $year=Year(Current_timestamp)");
$sep=mysql_num_rows($result78);

/*October*/
$result79=mysql_query("SELECT * FROM visitor WHERE month LIKE '10'AND $year=Year(Current_timestamp)");
$oct=mysql_num_rows($result79);

/*November*/
$result711=mysql_query("SELECT * FROM visitor WHERE month LIKE '11'AND $year=Year(Current_timestamp)");
$nov=mysql_num_rows($result711);

/*December*/
$result712=mysql_query("SELECT * FROM visitor WHERE month LIKE '12'AND $year=Year(Current_timestamp)");
$dec=mysql_num_rows($result712);

/* Calling graph from gr1.php*/
echo "<h4>Number Of Visitors Per Month For Year $year:</h4>";
echo "<img src = 'gr1.php?'>";
echo "<br><br>";

/*Month Table */
echo "<h4> Number Of Visitors Per Month For Year $year:</h4>";
echo "<table width='250' border='3'bordercolor='#3B3131'cellpadding='1' bgcolor='#EBDDE2'>" ;
echo "<tr><td><th>Month</th><th>Visitor</th></td></tr>";
echo "<tr><td><th>January</th><th>$jan</th></td></tr>";
echo "<tr><td><th>February</th><th>$feb</th></td></tr>";
echo "<tr><td><th>March</th><th>$mar</th></td></tr>";
echo "<tr><td><th>April</th><th>$apr</th></td></tr>";
echo "<tr><td><th>May</th><th>$may</th></td></tr>";
echo "<tr><td><th>June</th><th>$jun</th></td></tr>";
echo "<tr><td><th>July</th><th>$jul</th></td></tr>";
echo "<tr><td><th>August</th><th>$aug</th></td></tr>";
echo "<tr><td><th>September</th><th>$sep</th></td></tr>";
echo "<tr><td><th>October</th><th>$oct</th></td></tr>";
echo "<tr><td><th>November</th><th>$nov</th></td></tr>";
echo "<tr><td><th>December</th><th>$dec</th></td></tr>";
echo "</table> ";

/*Search */
echo "<h3><a href=search1.php><strong> SEARCH:</strong></a></h3>";
echo " Search visitor details like Ip Address,HostName,Browser Type,O.S,Language Used,Mime types,HTTP User Agents,Cookie presence,Date,Hour,Month.Year"."<br/>";

/*page loading time*/
$endtime= microtime();
$etime=explode(" ",$endtime);
$endtime=$etime[0]+$etime[1];
$total =$endtime-$startime;
$total =round($total,5);
echo "<h4> Page load time is $total</h4>";

mysql_close(link);
?>

</html>

                                                                                                                                        
                                                        
                                                                                                                                        


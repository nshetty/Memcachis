<?php
 /* Code to count all visitors and unique visitors to a site on daily,monthly,yearly basis .
   Gives visitor details like IP address,browser,MIME types,O.S,Hostname,User language,Cookies .
   Provides Page Loading time.
   Represents Yearly anlysis of all months in bargrapph
*/

/* Code has to be inserted in a webpage to give analysis of webpage */
/* PHPMyadmin is used as backend hence project should be connected to it to display results*/ 

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

$minute=date("i");
 $month=date("m");
 $year=date("Y");

 /*Inserting data into database*/

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
 echo ("Total Number of users are $result");

 /* Number of visitors monthly basis */
 $result6 =mysql_query("SELECT * FROM visitor WHERE $month= Month(Current_timestamp)");
 $count6=mysql_num_rows($result6);

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

 /* Total Number of visitors every month  */
 $result10 =mysql_query("SELECT * FROM visitor WHERE date LIKE '%JANUARY 2011%'");
 $Jan=mysql_num_rows($result10);

 $result11 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%FEBRUARY 2011'");
 $Feb=mysql_num_rows($result11);

 $result12 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%MARCH 2011'");
 $Mar=mysql_num_rows($result12);

 $result13 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%APRIL 2011'");
 $Apr=mysql_num_rows($result13);

 $result14 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%MAY 2011'");
 $May=mysql_num_rows($result14);

 $result15 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%JUNE 2011'");
 $Jun=mysql_num_rows($result15);

 $result16 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%JULY 2011'");
 $Jul=mysql_num_rows($result16);

 $result17 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%AUGUST 2011'");
 $Aug=mysql_num_rows($result17);

 $result18 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%SEPTEMBER 2011'");
 $Sep=mysql_num_rows($result18);

 $result19 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%OCTOBER 2011'");
 $Oct=mysql_num_rows($result19);

 $result20 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%NOVEMBER 2011'");
 $Nov=mysql_num_rows($result20);

 $result211 =mysql_query("SELECT * FROM visitor WHRER date LIKE '%DECEMBER 2011'");
 $Dec=mysql_num_rows($result211);


          /* bargraph */


/* creat monthly span slot*/

   $values['Jan'] = $count21;
   $values['Feb'] = $count22;
   $values['Mar'] = $count23;
   $values['Apr'] = $count24;
   $values['May'] = $count25;
   $values['Jun'] = $count26;
   $values['Jul'] = $count27;
   $values['Aug'] = $count28;
   $values['Sep'] = $count29;
   $values['Oct'] = $count30;
   $values['Nov'] = $count31;
   $values['Dec'] = $count32;
                                                                                                                                                                        
  $width=450;                                                                                                                                                             $height=300;
  $margins=20;

        /* size of graph */
   $graph_width=$width - $margins * 2;
   $graph_height=$height - $margins * 2;
   $img=imagecreate($width,$height);

    /* bar width and total number of bars */
   $b_width=20;
   $total_bars=count($values);
   $gap= ($graph_width- $total_bars * $b_width ) / ($total_bars +1);


      /* Colors */
   $b_color=imagecolorallocate($img,0,64,128);
   $bck_color=imagecolorallocate($img,240,240,255);
   $border_color=imagecolorallocate($img,200,200,200);
   $line_color=imagecolorallocate($img,220,220,220);

        /*bar margins*/

   imagefilledrectangle($img,1,1,$width-2,$height-2,$border_color);
   imagefilledrectangle($img,$margins,$margins,$width-1-$margins,$height-1-         $margins,$bck_color);

         /* scaling */

   $max_value=max($values);
   $ratio= $graph_height/$max_value;

  /* Creating Bar */
  for($i=0;$i< $total_bars; $i++){
  list($key,$value)=each($values);
  $x1= $margins + $gap + $i * ($gap+$b_width) ;
  $x2= $x1 + $b_width;
  $y1=$margins +$graph_height- intval($value * $ratio) ;
  $y2=$height-$margins;
  imagestring($img,0,$x1+3,$y1-10,$value,$b_color);
  imagestring($img,0,$x1+3,$height-15,$key,$b_color);
  imagefilledrectangle($img,$x1,$y1,$x2,$y2,$b_color);
        }

 header("Content-type:image/png");
 imagepng($img);

 /*page loading time*/
 $endtime= microtime();
 $etime=explode(" ",$endtime);
 $endtime=$etime[0]+$etime[1];
 $total =$endtime-$startime;
 $total =round($total,5);
 echo " page load time is $total";



?>
                             

"src.php"                                                                                                                       

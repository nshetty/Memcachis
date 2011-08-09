<?php
/* Code to draw a  graph */

/*connecting to database */
$server="*****";
$user="*******";
$password="*******";
$database="******";

$link=mysql_connect($server,$user,$password);


$link2=mysql_select_db($database);

 $year=date("Y");

 /* Total Number of visitors every month */
 $result10 =mysql_query("SELECT * FROM visitor WHERE month LIKE '1' AND $year=Year(Current_timestamp) ");
 $jan=mysql_num_rows($result10);

 $result11 =mysql_query("SELECT * FROM visitor WHERE month LIKE '2' AND $year=Year(Current_timestamp)");
 $feb=mysql_num_rows($result11);

 $result12 =mysql_query("SELECT * FROM visitor WHERE month LIKE '3' AND $year=Year(Current_timestamp)");
 $mar=mysql_num_rows($result12);

 $result13 =mysql_query("SELECT * FROM visitor WHERE month LIKE '4' AND $year=Year(Current_timestamp)");
 $apr=mysql_num_rows($result13);

 $result14 =mysql_query("SELECT * FROM visitor WHERE month LIKE '5' AND $year=Year(Current_timestamp)");
 $may=mysql_num_rows($result14);

 $result15 =mysql_query("SELECT * FROM visitor WHERE month LIKE '6' AND $year=Year(Current_timestamp)");
 $jun=mysql_num_rows($result15);

 $result16 =mysql_query("SELECT * FROM visitor WHERE month LIKE '7' AND $year=Year(Current_timestamp)");
 $jul=mysql_num_rows($result16);
 $result17 =mysql_query("SELECT * FROM visitor WHERE month LIKE '8' AND $year=Year(Current_timestamp)");
 $aug=mysql_num_rows($result17);

 $result18 =mysql_query("SELECT * FROM visitor WHERE month LIKE '9' AND $year=Year(Current_timestamp)");
 $sep=mysql_num_rows($result18);

 $result19 =mysql_query("SELECT * FROM visitor WHERE month LIKE '10' AND $year=Year(Current_timestamp)");
 $oct=mysql_num_rows($result19);

 $result20 =mysql_query("SELECT * FROM visitor WHERE month LIKE '11' AND $year=Year(Current_timestamp)");
 $nov=mysql_num_rows($result20);

 $result21 =mysql_query("SELECT * FROM visitor WHERE month LIKE '12' AND $year=Year(Current_timestamp)");
 $dec=mysql_num_rows($result21);

/*passing values */

  $values['Jan'] = $jan;
  $values['Feb'] = $feb;
  $values['Mar'] = $mar;
  $values['Apr'] = $apr;
  $values['May'] = $may;
  $values['Jun'] = $jun;
  $values['Jul'] = $jul;
  $values['Aug'] = $aug;
  $values['Sep'] = $sep;
  $values['Oct'] = $oct;
  $values['Nov'] = $nov;
  $values['Dec'] = $dec;

/*graph height,width*/

  $img_width=450;
  $img_height=300;
  $margins=20;
/* size of graph */
 $graph_width=$img_width - $margins * 2;
 $graph_height=$img_height - $margins * 2;
 $img=imagecreate($img_width,$img_height);
 $bar_width=20;
 $total_bars=count($values);
 $gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);


 /* Colors of graph*/
 $bar_color=imagecolorallocate($img,0,64,128);
 $background_color=imagecolorallocate($img,240,240,255);
 $border_color=imagecolorallocate($img,200,200,200);
 $line_color=imagecolorallocate($img,220,220,220);

/* border around the graph */

 imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
 imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);


/* scaling graph */
 $max_value=max($values);
 $ratio= $graph_height/$max_value;

/*   Draw the bars */
  for($i=0;$i< $total_bars; $i++){

/*  key and value the current pointer position*/
 list($key,$value)=each($values);
 $x1= $margins + $gap + $i * ($gap+$bar_width) ;
 $x2= $x1 + $bar_width;
 $y1=$margins +$graph_height- intval($value * $ratio) ;
 $y2=$img_height-$margins;
 imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);
 imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);
 imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
        }
 header("Content-type:image/png");
 imagepng($img);
?>


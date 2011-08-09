<html>

<body bgcolor= grey>
<h2> Search Results </h2>
</body>
</html>
<?php
include ('config.php');

/*Search */
$search=$_POST['search'];
$result=mysql_query("select * from  visitor where addr like '%$search%'|| name like '%$search%'|| lang like '%$search%' ||  mime like '%$search%' || agent like '%$search%'|| cookie like '%$search%'|| date like '%$search%'|| hour like '%$search%' || month like '%$search%' ||year like '%$search%' ");
while ($r=mysql_fetch_array($result))
{
echo 'ID:'.$r['id'];
echo '<br/>Address:'.$r['addr'];
echo '<br/>Name:' .$r['name'];
echo '<br/>Language:'.$r['lang'];
echo '<br/>Mime:'.$r['mime'];
echo '<br/>Agent:'.$r['agent'];
echo '<br/>Cookie:'.$r['cookie'];
echo '<br/>Date:'.$r['date'];
echo '<br/>hour:'.$r['hour'];
echo '<br/>Month:'.$r['month'];
echo '<br/>Year:'.$r['year'];
echo '<br/><br/>';
}

?>
</html>
~                                                                                                                                                                       
~                   

<?php

$file = fopen($_POST["images"], "rb");
$image = fread($file, filesize('switch.jpg'));
$image = base64_encode($img);
$ins_query="INSERT INTO mytable (id,imag) "."VALUES ('','$img')";
mysql_query($ins_query)or die('Error in query !');
$id1=1;
echo "inserted ";
 $query="select imag from mytable where id='$id1'";
     $result=mysql_query($query) or die("Error: ".mysql_error());
     $row=mysql_fetch_array($result);
     echo '<img src="data:image/jpeg;base64',base64_encode($row['imag']).'"/>';
fclose($file);
?>

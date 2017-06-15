  <?php


  	$select =  $_POST["num"];
  	$id =  $_POST["id"];

  	//echo $select.'<br>'.$id.'<br>';

	mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
	mysql_select_db("s1031519");

	$sql = "select `wet` from product where `productID` = ".$id.";";
	//echo $sql;
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	//echo $row[0];

	if($row[0] > 2)
	{
	  	if($select == 1)
	  	{
	  		$value = $row[0] - 1;
	  	}
	  	else if ($select == 3)
	  	{
	  		$value = $row[0] + 1;
	  	}
	  	$sql = "update product set `wet` = ".$value." where `productID`='".$id."';";
	  	//echo $sql;
	  	//echo $result;
	  	$result = mysql_query($sql);
	  	echo "<script type='text/javascript'>alert('成功！')</script>";
    	echo "<script type='text/javascript'>window.location.href='Review.php'</script>";

	}

  ?>

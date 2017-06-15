<?php 
	//get productName, type
	$name =  $_POST["productName"];
	$type =  $_POST["theType"];
  $value =  $_POST["value"];

	if($type == 1)
		$t = "f";
	else if ($type == 2)
		$t = "c";
	else if ($type == 3)
		$t = "e";
	else if ($type == 4)
		$t = "l";

//	echo $name.'<br>';
//	echo $t.'<br>';
  //$n = 1;
  //get add time
  date_default_timezone_set("Asia/Taipei");
  $time=time();
  $time=date("Y-m-d H:m:s",$time);

  #get photo url
  include('Net/SSH2.php');

  $ssh = new Net_SSH2('172.20.10.4');

  if (!$ssh->login('pi', 'penny8411')) {
      exit('Login Failed');
  }

  $result = $ssh->exec('python3 addProduct.py');
  $url = chop($result);

    mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
    mysql_select_db("s1031519");
      
    $sql = "select * from product;";
    $result=mysql_query($sql);
    $id =  mysql_num_rows($result) +1;

    $sql = "insert into product values(".$id.",'".$name."','".$t."','".$url."','".$time."','".$value."');";
    //echo $sql;
    $result=mysql_query($sql);
    //echo $result;

    echo "<script type='text/javascript'>alert('".$url."！')</script>";
      echo "<script type='text/javascript'>window.location.href='cosmetic.php'</script>";
?>

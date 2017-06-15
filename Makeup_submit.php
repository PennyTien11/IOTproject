<?php 
  //get data
  $fID =  $_POST["foundID"];
  $conID = $_POST["conID"];
  $eyeID =  $_POST["eyeID"];
  $lipID =  $_POST["lipsID"];

  $Tag1 = $_POST["Tag1"];
  $Tag2 = $_POST["Tag2"];
  $Tag3 = $_POST["Tag3"];
  $memo = $_POST["memo"];
  // echo $fID."<br>";
  // echo $conID."<br>";
  // echo $eyeID."<br>";
  // echo $lipID."<br>";
  // echo $Tag1."<br>";
  // echo $Tag2."<br>";
  // echo $Tag3."<br>";
  // echo $memo."<br>";

  //get add time
  date_default_timezone_set("Asia/Taipei");
  $time=time();
  $time=date("Y-m-d H:m:s",$time);

  //take finished photo
  include('Net/SSH2.php');

$ssh = new Net_SSH2('172.20.10.4');

  if (!$ssh->login('pi', 'penny8411')) {
      exit('Login Failed');
  }

  $url = $ssh->exec('python3 upload_finished.py');
  $url = chop($url);
  //echo $url.'<br>'; //the picture id

  mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
  mysql_select_db("s1031519");

  $sql = "select * from img where `url` like '".$url."';";
  //echo $sql;
  $result = mysql_query($sql);
  while($row = mysql_fetch_array($result))
      $id = $row['id'];
  //echo $id;

  $sql = "insert into review values(".$id.",'".$fID."','".$conID."','".$eyeID."','".$lipID."','".$Tag1."','".$Tag2."','".$Tag3."','".$memo."','".$time."');";
 // echo $sql;
  $result = mysql_query($sql);

  echo "<script type='text/javascript'>alert('".$url."')</script>";
  echo "<script type='text/javascript'>window.location.href='Makeup.php'</script>";


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Makeup</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMakeup.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script src="js/main.js" type="text/javascript"></script>
</script>
  </head>
  <body>

    <div>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="upcol">
        <div class="container">
          <div class="navbar-header">
            <a href="main.php" class="navbar-brand">Hello Hayley!</a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="cosmetic.php" data-scroll-nav="0">Cosmetic</a>
              </li>
              <li><a href="Review.php" data-scroll-nav="1">Review</a>
              </li>
              <li><a href="Makeup.php" data-scroll-nav="2">Makeup</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="topic" role="button" aria-expanded="false">Account<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="index.html">Log out</a></li>
                  <li><a href="#">QA</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    <div>
    <img src="img/slide3.jpg" id="bgp"></img>

    <section ng-app>
      <h2 style='float: left; color:#778899; font-family: Microsoft JhengHei;'>你今天要去哪裡呢:</h2>
<!--       <form action="Makeup_Start.php" method="post" accept-charset="utf-8"> <-->   
        <div class="dropdown">
            <select  class="form-control" id="selector" ng-model="selection" >
            <!-- <option value = "0"></option> -->
             <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `humidity`";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {
                $name = $row['location'];
                $id = $row['location'];
                echo "<option value ='".$id."'>".$name."</option>";
              }
              ?>
            </select>
      </div>


      <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `humidity`";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {

                $id = $row['location'];
                $location = $row['location'];
                $huValue = $row['huvalue'];
                $temperH = $row['temperH'];
                $temperL = $row['temperL'];
                //echo $location.'<br>';

                echo "<div class='item'><article ng-show=\"selection == '".$id."'\"><div><h3 style='position:relative; left:18%; color:#008b8b;'>".$location."</h3>";
                echo "<div class='table-responsive'><table class='table '><tr><td >濕度</td><td>正午體感溫度</td><td >晚間九點體感溫度</td></tr><tr><td>".$huValue."</td><td >".$temperH."</td><td >".$temperL."</td></tr></table></div>";
                echo "<p>推薦的底妝產品：</p>";
                  $i = 0;
                  if($huValue>85)
                  {
                    $i++;
                    $productSql = "select * from `product` where `type` = 'f' and `wet` < 4 ";
                    $productResult=mysql_query($productSql);
                    while($lines = mysql_fetch_array($productResult))
                    {
                      $name = $lines['name'];
                      $data = $lines['date'];
                      $url = $lines['url'];
                      //echo $url;
                      if($url == 'null')
                        $url = '#';
                      else
                        $url = "https://docs.google.com/uc?id=".$url;

                      echo "<div class='pics' style='float: left; margin:10px;'><img src='".$url."' width='150' height='150'></img><div id='title'><p style='font-size:15px;'>".$name."</div></div>";
                        if ($i == 3)
                          break;
                        $i++;
                      }     
                      echo "</div></article></div>";
                  }
                  else if ($huValue > 70 && $huValue < 86)
                  {

                    $productSql = "select * from `product` where `type` = 'f' and  `wet` > 3 and `wet` < 7";
                    $productResult=mysql_query($productSql);
                    while($lines = mysql_fetch_array($productResult))
                    {
                      $i++;
                      $name = $lines['name'];
                      $data = $lines['date'];
                      $url = $lines['url'];
                     // echo $url;
                      if($url == 'null')
                        $url = '#';
                      else
                        $url = "https://docs.google.com/uc?id=".$url;

                      echo "<div class='pics' style='float: left; margin:10px;'><img src='".$url."' width='150' height='150'></img><div id='title'><p style='font-size:15px;'>".$name."</div></div>";
                        if ($i == 3)
                          break;
                    }     
                      echo "</div></article></div>";
                  }
                  else if ($huValue < 71)
                  {

                    $productSql = "select * from `product` where `type` = 'f' and  `wet` > 6";
                    $productResult=mysql_query($productSql);
                    while($lines = mysql_fetch_array($productResult))
                    {
                      $i++;
                      $name = $lines['name'];
                      $data = $lines['date'];
                      $url = $lines['url'];
                     // echo $url;
                      if($url == 'null')
                        $url = '#';
                      else
                        $url = "https://docs.google.com/uc?id=".$url;

                      echo "<div class='pics' style='float: left; margin:10px;'><img src='".$url."' width='150' height='150'></img><div id='title'><p style='font-size:15px;'>".$name."</div></div>";
                        if ($i == 3)
                          break;
                    }     
                      echo "</div></article></div>";
                  }
                  else 
                    break;     
                }
          
      ?>
      <button type='submit' class='btn btn-danger' data-toggle='modal' data-target='#myModal' id='start'>化妝</button>
      <div class="container" id="content" style="height:800px;">
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
                    <h4 class="modal-title" >登錄你今天的妝容吧</h4>
                  </div>
                  <div class="modal-body">     <!-- display node select table -->

                    <form action="Makeup_submit.php" method="post" accept-charset="utf-8" id="target">
                        <div class="form-group" id="select">
                          <label style="margin-left: 10px;">底妝</label>
                          <select class="form-control" name="foundID" id="selected">
                            <option value = "0"></option>
                           <?php
                            mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
                            mysql_select_db("s1031519");
                            
                            $sql = "select * from `product` where `type` like 'f';";
                            $result=mysql_query($sql);

                            $i = 0;
                            while($row = mysql_fetch_array($result))
                            {
                              $name = $row['name'];
                              $id = $row['productID'];
                              echo "<option value ='".$id."'>".$name."</option>";
                            }
                            ?>
                          </select>
                        </div>                        
                        <div class="form-group" id="select">
                          <label style="margin-left: 10px;">修容</label>
                            <select class="form-control" name="conID" id="selected">
                            <option value = "0"></option>
                           <?php
                            mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
                            mysql_select_db("s1031519");
                            
                            $sql = "select * from `product` where `type` like 'c';";
                            $result=mysql_query($sql);

                            $i = 0;
                            while($row = mysql_fetch_array($result))
                            {
                              $name = $row['name'];
                              $id = $row['productID'];
                              echo "<option value ='".$id."'>".$name."</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label style="margin-left: 10px;">眼部</label>
                            <select class="form-control" name="eyeID" id="selected">
                            <option value = "0"></option>
                           <?php
                            mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
                            mysql_select_db("s1031519");
                            
                            $sql = "select * from `product` where `type` like 'e';";
                            $result=mysql_query($sql);

                            $i = 0;
                            while($row = mysql_fetch_array($result))
                            {
                              $name = $row['name'];
                              $id = $row['productID'];
                              echo "<option value ='".$id."'>".$name."</option>";
                            }
                            ?>
                          </select>
                        </div>
                          <div class="form-group">
                          <label style="margin-left: 10px;">唇部</label>
                          <select class="form-control" name="lipsID" id="selected">
                          <option value = "0"></option>
                           <?php
                            mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
                            mysql_select_db("s1031519");
                            
                            $sql = "select * from `product` where `type` like 'l';";
                            $result=mysql_query($sql);

                            $i = 0;
                            while($row = mysql_fetch_array($result))
                            {
                              $name = $row['name'];
                              $id = $row['productID'];
                              echo "<option value ='".$id."'>".$name."</option>";
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group" style="margin-left: 10px;">
                          <label>Tag</label>
                          <input type ="text" name="Tag1" class="form-control" id="pname" >
                        </div>
                       <br>
                        <div class="form-group">
                          <label style="margin-left: 10px;">Memo</label>
                          <textarea type ="text" name="memo" class="form-control" id="pname" value="" style="width: 34em; margin-left: 10px; resize: none;"></textarea>
                        </div>
                         <div class="form-group">
                          <p><button type="submit" form="target" class="btn btn-link" style='bottom: 10px;'>拍照並送出</button></p>
                        </div>
                      </form>
                      
                  


                  </div>
              
              </div>
          </div>
        </div>
      </div>

    </section>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>


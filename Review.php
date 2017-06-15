<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Review</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleReview.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script type="text/javascript" scr="js/main.js"></script>
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
    <img src="img/temp3.png" id="bgp"></img>
    <section ng-app>

      <div class="dropdown">
        <h3 style='font-family:Microsoft JhengHei;'>排列方式</h3>
            <select  class="form-control" id="selector" ng-model="selection" style='width:120px;'>
            <option value = "content0">依照日期遞增</option>
            <option value = "content1">依照日期遞減</option>
            </select>
      </div>
      <!-- <button type="submit" id="add" class="btn btn-info" data-toggle="modal" data-target="#myModal">增加化妝品</button> -->


      <div class="item">
        <article ng-show="selection == 'content0'">
            <div>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select R.*, I.`url` from `review` as R inner join `img` as I where I.`id` = R.`id` ORDER BY `date` DESC;";
              $result=mysql_query($sql);

              while($row = mysql_fetch_array($result))
              {
                $theid = $row['id'];
                $foundation = $fID = $row['foundation'];
                $countour = $row['contour'];
                $eyes = $row['eyes'];
                $lips = $row['lips'];
                $tag = $row['tag1'];
                $memo = $row['memo'];
                $date = $row['date'];
                $url = $row['url'];
                $date = substr($date, 0, 10);
                $sql = "select R.*, I.`url` from `review` as R inner join `img` as I where I.`id` = R.`id` ORDER BY `date` DESC;";

                if($foundation != 0)
                {
                  $sql = "select * from product where `productID` = ".$foundation.";";
                  $lines = mysql_query($sql);
                  $row = mysql_fetch_array($lines);
                  $foundation = $row['name'];
                }
                else
                  $foundation = null;

                if($countour != 0)
                  {
                    $sql = "select * from product where `productID` = ".$countour.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $countour = $row['name'];
                  }
                else
                  $countour = null;

                if($eyes != 0)
                  {
                    $sql = "select * from product where `productID` = ".$eyes.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $eyes = $row['name'];
                  }
                else
                  $eyes= null;

                if($lips != 0)
                  {
                    $sql = "select * from product where `productID` = ".$lips.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $lips = $row['name'];
                  }
                else
                  $lips = null;

                $url = "https://docs.google.com/uc?id=".$url;
                echo "<div class='pics'><button style='padding:1px;' class='btn btn-link' type='submit' data-toggle = 'modal' data-target='#".$theid."'><img src='".$url."' width='200' height='200'></img></button><div id='title'><p>".$date."</div></div>";

                echo "<div class='container' id='content';>";
                echo "<div id='".$theid."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='top:50px;'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content' style='background:#f0f8ff;'>";
                echo "<div class='modal-header' style='margin-left:20px;'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>".$date."</h4></div>";
                echo "<div class='modal-body' style='left:175px;'><img src='".$url."' width='200' height='200'></img><br><div class='infomation'>底妝：".$foundation."<br>修容：".$countour."<br>眼部：".$eyes."<br>唇部：".$lips."<br>Memo：".$memo."<br></div>";
                echo "<form action='feedback.php' method='post' accept-charset='utf-8' id='target'><div class='form-group'><label for='exampleSelect1'>今日底妝回饋：</label><select class='form-control' name='num' id='selector' style='display: inline;'>
                  <option value = '1'>太乾</option>
                  <option value = '2'>剛剛好！</option>
                  <option value = '3'>土石流</option></select><input style='display:none; ' name='id' value = '".$fID."'></input></div><button type='submit' form='target' class='btn btn-link' style='margin-left:30px;'  >Submit</button><button type='submit' form='target' class='btn btn-link' style='margin-left:0px;'  >Delete</button>
                  </form>";
                echo "</div></div></div></div>";
              }
              ?>
            </div>
        </article>
      </div>
      <div class="item">
        <article ng-show="selection == 'content1'">
            <div>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select R.*, I.`url` from `review` as R inner join `img` as I where I.`id` = R.`id` ORDER BY `date` ASC;";
              $result=mysql_query($sql);

             while($row = mysql_fetch_array($result))
              {
                $theid = $row['id']-10000;
                $foundation = $fID = $row['foundation'];
                $countour = $row['contour'];
                $eyes = $row['eyes'];
                $lips = $row['lips'];
                $tag = $row['tag1'];
                $memo = $row['memo'];
                $date = $row['date'];
                $url = $row['url'];
                $date = substr($date, 0, 10);
                $sql = "select R.*, I.`url` from `review` as R inner join `img` as I where I.`id` = R.`id` ORDER BY `date` DESC;";

                if($foundation != 0)
                {
                  $sql = "select * from product where `productID` = ".$foundation.";";
                  $lines = mysql_query($sql);
                  $row = mysql_fetch_array($lines);
                  $foundation = $row['name'];
                }
                else
                  $foundation = null;

                if($countour != 0)
                  {
                    $sql = "select * from product where `productID` = ".$countour.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $countour = $row['name'];
                  }
                else
                  $countour = null;

                if($eyes != 0)
                  {
                    $sql = "select * from product where `productID` = ".$eyes.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $eyes = $row['name'];
                  }
                else
                  $eyes= null;

                if($lips != 0)
                  {
                    $sql = "select * from product where `productID` = ".$lips.";";
                    $lines = mysql_query($sql);
                    $row = mysql_fetch_array($lines);
                    $lips = $row['name'];
                  }
                else
                  $lips = null;

                $url = "https://docs.google.com/uc?id=".$url;
                echo "<div class='pics'><button style='padding:1px;' class='btn btn-link' type='submit' data-toggle = 'modal' data-target='#".$theid."'><img src='".$url."' width='200' height='200'></img></button><div id='title'><p>".$date."</div></div>";

                echo "<div class='container' id='content';>";
                echo "<div id='".$theid."' class='modal fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='top:50px;'>";
                echo "<div class='modal-dialog'>";
                echo "<div class='modal-content' style='background:#f0f8ff;'>";
                echo "<div class='modal-header' style='margin-left:20px;'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 class='modal-title'>".$date."</h4></div>";
                echo "<div class='modal-body' style='left:175px;'><img src='".$url."' width='200' height='200'></img><br><div class='infomation'>底妝：".$foundation."<br>修容：".$countour."<br>眼部：".$eyes."<br>唇部：".$lips."<br>Memo：".$memo."<br></div>";
                echo "<form action='feedback.php' method='post' accept-charset='utf-8' id='target'><div class='form-group'><label for='exampleSelect1'>今日底妝回饋：</label><select class='form-control' name='num' id='selector' style='display: inline;'>
                  <option value = '1'>太乾</option>
                  <option value = '2'>剛剛好！</option>
                  <option value = '3'>土石流</option></select><input style='display:none; ' name='id' value = '".$fID."'></input></div><button type='submit' form='target' class='btn btn-link' style='margin-left:65px;'  >Submit</button>
                  </form>";
                echo "</div></div></div></div>";
              }
              ?>
            </div>
        </article>
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


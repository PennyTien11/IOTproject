<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Cosmetic</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleCosmetic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
    <script type="text/javascript" scr="js/main.js"></script>


    <style type="text/css">
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexhei.css);
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexfangsong.css);
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexkai.css);
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexming.css);
        @import url(http://fonts.googleapis.com/earlyaccess/cwtexyen.css);
    </style>

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
    </div>
    <img src="img/tools.jpg" id="bgp"></img>
    
    <section ng-app>
      <button type="submit" id="add" class="btn btn-info" data-toggle="modal" data-target="#myModal">增加化妝品</button>
      <div class="dropdown">
        顯示項目：
        <select  class="form-control" id="dropdownMenu1" ng-model="selection">
          <option value="content1">底妝</option>
          <option value="content2">修容</option>
          <option value="content3">眼部</option>
          <option value="content4">唇部</option>
        </select>
      </div>
     
      <!-- round I -->
      <div class="item">
        <article ng-show="selection == 'content1'">
            <div>
              <h3>底妝</h3>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `product` where `type` like 'f' ORDER BY `date` DESC;";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {
                $name = $row['name'];
                $data = $row['date'];
                $url = $row['url'];
                
                if($url == 'null')
                  $url = '#';
                else
                  $url = "https://docs.google.com/uc?id=".$url;
                echo "<div class='pics'><img src='".$url."' width='200' height='200'></img><div id='title' style='font-size:15px;'><p>".$name."</div></div>";
              }
              ?>
            </div>
        </article>
      </div>
      <div class="item">
        <article ng-show="selection == 'content2'">
          <div>
              <h3>修容</h3>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `product` where `type` like 'c'ORDER BY `date` DESC;";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {
                $name = $row['name'];
                $data = $row['date'];
                $url = $row['url'];
                $url = "https://docs.google.com/uc?id=".$url;
               echo "<div class='pics'><img src='".$url."' width='200' height='200'></img><div id='title' style='font-size:15px;'><p>".$name."</div></div>";
              }
              ?>
            </div>
        </article>
      </div>
      <div class="item">
        <article ng-show="selection == 'content3'">
          <div>
              <h3>眼部</h3>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `product` where `type` like 'e' ORDER BY `date` DESC;";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {
                $name = $row['name'];
                $data = $row['date'];
                $url = $row['url'];
                $url = "https://docs.google.com/uc?id=".$url;
                echo "<div class='pics'><img src='".$url."' width='200' height='200'></img><div id='title' style='font-size:15px;'><p>".$name."</div></div>";
              }
              ?>
            </div>
        </article>
      </div>
      <div class="item">
        <article ng-show="selection == 'content4'">
          <div>
              <h3>唇部</h3>
              <?php
              mysql_connect("140.138.150.147", "student", "student")or die('Error with MySQL connection');
              mysql_select_db("s1031519");
              
              $sql = "select * from `product` where `type` like 'l' ORDER BY `date` DESC;";
              $result=mysql_query($sql);

              $i = 0;
              while($row = mysql_fetch_array($result))
              {
                $name = $row['name'];
                $data = $row['date'];
                $url = $row['url'];
                $url = "https://docs.google.com/uc?id=".$url;
                echo "<div class='pics'><img src='".$url."' width='200' height='200'></img><div id='title' style='font-size:15px;'><p>".$name."</div></div>";
              }
              ?>
            </div>
        </article>
      </div>
      <div class="container" id="content" style="height:800px;">
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
                    <h4 class="modal-title">Add New Product</h4>
                </div>
                <div class="modal-body">     <!-- display node select table -->
                    <form action="addProduct.php" method="post" accept-charset="utf-8" id="target">
                        <div class="form-group">
                          <label for="exampleSelect1">底妝</label>
                          <select class="form-control" name="theType" id="selector">
                            <option value = "1">底妝</option>
                            <option value = "2">修容</option>
                            <option value = "3">眼部</option>
                            <option value = "4">唇部</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>產品名稱</label>
                          <input type ="text" name="productName" class="form-control" id="pname" value="">
                        </div>
                        <div class="form-group">
                          <label>滋潤程度(1-10, 10滋潤)</label>
                          <input type ="text" name="value" class="form-control" id="pname" value="0">
                        </div>
                      </form>
                      <p><button type="submit" form="target" class="btn btn-link" >送出並拍照</button></p>
                    
                  </div>
                <div class="modal-footer">
                  <!-- refresh to clean the table -->
                  <!-- TODO: click gray area shold refresh -->
                  <!-- TODO: click gray area not long enough -->
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


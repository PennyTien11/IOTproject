<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sticky Footer Navbar Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <script src="js/main.js" type="text/javascript"></script>
  </head>

  <body>

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

      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2500">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2" ></li>
        <li data-target="#carousel-example-generic" data-slide-to="0" ></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/slide0.jpg" alt="First slide">
        </div>
        <div class="item">
          <img src="img/slide2.jpg" alt="Second slide">
        </div>
        <div class="item">
          <img src="img/slide3.jpg" alt="Third slide">
        </div>
        <div class="item">
          <img src="img/slide4.jpg" alt="Third slide">
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/Scripts/AssetsBS3/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>


<?php # Script 3.7 - index.php #2

// This function outputs theoretical HTML
// for adding ads to a Web page.
function create_ad() {
  echo '<div class="alert alert-info" role="alert"><p>This is an annoying ad! This is an annoying ad! This is an annoying ad! This is an annoying ad!</p></div>';
} // End of the function definition.

$page_title = 'Welcome to this Site!';
include('includes/header.html');

?>

<div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/banner1.jpg" alt="Los Angeles" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="img/banner2.jpg" alt="Chicago" width="1100" height="500">
        </div>
        <div class="carousel-item">
            <img src="img/banner3.jpg" alt="New York" width="1100" height="500">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<br>

<div class="container">

    <div style="text-align: center;">
        <div class="page-header">
            <h1>Welcome to DIVVYD online shoping store</h1>
        </div>
        <br>
        <p>Welcome to Carousel Clothing! We are uniquely located in a historical building which was once home to a Kitchener shoe factory. This historical landmark is now home to over 30 businesses.</p>

        <p>The store opened in 2007 in a very small space and has expanded several times to our present location of over 3000 sq ft. We are the largest consignment store in the area and have over 4000 consignors. This means we have 500-1000 new pieces of clothing every week! We have several women’s boutique stores, which send us new clothing–all new, never worn, tickets and original price still on.</p>

    </div>

    <div class="page-header" style="text-align: center;">
        <h1>Start shopping</h1>
    </div>
    
    <div class="row">
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="product.php">
        <img src="img/banner1.jpg" alt="Lights" style="width:100%">
        <div class="caption">
          <p>Buy Mens</p>
        </div>
      </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="product.php">
        <img src="img/banner2.jpg" alt="Nature" style="width:100%">
        <div class="caption">
          <p>Buy Ladies</p>
        </div>
      </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="product.php">
        <img src="img/banner3.jpg" alt="Fjords" style="width:100%">
        <div class="caption">
          <p>Buy Childs</p>
        </div>
      </a>
            </div>
        </div>
    </div>

    <img src="img/banner3.jpg" class="img-fluid" alt="Responsive image">

</div>

<?php
include('includes/footer.html');
?>

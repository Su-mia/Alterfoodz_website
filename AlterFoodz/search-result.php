<?php 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false) {


  echo "<script>
  alert('You have to login first, please');
  window.location.href='login.php';
  </script>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>EstateAgency Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
 
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: EstateAgency
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Property Search Section ======= -->
  <div class="click-closed"></div>
  <!--/ Form Search Star /-->
  <?php 
  include('search.php');
  ?><!-- End Property Search Section -->

  <!-- ======= Header/Navbar ======= -->
  <?php
    include('header.html');
  ?>
  <!-- End Header/Navbar -->

  <main id="main">
  
    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box">
              <h1 class="title-single">Results</h1>
              <span class="color-text-a">type</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Search result
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- =======  result ======= -->
    <section class="news-grid grid">
  <div class="container">
    <div class="row">
      <?php 
        //$result = $_SESSION['result'];
        if(isset($result) and $result)
        { 
          while ($row=mysqli_fetch_row($result))
        {
          $id = $row[0];
          $productname = $row[1];
          $brandname = $row[2];
          $catgname =  $row[3];
          $price = $row[4];
          $fat = $row[5];
          $sugar =  $row[6];
          $calories = $row[7];
          
          $pic =  base64_encode($row[11]);

          $query2 = "SELECT* FROM Brand JOIN Products ON Brand.BrandName = Products.BrandName WHERE product_id=$id";
          if ($result2=mysqli_query($link,$query2))
          { 
            while ($row2=mysqli_fetch_row($result2))
            {
              $country = $row2[1];
            }
            mysqli_free_result($result2);
          }    
    ?>
    <div class="col-md-4">
      <div class="card-box-a card-shadow">
        <div class="img-box-a">
          <img src="data:image/jpeg;base64,<?php echo $pic; ?>" alt="" class="img-a img-fluid">
        </div>
        <div class="card-overlay">
          <div class="card-overlay-a-content">
            <div class="card-header-a">
              <h2 class="card-title-a">
                <a href="search-result.php"><br></a><br>
                <span><?php echo htmlspecialchars($brandname);?> </span><br>
                <span><?php echo htmlspecialchars($productname);?></span><br>
                <div class="star-ratings">
                  <span class="star">&#9733;</span>
                  <span class="star">&#9733;</span>
                  <span class="star">&#9733;</span>
                  <span class="star">&#9733;</span>
                  <span class="star">&#9733;</span>
                </div> 
              </h2>
            </div>
            <div class="card-body-a">
              <div class="price-box d-flex">
                
              </div>
              <a href="more-info.php?id=<?php echo $id; ?>" class="link-a">Click here to view <span class="bi bi-chevron-right"></span></a>
            </div>
            <div class="card-footer-a">
              <ul class="card-info d-flex justify-content-around">
                <li>
                  <h4 class="card-info-title">Calories</h4>
                  <span><?php echo htmlspecialchars($calories);?><sup></sup></span>
                </li>
                <li>
                  <h4 class="card-info-title">Sugar</h4>
                  <span><?php echo htmlspecialchars($sugar);?> g</span>
                </li>
                <li>
                  <h4 class="card-info-title">Price</h4>
                  <span><?php echo htmlspecialchars($price);?>DZD</span>
                </li>
                <li>
                  <h4 class="card-info-title">Country</h4>
                  <span><?php echo htmlspecialchars($country);?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
        }
        mysqli_free_result($result);
      }

      else{
        include("init.php");
        $queryall = "SELECT * FROM Products";
        
        if ($resultall=mysqli_query($link,$queryall))
        {
          while ($row=mysqli_fetch_row($resultall))
          {
            $id = $row[0];
            $productname = $row[1];
            $brandname = $row[2];
            $catgname =  $row[3];
            $price = $row[4];
            $fat = $row[5];
            $sugar =  $row[6];
            $calories = $row[7];
            $pic =  base64_encode($row[11]);

            $query2 = "SELECT* FROM Brand JOIN Products ON Brand.BrandName = Products.BrandName WHERE product_id=$id";
            if ($result2=mysqli_query($link,$query2))
            { 
              while ($row2=mysqli_fetch_row($result2))
              {
                $country = $row2[1];
              }
              mysqli_free_result($result2);
            }    
      ?>
      <div class="col-md-4">
        <div class="card-box-a card-shadow">
          <div class="img-box-a">
            <img src="data:image/jpeg;base64,<?php echo $pic; ?>" alt="" class="img-a img-fluid">
          </div>
          <div class="card-overlay">
            <div class="card-overlay-a-content">
              <div class="card-header-a">
                <h2 class="card-title-a">
                  <a href="search-result.php"><br></a><br>
                  <span><?php echo htmlspecialchars($brandname);?> </span><br>
                  <span><?php echo htmlspecialchars($productname);?></span><br>
                  <div class="star-ratings">
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                  </div> 
                </h2>
              </div>
              <div class="card-body-a">
                <div class="price-box d-flex">
                  
                </div>
                <a href="more-info.php?id=<?php echo $id; ?>" class="link-a">Click here to view <span class="bi bi-chevron-right"></span></a>
              </div>
              <div class="card-footer-a">
                <ul class="card-info d-flex justify-content-around">
                  <li>
                    <h4 class="card-info-title">Calories</h4>
                    <span><?php echo htmlspecialchars($calories);?><sup></sup></span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Sugar</h4>
                    <span><?php echo htmlspecialchars($sugar);?> g</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Price</h4>
                    <span><?php echo htmlspecialchars($price);?>DZD</span>
                  </li>
                  <li>
                    <h4 class="card-info-title">Country</h4>
                    <span><?php echo htmlspecialchars($country);?></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
          }
          mysqli_free_result($resultall);
        }
      }
        mysqli_close($link);  
          
      ?>
    </div>
  </div>
</section>

   </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">AlterFoodz</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat duis
                sed aute irure.
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone .</span> contact@example.com
                </li>
                <li class="color-a">
                  <span class="color-text-a">Email .</span> +54 356 945234
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">International sites</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Venezuela</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">China</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Hong Kong</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Argentina</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Singapore</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Philippines</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="#">About</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Blog</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">AlterFoodz</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
          -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
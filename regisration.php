<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>
  <!-- Header
   ================================================== -->
  <header id="home">
    <div class="container head">
      <ul
        class="nav justify-content-center align-items-center navbar-fixed-top"
      >
        <li class="nav-item">
          <a
            class="nav-link ui"
            href="#home"
            onclick="location.href='index.html';"
            ><i class="far fa-arrow-alt-circle-left"></i>
              Return Home
            </a>
        </li>

        <li class="nav-item">
          <a class="navbar-brand" href="#">
            <img
              src="images/medialogo.png"
              alt="logo"
              style="width: 140px"
              onclick="location.href='index.html';"
            />
          </a>
        </li>
      </ul>
    </div>
    <br />
    <div class="container form mt-100">
      <h3 style="color: white">Registration</h3>
      <?php if (isset($_SESSION['success'])) { ?>
        <span style="color: #24f324"><?=$_SESSION['success']?></span>
      <?php } ?>
      <form action="/modemedia/sendEmail.php" method="POST">
        <div class="row d-flex justify-content-center">
          <div class="col-md-6">
            <div class="form-groupx">
              <!-- <label for="email">Email address:</label> -->
              <input
                type="text"
                class="form-control"
                placeholder="Comapny Name"
                id="name"
                name="company"
                required
              />
              <?php if (isset($_SESSION['errors']) && array_key_exists('company', $_SESSION['errors'])) { ?>
                <small style="color: white"><?=$_SESSION['errors']['company']?></small>
              <?php } ?>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="The Service You Want"
                id="service"
                name="service"
                required
              />
              <?php if (isset($_SESSION['errors']) && array_key_exists('service', $_SESSION['errors'])) { ?>
                <small style="color: white"><?=$_SESSION['errors']['service']?></small>
              <?php } ?>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Client Name"
                id="number"
                name="client_name"
                required
              />
              <?php if (isset($_SESSION['errors']) && array_key_exists('client_name', $_SESSION['errors'])) { ?>
                <small style="color: white"><?=$_SESSION['errors']['client_name']?></small>
              <?php } ?>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Mobile Number"
                id="cell-no"
                name="mobile_number"
                required
              />
              <?php if (isset($_SESSION['errors']) && array_key_exists('mobile_number', $_SESSION['errors'])) { ?>
                <small style="color: white"><?=$_SESSION['errors']['mobile_number']?></small>
              <?php } ?>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                placeholder="Email"
                id="email"
                name="email"
                required
              />
              <?php if (isset($_SESSION['errors']) && array_key_exists('email', $_SESSION['errors'])) { ?>
                <small style="color: white"><?=$_SESSION['errors']['email']?></small>
              <?php } ?>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-outline-light">Submit</button>
      </form>
    </div>
  </header>
  <!-- Header End -->

  <!-- Footer -->
  <footer class="page-footer font-small blue pt-4 st">
    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">
      <!-- Grid row -->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">
          <!-- Content -->
          <img
            src="images/modelogowhite.png"
            class="img-fluid"
            style="height: 150px; width: 150px"
          />
          <!-- <p>Here you can use rows and columns to organize your footer content.</p> -->
        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-3" />

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">contact info</h5>

          <ul class="list-unstyled">
            <br />
            <li>
              <p><strong>Phone: </strong> +9(509)1206705</p>
            </li>
            <li>
              <p><strong>Adress: </strong> Kuwait</p>
            </li>
          </ul>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-3">
          <!-- Links -->
          <h5 class="text-uppercase">get help</h5>

          <ul class="list-unstyled">
            <br />
            <li>
              <p>Terms & Conditions</p>
            </li>
            <li>
              <p>Privacy Policy</p>
            </li>
          </ul>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
      © 2020 Copyright:
      <a href="https://modecollection.store/" target="blank">
        modecollection.store</a
      >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  <body></body>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get("serive");
    document.getElementById('service').value = myParam;
    console.log(myParam);
  </script>
</html>
<?php session_destroy() ?>
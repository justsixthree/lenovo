<?php
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $cname = $_POST['cname'];
  $phone = $_POST['phone'];
  if (!empty($username) || !empty($email) || !empty($cname) || !empty($phone)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "lenovo";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
      die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
      $SELECT = "SELECT email From datatable Where email = ? Limit 1";
      echo $INSERT = "INSERT Into datatable (username, email, phone, cname) values(?, ?, ?, ?)";
      //Prepare statement
      $stmt = $conn->prepare($SELECT);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum = $stmt->num_rows;
      if ($rnum == 0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssss", $username, $email, $phone, $canme);
        $stmt->execute();
        echo "New record inserted sucessfully";
      } else {
        echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
    }
  } else {
    echo "All field are required";
    die();
  }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="assets/css/stylesheet.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <link rel="stylesheet" href="assets/font/stylesheet.css">
  <link rel="stylesheet" href="assets/css/fullpage.min.css">

  <meta name="theme-color" content="#fafafa">
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</head>

<body>
  <!-- -------*****--- Header Start ---*****------- -->
  <header class="header padd--50">

    <div class="header__inner">
      <div class="logo">
        <a href="#">
          <img src="assets/img/logo.png" alt="">
        </a>
      </div>
      <!-- ---------------------=== responsive__header Start ===---------------------- -->
      <!-- --------------- Toggle Icon Start---------------- -->
      <div class="nav__toggle" onclick="nav();">
        <svg height="25px" viewBox="0 -53 384 384" fill="#ff6b01" width="30px" xmlns="http://www.w3.org/2000/svg">
          <path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
          <path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
          <path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path>
        </svg>
      </div>

      <!-- ------------- Toggle Icon Start-------------------- -->
      <!-- ---------------------=== responsive__header Start ===---------------------- -->
      <nav class="nav">
        <ul class="nav__navbar ">
          <li class="nav__item ">
            <a href="#about" class="nav__link">
              ABOUT
            </a>
          </li>
          <li class="nav__item">
            <a href="#register" class="nav__link">
              REGISTER
            </a>
          </li>
          <li class="nav__item">
            <a href="#event" class="nav__link">
              EVENT DETAILS
            </a>
          </li>
      </nav>
    </div>

  </header>
  <!-- -------*****--- Header End ---*****------- -->
  <main class="main" id="fullpage">
    <!-- Leading Section Start -->
    <section class="section active leading" id="section0">
      <h2>
        Leading<br>
        Intelligent<br>
        Transformation<br>
      </h2>
    </section>
    <!-- Leading Section End -->



    <!-- About Section Start -->
    <section class="about section" id="about">
      <div class="container">
        <div class="about__contant">
          <div class="heading">
            <h2>
              ABOUT
            </h2>
          </div>
          <br><br>
          <div class="details">
            <p>
              As we step into a world where normalcy returns at a slow but definite phase, we
              understand the need for experiences that are interactive and engaging – on a digital
              platform. It is no longer impressive to be the ordinary and we at Lenovo have the
              potential to transform your experiences beyond the extraordinary.
              <br><br>
              An exclusive event catered to the top customers at Lenovo, Lenovosocial redefines the
              ‘new normal.’ With the aim of increasing employee collaboration and productivity, this
              experience will help transform your organisation by offering a wide variety of products,
              services, and solutions.
              <br><br>
              <span>Register &nbsp</span>today for more details!
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- About Section End -->

    <!-- FORM Section START -->
    <section class="register__form section" id="register">

      <div class="container">
        <div class="inner__form">
          <form method="POST" action="index.php" id="contactForm">

            <div class="input">
              <label for="" class="label">Company Name:</label>
              <input class="form__control" id="cname" type="text" name="cname">
            </div>
            <div class="input pos--rel">
              <label for="" class="label">Full Name:</label>
              <h3>First Name</h4>
                <h4>Last Name</h4>
                <input class="form__control" id="fname" type="text" name="username">
            </div>
            <div class="input">
              <label for="" class="label">Email ID:</label>
              <input class="form__control" id="email" type="email" name="email">
            </div>
            <div class="input">
              <label for="" class="label">Contact Number:</label>
              <input class="form__control" id="number" type="text" name="phone">
            </div>
            <div class="input flex--jus-center marg--50-0">
              <label for="" class="label"></label>
              <div class="form__btns">
                <input type="submit" name="submit" id="submitBtn" value="REGISTER" class="form__btn">
              </div>
            </div>
          </form>
        </div>
      </div>

    </section>
    <!-- FORM Section End -->

    <!-- Live event Section Start -->
    <section class="live__event section" id="event">
      <div class="container">
        <div class="live__contant">
          <h6>
            Lenovo Social
          </h6>
          <h2>
            Event date - 15th july
          </h2>
        </div>
      </div>
    </section>
    <!-- Live event Section End -->
  </main>
  <script type="text/javascript" src="assets/js/fullpage.js"></script>
  <script type="text/javascript" src="assets/js/main.js"></script>
  <script type="text/javascript">
    var myFullpage = new fullpage('#fullpage', {
      sectionsColor: ['#f2f2f2', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff']
    });
  </script>
  <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
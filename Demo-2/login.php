<?php
session_start(); ?>
<?php

  $error="";
  if(isset($_POST['uname']) && !empty($_POST['uname']) && isset($_POST['pass']) && !empty($_POST['pass'])){

    $username = $_POST['uname'];
    $password = $_POST['pass'];
    // echo $username,$password;

    include("connection.php");
    $query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        // echo "Username and password exist in the database";
        $_SESSION["verified"] = "1";

        mysqli_close($con);
        header("Location:view.php");

    } else {
        echo "Username and/or password are incorrect";
        mysqli_close($con);
        // header('Location:login.php');
    }
  }


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--
    meta tags
    -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--
    title tag
    -->
    <title>اوریون - صفحه لندینگ اپلیکیشن</title>

    <!--
    favicon
    -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">

    <!--
    stylesheets
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/glightbox.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/overlay-scrollbars.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/rtl.css">
</head>
<body >

    <div class="main-wrapper">

    <!--
    preloader - start
    -->
    <div class="preloader">
        <div class="preloader-wrapper">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 200 200">
            <g class="pre load6">
                <path fill="#1B1A1C" d="M124.5,57L124.5,57c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7v0c0-3.9,3.1-7,7-7h36
                C121.4,50,124.5,53.1,124.5,57z"/>
                <path fill="#1B1A1C" d="M147.7,86.9L147.7,86.9c-2.7,2.7-7.2,2.7-9.9,0l-25.5-25.5c-2.7-2.7-2.7-7.2,0-9.9l0,0
                c2.7-2.7,7.2-2.7,9.9,0L147.7,77C150.5,79.8,150.5,84.2,147.7,86.9z"/>
                <path fill="#1B1A1C" d="M143,74.5L143,74.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7l0,0c-3.9,0-7-3.1-7-7v-36
                C136,77.6,139.1,74.5,143,74.5z"/>
                <path fill="#1B1A1C" d="M148.4,112.4L148.4,112.4c2.7,2.7,2.7,7.2,0,9.9L123,147.7c-2.7,2.7-7.2,2.7-9.9,0h0c-2.7-2.7-2.7-7.2,0-9.9
                l25.5-25.5C141.3,109.6,145.7,109.6,148.4,112.4z"/>
                <path fill="#1B1A1C" d="M125.5,143L125.5,143c0,3.9-3.1,7-7,7h-36c-3.9,0-7-3.1-7-7l0,0c0-3.9,3.1-7,7-7h36 C122.4,136,125.5,139.1,125.5,143z"/>
                <path fill="#1B1A1C" d="M52.3,113.1L52.3,113.1c2.7-2.7,7.2-2.7,9.9,0l25.5,25.5c2.7,2.7,2.7,7.2,0,9.9h0c-2.7,2.7-7.2,2.7-9.9,0
                L52.3,123C49.5,120.2,49.5,115.8,52.3,113.1z"/>
                <path fill="#1B1A1C" d="M57,75.5L57,75.5c3.9,0,7,3.1,7,7v36c0,3.9-3.1,7-7,7h0c-3.9,0-7-3.1-7-7v-36C50,78.6,53.1,75.5,57,75.5z"/>
                <path fill="#1B1A1C" d="M86.9,52.3L86.9,52.3c2.7,2.7,2.7,7.2,0,9.9L61.5,87.6c-2.7,2.7-7.2,2.7-9.9,0l0,0c-2.7-2.7-2.7-7.2,0-9.9
                L77,52.3C79.8,49.5,84.2,49.5,86.9,52.3z"/>
            </g>
            </svg>
        </div>
    </div>
    <!--
    preloader - end
    -->

    <!--
    navigation - start
    -->
    <div class="navigation navigation-1">
        <div class="navigation-wrapper">
            <div class="container">
                <div class="navigation-inner">
                    <div class="navigation-logo">
                        <a class="logo" href="index.html">
                            <img src="assets/images/logob.png" alt="orions-logo">
                        </a>
                        <a class="logo-white" href="index.html">
                            <img src="assets/images/logow.png" alt="orions-logo">
                        </a>
                    </div>
                    <div class="navigation-menu">
                        <div class="mobile-header">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="assets/images/logow.png" alt="image">
                                </a>
                            </div>
                            <ul>
                                <li class="close-button">
                                    <i class="fas fa-times"></i>
                                </li>
                            </ul>
                        </div>
                        <ul class="parent">
                            <li>
                                <a href="index.html" class="link-underline link-underline-1">
                                    <span>خانه</span>
                                </a>
                            </li>

                        </ul>

                        <div class="background-pattern">
                            <div class="background-pattern-img background-loop" style="background-image: url(assets/images/patterns/pattern.jpg);"></div>
                            <div class="background-pattern-gradient"></div>
                        </div>
                    </div>
                    <div class="navigation-bar">
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--
    navigation - end
    -->

    <!--
    page header - start
    -->
    <div class="page-header">
        <div class="page-header-wrapper">

            <div class="background-pattern background-pattern-1">
                <div class="background-pattern-img background-loop" style="background-image: url(assets/images/patterns/pattern.jpg);"></div>
                <div class="background-pattern-gradient"></div>
                <div class="background-pattern-bottom">
                    <div class="image" style="background-image: url(assets/images/patterns/pattern-1.jpg)"></div>
                </div>
            </div>
        </div>
    </div>
    <!--
    page header - end
    -->

    <!--
    contact details - start
    -->

    <!--
    contact details - end
    -->

    <!--
    contact form section - start
    -->

    <div class="contact-form-section">
        <div class="contact-form-section-wrapper">
            <div class="container">
                <div class="row gx-5 contact-form-section-row">
                    <div class="col-lg-6 mx-auto">
                        <!--
                        contact form - start
                        -->
                        <div class="contact-form drop-shadow-2">
                            <div class="contact-form-wrapper">
                                <div class="section-heading section-heading-2 center">
                                    <div class="sub-heading c-green upper ls-1">
                                        <i class="las la-lock"></i>
                                        <h5>ورود</h5>
                                    </div>
                                    <div class="main-heading c-dark">
                                        <h1>ورود به سامانه</h1>
                                    </div>
                                </div>
                                <form method="post" action="login.php">
                                    <div class="form-floating">
                                        <input class="input form-control" id="uname" name="uname" type="text" placeholder="نام کامل">
                                        <label for="name-field">نام کاربری</label>
                                    </div>
                                    <div class="form-floating">
                                        <input class="input form-control" id="pass" name="pass" type="password" >
                                        <label for="email-field">رمز</label>
                                    </div>
                                    <div class="form-floating" id="captcha">
                                      <div id="image" class="inline" selectable="False">
                                         </div>

                                    </div>

                                    <button type="submit" class="button button-2">
                                        <span class="button-inner">
                                            <span class="button-content">
                                                <span class="text">ورود</span>
                                            </span>
                                        </span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!--
                        contact form - end
                        -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--
    contact form section - end
    -->

    <!--
    instagram - start
    -->

    <!--
    instagram - end
    -->

    <!--
    footer - start
    -->
    <footer class="footer">
      <div class="footer-wrapper">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
              <div class="footer-row text-center">
                <div class="footer-detail" style="margin:0 auto">
                  <a href="#">
                    <img src="assets/images/logob.png" alt="footer-logo">
                  </a>
                  <p class="c-grey-1">ایکاد پرینت پیشرو در خدمات چاپ</p>
                  <div class="links">
                    <a class="link-underline" href="mailto:ekadprint@gmail.com">
                      <span>ekadprint@gmail.com</span>
                    </a>
                    <a class="link-underline" href="tel:+98-920-276-0026">
                      <span>09202760026</span>
                    </a>
                    <a class="link-underline" href="tel:+31-03155344550">
                      <span>03155344550</span>
                    </a>
                  </div>
                </div>

    </div>
    </div>
    </div>
    <div class="row">
      <div class="col-lg-12 offset-lg-0 col-md-8 offset-md-2 col-10 offset-1">
        <div class="footer-copyright c-grey-1">
          <h6>&copy; سرو رایان</h6>
        </div>
      </div>
    </div>
    </div>
    <div class="footer-pattern" style="background-image: url(assets/images/patterns/pattern-1.jpg)"></div>
    </div>
    </footer>
    <!--
    footer - end
    -->

    </div>

    <!--
    scripts
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/overlay-scrollbars.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>

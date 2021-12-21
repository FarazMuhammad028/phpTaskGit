<?php
session_start();
if (isset($_SESSION['InputEmail'])) {


    header("Location: admin_dashboard.php");
} else {
    require_once "database_connection.php";
    $error_email = '';
    $error_password = '';
    if (isset($_POST['submit'])) {
        echo $EmailSession;

        $InputEmail = mysqli_real_escape_string($mysqli, $_POST['InputEmail']);
        $InputPassword = mysqli_real_escape_string($mysqli, $_POST['InputPassword']);

        /*Email Validation */

        if (!filter_var($InputEmail, FILTER_VALIDATE_EMAIL)) {
            $error_email = "<p>Invalid Email formate</p>";
        }


        /*Password Validation */
        if (empty($InputPassword) && (strlen($InputPassword) < 8)) {
            $error_message = "<p>Please Enter Valid Password</p>";
        }

        $query = "SELECT * FROM `admin` WHERE Admin_Email='$InputEmail' and Password='$InputPassword'";

        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['InputEmail'] = $InputEmail;
        }
        if (isset($_SESSION['InputEmail'])) {


            header("Location: admin_dashboard.php");
        } else {
            header("Location: admin_login.php");
        }
    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>FlexStart Bootstrap Template - Index</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/img/logo.png" alt="">
                <span>FlexStart</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="index.html">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
                    <li><a class="getstarted scrollto" href="admin_login.php">Admin</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="contactus.php">Contact Us</a></li>

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <section>
        <div class="container">
            <h1 class="text-center mt-lg-4">Admin Login</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="InputEmail">Email</label>
                    <input type="email" class="form-control" name="InputEmail" aria-describedby="emailHelp"
                        placeholder="Enter email" required>
                    <span class="text-danger"><?php echo $error_email; ?></span>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Name</label>
                    <input type="password" class="form-control" minlength="8" name="InputPassword"
                        aria-describedby="passwordHelp" placeholder="Enter Password" required>
                    <span class="text-danger"><?php echo $error_password; ?></span>
                </div>




                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <section>
            <!-- Vendor JS Files -->
            <script src="assets/vendor/purecounter/purecounter.js"></script>
            <script src="assets/vendor/aos/aos.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
            <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
            <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>

            <!-- Template Main JS File -->
            <script src="assets/js/main.js"></script>

</body>

</html>
<?php } ?>
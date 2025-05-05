<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forza Motors - Booking Page</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/linearicons.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootsnav.css">
    <link rel="stylesheet" href="assets/css/s.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        /* Navigation bar background color */
        .navbar {
            background-color: black !important; /* Set the background color to black */
        }
        /* Navigation links color */
        .navbar-nav > li > a {
            color: white !important; /* Set the text color to white */
        }
        /* Navigation links hover color */
        .navbar-nav > li > a:hover {
            color: #ddd !important; /* Set a lighter color on hover for better visibility */
        }
        .navbar-brand {
            color: white !important; /* Set the brand text color to white */
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }
        .booking-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin:100px 0 auto; /* Center the form horizontally */
            align-items:center;
        }
        .booking-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }
        .form-group {
            
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="date"],
        .form-group input[type="tel"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .car-image {
        display: block; /* Ensures the image is treated as a block-level element */
        max-width: 75%; /* Adjust as needed */
        height: auto; /* Maintain aspect ratio */
        margin: 0 auto; /* Center horizontally */
        }
    </style>
</head>
<body id="about-page">
    <!-- Navigation Start -->
    <section id="home">
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">
                    <div class="container">
                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <a class="navbar-brand" href="http://localhost/github/carvilla-v1.0/index.php">FORZA MOTORS<span></span></a>
                        </div><!--/.navbar-header-->
                        <!-- End Header Navigation -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li><a href="http://localhost/github/carvilla-v1.0/index.php">home</a></li>
                                <li class="scroll"><a href="#service">service</a></li>
                                <li><a href="about.html">about us</a></li>
                                <li><a href="ctact.html">contact</a></li>
                                <li><a href="http://localhost/github/carvilla-v1.0/LOGIN&REGISTER/index.php">Register/Login</a></li>
                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->
            <div class="clearfix"></div>
        </div><!-- /.top-area-->
    </section>
    <!-- Navigation End -->

    <!-- Booking Form Start -->
<div class="form-container"> 
    <div class="booking-form">
        <?php
        // Retrieve parameters from URL
        $car_id = isset($_GET['car_id']) ? $_GET['car_id'] : '';
        $collection_point_id = isset($_GET['collection_point']) ? $_GET['collection_point'] : '';
        $return_point_id = isset($_GET['return_point']) ? $_GET['return_point'] : '';
        $pickup_date = isset($_GET['pickup_date']) ? $_GET['pickup_date'] : '';
        $dropoff_date = isset($_GET['dropoff_date']) ? $_GET['dropoff_date'] : '';

        // Check if any parameter is missing
        if (empty($car_id) || empty($collection_point_id) || empty($return_point_id) || empty($pickup_date) || empty($dropoff_date)) {
            echo "<p>Error: Missing required parameters.</p>";
        } else {
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "forza motors";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch car details from database using car_id
            $car_name = '';
            $car_image = '';  // Variable to hold car image URL
            if ($car_id) {
                $sql = "SELECT name, image FROM cars WHERE car_id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Error preparing query: " . $conn->error);
                }
                $stmt->bind_param("i", $car_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $car_name = $row['name'];
                    $car_image = $row['image'];  // Get car image URL
                }
                $stmt->close();
            }

            // Fetch location names
            $collection_point_name = '';
            $return_point_name = '';
            if ($collection_point_id) {
                $sql = "SELECT name FROM locations WHERE loc_id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Error preparing query: " . $conn->error);
                }
                $stmt->bind_param("i", $collection_point_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $collection_point_name = $row['name'];
                }
                $stmt->close();
            }
            if ($return_point_id) {
                $sql = "SELECT name FROM locations WHERE loc_id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt === false) {
                    die("Error preparing query: " . $conn->error);
                }
                $stmt->bind_param("i", $return_point_id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $return_point_name = $row['name'];
                }
                $stmt->close();
            }

            // Close the connection
            $conn->close();
        }
        ?>

        <form action="submit booking.php" method="POST">
            <h2>Book Your Vehicle</h2>
            <!-- Hidden Car ID -->
            <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($car_id); ?>">
            <!-- Car Image -->
            <?php if ($car_image): ?>
                <div class="form-group">
                    <img src="<?php echo htmlspecialchars($car_image); ?>" alt="Car Image" class="car-image">
                </div>
            <?php endif; ?>
            <!-- Car Name -->
            <div class="form-group">
                <label for="car">Car Name</label>
                <input type="text" id="car" name="car" value="<?php echo htmlspecialchars($car_name); ?>" readonly>
            </div>
            <!-- Collection Point -->
            <div class="form-group">
                <label for="collection_point">Collection Point</label>
                <input type="text" id="collection_point" name="collection_point" value="<?php echo htmlspecialchars($collection_point_name); ?>" readonly>
            </div>
            <!-- Return Point -->
            <div class="form-group">
                <label for="return_point">Return Point</label>
                <input type="text" id="return_point" name="return_point" value="<?php echo htmlspecialchars($return_point_name); ?>" readonly>
            </div>
            <!-- Pick-up Date -->
            <div class="form-group">
                <label for="pickup_date">Pick-up Date</label>
                <input type="date" id="pickup_date" name="pickup_date" value="<?php echo htmlspecialchars($pickup_date); ?>" readonly>
            </div>
            <!-- Drop-off Date -->
            <div class="form-group">
                <label for="dropoff_date">Drop-off Date</label>
                <input type="date" id="dropoff_date" name="dropoff_date" value="<?php echo htmlspecialchars($dropoff_date); ?>" readonly>
            </div>
            <!-- Customer Name -->
            <div class="form-group">
                <label for="customer_name">Your Name</label>
                <input type="text" id="customer_name" name="customer_name" placeholder="Enter your name" required>
            </div>
            <!-- Customer Email -->
            <div class="form-group">
                <label for="customer_email">Your Email</label>
                <input type="email" id="customer_email" name="customer_email" placeholder="Enter your email" required>
            </div>
            <!-- Customer Phone Number -->
            <div class="form-group">
                <label for="customer_phone">Your Phone Number</label>
                <input type="tel" id="customer_phone" name="customer_phone" placeholder="Enter your phone number" required>
            </div>
            <!-- Submit Button -->
            <div class="form-group">
                <input type="submit" value="Book Now">
            </div>
        </form>
    </div>
</div> 
<footer id="contact"  class="a-contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="afooter-logo">
									<center>
									<a href="index.html">FORZA MOTORS</a>
								</div>
								<p>
								</p>
								<div class="afooter-contact">
									<p>support@forzamotors.com</p>
									<p>+91 7802130000</p>
									<p>M/s Forza Motors Passenger Cars India (P) Ltd
										Address: TC 79/1783-1, Idukki ,Venpalavattom, Anayara PO, Kuttikanam, Kerala - 685515</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="asingle-footer-widget">
								<h2>about forzamotors</h2>
								<ul>
									<li><a href="#">about us</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">terms <span> of service</span></a></li>
									<li><a href="#">privacy policy</a></li>
								</ul>
							</center>
							</div>
						</div>
					</div><div class="afooter-copyright">
						<div class="row">
							<div class="col-sm-6">
								<p>
									&copy; copyright.designed and developed by <a href="https://www.themesine.com/">forzamotors</a>.
								</p><!--/p-->
							</div>
							<div class="col-sm-6">
								<div class="afooter-social">
									<a href="#"><i class="fa fa-facebook"></i></a>	
									<a href="#"><i class="fa fa-instagram"></i></a>
									<a href="#"><i class="fa fa-linkedin"></i></a>
									<a href="#"><i class="fa fa-pinterest-p"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>	
								</div>
							</div>
						</div>
					</div><!--/.footer-copyright-->
				</div><!--/.container-->
    <!-- Booking Form End -->

    <!-- Include JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootsnav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>

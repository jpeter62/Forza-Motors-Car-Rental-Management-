<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Login</title>
    <link rel="stylesheet" href="user login.css">
    <style>
        /* Styles for the pop-up form */
        .modal {
            display: none;
            position: relative;
            z-index: 1;
            left: 0;
            top: 0;
            width: 50%;
            height: 50%;
            overflow: auto;
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body class="login-page">

<div class="login-box">
    <h2>Login to Forza Motors</h2>
    <?php
    session_start(); // Start the session

    // Initialize variables to hold error messages
    $error = "";

    // Database connection parameters
    $servername = "localhost";
    $username_db = "root";
    $password_db = "";
    $database = "forza motors"; // Adjusted to match the database name format

    // Establish a database connection
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password']; // Corrected to match the input field name

        $stmt = $conn->prepare("SELECT * FROM users_data WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) { // Assuming the database column is 'password'
                // Login successful
                $_SESSION['username'] = $username; // Set session variable
                header("Location: dashboard.php"); // Redirect to a protected page (dashboard.php)
                exit();
            } else {
                // Invalid password
                $error = "Invalid password.";
            }
        } else {
            // User not found
            $error = "User not found.";
        }
    }

    // Close connection
    $conn->close();
    ?>

    <?php if (!empty($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form action="" method="post">
        <div class="textbox">
            <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="textbox">
            <input type="password" placeholder="Password" name="password" required>
        </div>
        <input type="submit" class="btn" value="Sign in">
        <p class="register-link">Don't have an account? <a href="register.php">Register</a></p>
        <p class="forgot-password">Forgot your password? <a href="#" id="resetPasswordLink">Reset it</a></p>
    </form>
</div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Retrieve Password</h2>
        <form id="resetPasswordForm" action="retrieve_password.php" method="post">
            <div class="textbox">
                <input type="text" placeholder="Username" name="reset_username" required>
            </div>
            <input type="submit" class="btn" value="Retrieve Password">
        </form>
        <p id="passwordDisplay"></p>
    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("resetPasswordLink");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>

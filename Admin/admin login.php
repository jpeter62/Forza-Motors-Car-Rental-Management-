<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Forza Motors</title>
    <link rel="stylesheet" href="admin login styles.css">
    <script>
        function validateForm() {
            var username = document.forms["adminLoginForm"]["username"].value;
            var password = document.forms["adminLoginForm"]["password"].value;

            if (username == "" || password == "") {
                alert("All fields must be filled out");
                return false;
            }

            return true;
        }
    </script>
</head>
<body class="login-page">
    <div class="login-box">
        <h2>Admin Login</h2>
        <form name="adminLoginForm" method="post" onsubmit="return validateForm()">
            <div class="textbox">
                <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="textbox">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <input type="submit" class="btn" value="Login">
        </form>

        <?php
        session_start();

        // Database connection parameters
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $database = "forza motors";
        
        // Create connection
        $conn = new mysqli($servername, $dbUsername, $dbPassword, $database);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Function to sanitize user input
        function sanitize_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        // Retrieve form data
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = sanitize_input($_POST['username']);
            $password = sanitize_input($_POST['password']);
            
            // SQL query to check username and password
            $sql = "SELECT * FROM admin_data WHERE adminname='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($password === $row['adminpassword']) { // Assuming password is not hashed
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_name'] = $username;
                    echo "<script>alert('Login successful');</script>";
                    // You can redirect to the admin dashboard here if needed
                    // header("Location: admin-dashboard.php");
                    // exit();
                } else {
                    echo "<script>alert('Incorrect password');</script>";
                }
            } else {
                echo "<script>alert('No admin found with this username');</script>";
            }
        }
        
        // Close connection
        $conn->close();
        ?>

        <?php
        if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
            echo "<p>Welcome, " . $_SESSION['admin_name'] . "! You have successfully logged in.</p>";
        }
        ?>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Login</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body class="login-page">

<div class="login-box">
    <h2>Login to Forza Motors</h2>
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

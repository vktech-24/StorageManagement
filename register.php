<?php
$passErr = ""; // Initialize the password error variable

// Establish connection to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "file_upload_download";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Strong validation for username and password
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $userErr = "Invalid Username. Username must be a valid email address.";
    }

    if (strlen($password) < 8) {
        $passErr = "Password must be at least 8 characters long.";
    }

    // Hash the password for security
    $password = password_hash($password, PASSWORD_DEFAULT);

    // If there are no validation errors, proceed with database insertion
    if (empty($userErr) && empty($passErr)) {
        // Insert user details into database
        $sql = "INSERT INTO register(firstname, lastname, username, password)
        VALUES ('$firstname', '$lastname', '$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<h3>Registration Successfully</h3>";
            header("refresh:2;index.php");
        } else {
            echo "<h3>Error: " . $conn->error . "</h3>";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="styles/register.css">
</head>
<body>
    <div class="container">
     <form action="" method="post">
      <h1>Teachers Registration</h1>  
      <div class="form-group">
       <input type="text" name="firstname" id="firstname" required>
       <div class="underline"></div>
       <label for="firstname">Firstname</label>
      </div>  
      <div class="form-group">
       <input type="text" name="lastname" id="lasttname" required>
       <div class="underline"></div>
       <label for="lastname">Lastname</label>
      </div>
      <div class="form-group">
       <input type="text" name="username" id="username" required>
       <div class="underline"></div>
       <label for="username">Username</label>
       <span style="color:red; font-size:14px;"><?php echo isset($userErr) ? $userErr : ''; ?></span> <!-- Display username error -->
      </div>
      <div class="form-group">
       <input type="password" name="password" id="password" required>
       <div class="underline"></div>
       <label for="password">Password</label>
       <span style="color:red; font-size:14px;"><?php echo isset($passErr) ? $passErr : ''; ?></span> <!-- Display password error -->
      </div>
      <div class="form-sub">
       <input type="submit" value="Register" class="btn" required>
      </div>
     </form>
    </div>
</body>
</html>

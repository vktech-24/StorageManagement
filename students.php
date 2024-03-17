<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "file_upload_download";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM student WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password === $row['password']) { // Compare plaintext passwords
            $_SESSION['username'] = $username;
            header("Location: download.php");
            exit; // Ensure script stops after redirection
        } else {
            $password_error = "Incorrect password!";
        }
    } else {
        $username_error = "Username not found!";
    }
    
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Login</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .error-message {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>
<img src="images/student.jpg"  class="bg" alt="" srcset="">
    <div class="container">
        <div class="picture"><img src="images/boy_profile.jpg" alt=""></div>
        <form action="" method="post" class="form">
            <h1>Students Login</h1>
            <div class="form-group">
                <input type="text" name="username" id="email" required>
                <div class="underline"></div>
                <label for="email">Username</label>
                <?php if(isset($username_error) && !empty($username_error)): ?>
                    <span class="error-message"><?php echo $username_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" required>
                <div class="underline"> 
                </div>
                <label for="password">Password</label>
                <!-- Error messages -->
                <?php if(isset($password_error) && !empty($password_error)): ?>
                    <span class="error-message"><?php echo $password_error; ?></span>
                <?php endif; ?>
            </div>
            <div class="form-sub">
                <input type="submit" value="Submit" class="btn">
            </div>
            <div class="form-anchor">
                <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/">Teachers Login</a>
            </div>
        </form>
    </div>
</body>
</html>

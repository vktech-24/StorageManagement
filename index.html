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
$username=$_POST['username'];
$password=$_POST['password'];

$sql="SELECT * FROM register WHERE username='$username'";
$result=$conn->query($sql);

if($result->num_rows == 1){
    $row=$result->fetch_assoc();
    if(password_verify($password,$row['password'])){
        $_SESSION['username']=$username;
        header("Location: upload.php");
    }else{
        echo "Invalid Password";
    }
}else{
    echo "User Not Found";
}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <img src="images/teacher2.jpg" class="bg" alt="" srcset="">
    <div class="container">
        <div class="picture"><img src="images/teacher-profile.jpg" alt=""></div>
        <form action="" method="post" class="form">
        <h1>Teachers Login</h1>
            <div class="form-group">
                <input type="text" name="username" id="email" required>
                <div class="underline"></div>
                <label for="email">Username</label>
            </div>
            <div class="form-group">
                <input type="password" name="password"  required>
                <div class="underline"></div>
                <label for="password">Password</label>
            </div>
            <div class="form-sub">
                <input type="submit" value="Submit" class="btn">
            </div>
            <div class="form-anchor">
                <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/students.php">Student Login</a><a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/register.php">Teachers Registration</a>
            </div>
            </form> 
    </div>
</body>
</html>
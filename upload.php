<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="styles/teachers.css">
</head>
<body>
<div class="nav">
    <div class="logo">
    <h4><img src="icons/teacher2.png" width=50px alt="">Teachers</h4>
    </div>

    <div class="find">
        <div class="form-group">
            <img src="icons/home.png" width=20px alt="" srcset="">
            <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/upload.php#" target="_blank">Home</a>
        </div>
        <div class="form-group">
            <img src="icons/history.png" width=22px srcset="">
            <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/date-report.php#" target="_blank">Upload History</a>
        </div>
        <div class="form-group">
            <img src="icons/about.png" width=19px alt="" srcset="">
            <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/about.php#" target="_blank">About</a>
        </div>
        <div class="form-group">
            <img src="icons/help.png" width=20px alt="" srcset="">
            <a href="#" target="_blank">FAQ</a>
        </div>
    </div>

    <div class="list">
        <button id="logout">Logout<img id="btn-logout" src="icons/logout.png" width=20px alt="" srcset=""></button>
    </div>

    <div class="menu">
        <input type="checkbox" name="check" id="check">
        <label for="check"><img src="icons/menu.png" width=35px></label>
    </div>
 </div><br>

 <div class="drop">
    <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/upload.php#" target="_blank">Home</a>
    <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/date-report.php#" target="_blank">Upload History</a>
    <a href="http://localhost/My%20Projects/2024%20Final%20Year%20Project/about.php#" target="_blank">About</a>
    <a href="#" target="_blank">FAQ</a>
    <button id="logout">Logout</button>
 </div>

    <div class="container">
    <?php
         if(isset($_POST['btn-click']))
         {
            $con = mysqli_connect("localhost","root","","file_upload_download");
            $filename = $_FILES["file"]["name"];
            $filesize = $_FILES["file"]["size"];
            $filetype = $_FILES["file"]["type"];
            $tempfile = $_FILES["file"]["tmp_name"];
            $folder = "uploads/".$filename;
    
            $sql = "INSERT INTO files(filename,filesize,filetype) VALUES ('$filename', $filesize, '$filetype')";
            if($filename == ""){
               echo "
               
               <div class='alert alert-danger' role='alert'>
               <h4 class='text-center'>Please Upload Any File</h4>
               </div>
               
               ";

            }else{
                $result = mysqli_query($con, $sql);
                move_uploaded_file($tempfile,$folder);
                echo "
                <div class='alert alert-success' role='alert'>
               <h4 class='text-center'>File Uploaded</h4>
               </div>
                ";
                header("refresh:1;upload.php");
                /* header("Location: upload.php"); */
            }
         }
       ?>
        <h1>Upload a File</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file" class="form-label"><ion-icon class="upload" name="cloud-upload-outline"></ion-icon><h3>Upload Your File Here</h3></label> 
        <input type="file" class="form-control" name="file" id="file">
        <div class="showname"><h5 class="filename">Supported Only -> pdf, png, jpeg, jpg, gif</h></div>
        <button type="submit" name="btn-click" class="btn btn-primary">Submit</button>  
        </form>
    </div>
    
    <div class="show-data">
    <?php
    $conn = mysqli_connect("localhost","root","","file_upload_download");
    $sql2 = "SELECT * FROM `files` WHERE 1 ORDER BY upload_date DESC";
    $result2 = mysqli_query($conn, $sql2);
    while($fetch = mysqli_fetch_assoc($result2))
    {
        echo "";
    ?>
     <div class="data">
        <div class="img">
          <?php
          $filetype = $fetch['filetype'];
          if (strpos($filetype,'pdf') !== false) {
              echo '<img src="icons/pdf.png" width=120px; alt="PDF">';
          }elseif(strpos($filetype,'png') !== false) {
              echo '<img src="icons/png.png" width=120px; alt="PNG">';
          }
          elseif(strpos($filetype,'presentation') !== false) {
              echo '<img src="icons/ppt.png" width=120px; alt="File">';
          }
          elseif(strpos($filetype,'html') !== false) {
              echo '<img src="icons/word.png" width=120px; alt="HTML">';
          }
          elseif(strpos($filetype,'jpeg') !== false) {
              echo '<img src="icons/jpg.png" width=120px; alt="JPEG">';
          }
          elseif(strpos($filetype,'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') !== false) {
            echo '<img src="icons/xls.png" width=120px; alt="JPEG">';
        }
          elseif(strpos($filetype,'gif') !== false) {
              echo '<img src="icons/gif.png" width=120px; alt="GIF">';
          }
          elseif(strpos($filetype,'text') !== false) {
              echo '<img src="icons/file.png" width=120px; alt="TEXT">';
          }
          elseif(strpos($filetype,'document') !== false) {
              echo '<img src="icons/doc.png" width=120px; alt="DOC">';
          }
          else{
              echo '<img src="icons/logout.png" width=120px; alt="File">';
          }
          ?>
        </div>
        <div class="title"><h6><?php echo $fetch['filename']?></h6>
        <h6><?php 
        $filesizeKB=$fetch['filesize'];
        $filesizeMB=$filesizeKB/1000000;
         echo "File Size:".round($filesizeMB,1)."MB";
        ?></h6>
        <a href="delete.php?id=<?php echo $fetch['id']?>" id="delete" > <img src="icons/delete.png" width=35px ></a>
        </div>
     </div>
    <?php
    }
    ?>
    </div>
   <script src="js/teachers.js"></script>
</body>
</html>
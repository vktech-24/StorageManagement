<?php
//database connected
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "file_upload_download";
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//fetch files from db
if(isset($_GET['search'])) {
    $filtervalue = $_GET['search'];
    $sql = "SELECT * FROM files WHERE filename LIKE '%$filtervalue%'";
} else{
    $sql = "SELECT * FROM files";
}
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploaded files</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/students.css">
</head>
<body>

<div class="navbar nav">
    <div class="logo">
        <h4><img src="icons/graduation.png" width=60px alt="">Students</h4>
    </div>
    <div class="logout">
        <img src="icons/notification.png" width=30px alt="" srcset="">
        <img src="icons/list.png" width=30px alt="" srcset="">
        <button id="logout-btn">Logout<img id="btn-logout" src="icons/logout.png" alt=""></button>
    </div>
    <div class="menu">
        <img src="icons/notification.png" width=30px alt="" srcset="">
        <img src="icons/list.png" width=30px alt="" srcset="">
        <img id="menu" src="icons/menu.png" width=35px alt="">
    </div>
</div>

<div class="container-fluid mt-5">
    <div class="row justify-content-end">
        <div class="col-10">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="search" class="form-control" value="<?php if (isset($_GET['search'])) { echo $_GET['search']; } ?>" name="search" placeholder="Search To Find Here...">
                    <button type="submit" class=" btn btn-primary">Search</button>
                    <button id="reset" class=" btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body bg-primary pt-1 pb-0 text-white">
                    <?php 
                    $sql = "SELECT COUNT(*) as total_rows FROM files";
                    $ans = $conn->query($sql);
                    
                    // Step 3: Fetch the result and display it on the HTML page
                    if ($ans->num_rows > 0) {
                        while($row = $ans->fetch_assoc()) {
                            $totalRows = $row["total_rows"];
                        }
                    } else {
                        $totalRows = 0;
                    }
                    ?>
                    <h5 class="mx-1.5">Total Files  <?php echo $totalRows; ?></h5>
                </div>
                <div class="card-body">
                   <?php
                   if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $file_path = "uploads/" . $row['filename'];
                        ?>
                         <div class="data">
                            <div class="img">
                            <?php 
                                        $filetype = $row['filetype'];
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
                            <div class="title">
                            <h6><?php 
                            echo $row['filename'];
                            ?></h6>
                            </div>

                            <div class="si-dow">

                            <div class="size">
                            <h6><?php 
                             $filesizeKB=$row['filesize'];
                             $filesizeMB=$filesizeKB/1000000;
                              echo "Size:".round($filesizeMB,1)."MB";
                             ?></h6>
                            </div>
                           
                            <div class="dow">
                            <h6 id="count">Downloads:-100</h6>
                            </div>

                            </div>

                            <div class="dow-pre">

                            <div class="d-b">
                            <div class="a">
                            <a href="<?php echo $file_path;?>"  download><img src="icons/download.png" alt="" width="23px"></a>
                            </div>
                            <div class="p">
                            <p>Download</p>
                            </div>
                            </div>

                            <div class="p-b">
                            <div class="a">
                            <a href="./uploads/<?php echo $row['filename'];?>" target="_blank" ><img src="icons/eye.png" width="30px"></a>
                            </div>
                            <div class="p">
                            <p>Preview</p>
                            </div>
                            </div>

                            <div class="f-b">
                            <div class="a">
                            <a href="#"  id="like"><img src="icons/heart.png" width="30px"></a>
                            </div>
                            <div class="p">
                            <p>Favorite</p>
                            </div>
                            </div>

                            </div>
                         </div>
                        <?php
                    }
                }else{
                  echo "<h6 class='bg-danger p-1 mt-1 text-center text-white'>No Files Found</h6>";
                }
                   ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/students.js"></script>
</body>
</html>
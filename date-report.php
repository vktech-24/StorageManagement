<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

        *{
            font-family: 'Poppins', sans-serif;
        }
        :root {
        --nav-color: #0652DD;
        --body-color: #397eff;
        --upload-color:red;
        --lbtn-color:red;
        }
        body{
        background-color: var(--body-color);
        }
        .btn{
        background-color: ;
        border:none;
        width:100%;
        }
        .btn:hover{
        background-color: #1e272e;
        }
        .form-group input{
        background-color: #dcdde1;
        margin-bottom:10px;
        font-size:17px;
        font-weight:400;
        letter-spacing:0.5px;
        }
        .form-group label{
        font-size:18px;
        font-weight:500;
        }
        #reset{
        background-color: red;
        color:white;
        }
        #reset:hover{
        background-color: #ff3f34;
        }
        .show-data{
        width: 100%;
        gap: 10px;
        padding: 20px;
        box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        border-radius: 10px;
        }
        
        .show-data{
        display:grid;
        grid-template-columns:repeat(auto-fill,220px);
        grid-auto-flow:row;
        gap: 25px;
        place-content: center;
        }
        
        .data{
        width: 220px;
        height: auto;
        /*   background-color: #cc00a0; */
        border-radius: 10px;
        display: grid;
        place-items: start center;
        box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
        }
        
        .img{
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        width: 95%;
        height: 150px;
        margin-top: 5px;
        background-color: rgb(247, 248, 248);
        display: grid;
        place-items: center;
        box-shadow: rgba(146, 101, 101, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        }
        .title{
        margin-top:5px ;
        width: 95%;
        height: auto;
        display: grid;
        place-items: center start;
        overflow: hidden;
        position: relative;
        }
        
        .title h5{
        color: rgb(0, 0, 0);
        }
        
        #delete{
        position: absolute;
        right: 0;
        bottom: 0;
        margin-bottom: 11px;
        margin-right: 6px;
        }
</style>
</head>
<body>
<section class="py-3">

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-md-12">
                
                <div class="card"> 

                    <div class="card-header bg-dark">
                    <h5 class="text-center fs-3 text-white">Upload Reports Between Two Dates Via From & To Dates</h5>
                    </div>

                    <div class="card-body">
                     <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">From Date</label>
                                    <input type="date" name="from_date" class="form-control" placeholder="From Date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">To Date</label>
                                    <input type="date" name="to_date" class="form-control" placeholder="To Date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Check</label><br>
                                    <button type="submit" name="" class="btn btn-primary">Filter User</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Reset</label><br>
                                    <button type="submit" name="" id="reset" class="btn">Reset</button>
                                </div>
                            </div>
                        </div>
                     </form>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <h6 class="fs-5">Record List</h6>
                        <hr>
                        <div class="show-data">
                        <?php  
                        if(isset($_GET['from_date']) && isset($_GET['to_date']))
                        {
                        $from_date = $_GET['from_date'];
                        $to_date = $_GET['to_date'];
                        $con = mysqli_connect("localhost","root","","file_upload_download");
                        $query = "SELECT * FROM files WHERE upload_date BETWEEN '$from_date' AND '$to_date' ";
                        $query_run = mysqli_query($con,$query);
                        if(mysqli_num_rows($query_run)>0)
                        {
                            foreach($query_run as $row)
                            {
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
                                    <div class="title"><h6><?php echo $row['filename']?></h6>
                                     <h6><?php 
                                     $filesizeKB=$row['filesize'];
                                     $filesizeMB=$filesizeKB/1000000;
                                      echo "File Size:- ".round($filesizeMB,1)."MB";
                                     ?></h6>
                                     <a href="delete2.php?id=<?php echo $row['id']?>" id="delete" > <img src="icons/delete.png" width=35px ></a>
                                     </div>
                                </div>
                                <?php
                            }
                        }else{
                            echo "No Record Found";
                        }
                        }
                        ?>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script>
    const reset=document.getElementById('reset');

    reset.addEventListerner('click',()=>{
        window.location.replace("http://localhost/My%20Projects/2024%20Final%20Year%20Project/date-report.php?from_date=&to_date=");
    })
</script>
</body>
</html>
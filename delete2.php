<?php
$id=$_GET['id'];
$con = mysqli_connect("localhost","root","","file_upload_download");
$sql = "DELETE FROM files WHERE id='$id'";
$result = mysqli_query($con,$sql);
if($result)
{
   header("location: date-report.php");
}
?>
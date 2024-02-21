<?php
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);
if(isset($_GET["deleteid"])){
    $pr_id=$_GET["deleteid"];
    $tn=$_GET["tn"];
    $st_id=$_GET["sti"];
    $header=$_GET["hdr"];

    $sql="delete from $tn where student_id='$st_id'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if($result){
        header("Location:$header");
    }
    
}
?>
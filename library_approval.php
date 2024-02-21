<?php
session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['librarian_logged_in'])){
  header("Location:index.php");
 }
 $manage_id=$_GET['manageid'];
 $reason=$_GET['reason'];
 $fullName=$_GET["fullName"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link rel="stylesheet" href="css/Staff_approval/staff_approval.css">
    <link rel="stylesheet" href="css/Staff_approval/staff_approval_SmallScreen.css">
    <link rel="stylesheet" href="css/signature.css">

    <style>
        footer{
        position: relative;
        bottom:0;
      }
    </style>
</head>
<body>
    <nav>
        <div class="logo-container">
            <img src="images/amu-logo.gif" width="80px" height="80px" alt="no internet connection">
        </div>
        <div class="texts-container">
            <h1>Arbaminch University</h1>
            <p><u>Library</u> Clearance approval process</p>
        </div>
        <div class="date-time-container">
        <p><span id='date-time'></span>.</p>
        </div>
    </nav>
    <div class="main-container">
        <div class="left-side-container">
          <div class="approval-details-container">
            <div class="detail">
                <label for="st_name">Student name:</label>
                <p><?php echo $fullName; ?></p>
            </div>
            <div class="detail">
                <label for="id_num">ID number:</label>
                <p> <?php echo $manage_id; ?> </p>
            </div>
            <div class="detail">
                <label for="id_num">Withdrawal reason:</label>
                <p> <?php echo $reason; ?> </p>
            </div>
            <div class="status-detail attachement">
              <h3>Attachement</h3>
              <?php
              $sql_attach=mysqli_query($conn, "SELECT image FROM requests WHERE id='$manage_id'") or die(mysqli_error($conn));
              $rows_attach=mysqli_num_rows($sql_attach);
              if($rows_attach > 0){
                while($rows_attach = mysqli_fetch_assoc($sql_attach)){
                  $attachement=$rows_attach["image"];
                  echo "<img src='".$attachement."'  width=80% height=400 alt=No>";
                }
              }
              else{
                echo "<p style=color:red;>No attachement needed!</p>";
              }
              ?>
          </div>
            <div class="status-detail" style="display: flex;">
                <h3>Approval details</h3>
                <h3>Approval status</h3>
            </div>
            <div class="detail allApprove">
            <?php
              $msg="";
              $status_msg="";
                $sql="SELECT * FROM library_record WHERE student_id='$manage_id'";
                $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($res)){
                      $msg=$rows["book_title"];
                      $status_msg="Property not returned , reject the clearance!!!!";
                    }
                }
                else{
                    $msg="No property taken";
                    $status_msg="No property taken, approve the clearance...";
                }
                ?>
                <label for="id_num">Property taken:</label>
                <p><?php echo $msg; ?> &radic;</p>
            </div>
            <div class="detail allApprove">
                <label for="id_num">Draw Signature:</label>
                <form class="signature-pad-form" method="POST" enctype="multipart/form-data">
                  <canvas height="100" width="300" class="signature-pad" id="the_canvas"></canvas>
                   <input type="hidden" name="signature" class="signature" id="signature" name="signature">
                  <p>
                      <a href="#" class="clear-button">Clear signature</a>
                  </p>
                  <input class="submit-button" type="submit" name="submit" value="Approve">
                <?php
                  if(isset($_POST["submit"])){
                  $status_msg="Approved";
                  $sig_string=$_POST['signature'];
                  $file_name="signature_" .date("his") .".png";
                  file_put_contents($file_name,file_get_contents($sig_string));
                  $reg_query=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($reg_query);
                  if($rows>0){
                    echo "<p style=color:red;>Already approved...</p>"; 
                  }else{
                    $date = date('Y-m-d H:i:s');
                  $sql = mysqli_query($conn,"INSERT INTO library_final_approve_reject (student_id,status,signature,staff_name,date) VALUES('$manage_id','$status_msg','$file_name','".$_SESSION['full_name']."','$date')") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM request_library WHERE id='$manage_id'") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM library_rejected_requests WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM library_record WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    echo "<h4 style=color:green;margin-top:20px;>Clearance successfully approved...</p>";
                    $_SESSION['library_approved']=$manage_id;
                  }
                }
                  ?>
                  <input class="submit-button" type="submit" name="reject" value="Reject">
                  <?php
                  if(isset($_POST["reject"])){
                  $status_msg="Rejected";
                  $sql = mysqli_query($conn,"INSERT INTO library_rejected_requests (student_id,status,staff_username) VALUES('$manage_id','$status_msg','".$_SESSION['full_name']."')") or die(mysqli_error($conn));
                  $_SESSION['reject']=$manage_id;
                  if($sql){
                    echo "<h4 style=color:red;margin-top:20px;>Rejected successfully...</p>";
                  }
                  else {
                    echo "not saved";
                  }
                  }
                  ?>
              </form>
            </div>
          </div>
        </div>
    </div>

    <footer>
        Copyright © 2012 - 2022 Arba Minch University
        </footer>

    <script src="js/approve.js"></script>
    <script src="js/signature.js"></script>

    <script>
var dt = new Date();
document.getElementById('date-time').innerHTML=dt;
</script>

    <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>

</body>
</html>
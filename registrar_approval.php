  <?php      
    session_start();
    include 'dbconnect.php';
    mysqli_select_db($conn,$db_name);
    if(!isset($_SESSION['admin_logged_in'])){
      header("Location:index.php");
     }
    $manage_id=$_GET['manageid'];
    $reason=$_GET['reason'];
    $fullName=$_GET["fullName"];
    $ag=$_GET["ag"];
    $sx=$_GET["sx"];
    $dep=$_GET["dep"];
    $cly=$_GET["cly"];
    $ld=$_GET["ld"];
    $sem=$_GET["sem"];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <link rel="stylesheet" href="css/approval_form/registrar_approval.css">
    <link rel="stylesheet" href="css/approval_form/approval_smallScreen.css">
    <style>
      .main-container .right-side-container{
        width:100%;
        margin-top:0;
      }
      .infos label{
    margin-left: 10px;
    font-weight: bolder;
    font-size:12px;
     }
     .approval-form h3{
      text-align:center;
      font-size:14px;
     }
     .concerned-bodies h4{
    margin: 0px 0px 0px 0px;
    font-size:12px;
    background-color: bisque;
  }
  .personal-informations h4{
    font-size:12px;
  }
     .infos p{
    margin: 0px 0px 0px 0px;
    background-color: azure;
    backface-visibility: unset;
    padding: 0px;
}
      .right-side-container .approval-form{
        display:flex;
        width:100%;
        border:none;
        margin-top:0;
      }
      @media print{
        body *{
          visibility:hidden;
        }
        .left-side-container{
          display:none;
        }
        .approval-form, .approval-form *{
          width: 100%;
          margin:0;
          visibility:visible;
        }
        .approval-form img{
          width: 80px;
          height:80px;
        }
      }
      .infos p{
    margin: 0px;
    padding: 0;
    font-size:12px;
}
.main-container{
}
.attachement{
  display:flex;
  flex-direction:column;
  border:1px dotted gray;
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
            <p>Registrar Clearance approval process</p>
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
                <p><?php echo $manage_id; ?></p>
            </div>
            <div class="detail">
                <label for="id_num">Reason :</label>
                <p><?php echo $reason; ?></p>
            </div>
            <div class="status-detail attachement">
              <h3>Attachement</h3>
              <?php
              $sql_attach=mysqli_query($conn, "SELECT image FROM requests WHERE id='$manage_id'") or die(mysqli_error($conn));
              $rows_attach=mysqli_num_rows($sql_attach);
              if($rows_attach > 0){
                while($rows_attach = mysqli_fetch_assoc($sql_attach)){
                  $attachement=$rows_attach["image"];
                  echo "<img src='".$attachement."'  width=80% alt=No>";
                }
              }
              else{
                echo "<p style=color:red;>No attachement needed!</p>";
              }
              ?>
          </div>
            <h3>Approval Details</h3>
            <div class="detail allApprove">
                <label for="id_num">Department:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM department_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
                <label for="id_num">Library:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
                <label for="id_num">Laboratory:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
                <label for="id_num">Dormitory:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM dormitory_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
            <div class="detail allApprove">
                <label for="id_num">Sport:</label>
                <?php
                $library_query=mysqli_query($conn,"SELECT * FROM sport_final_approve_reject WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                  $rows=mysqli_num_rows($library_query);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($library_query)){
                      $status_msg=$rows["status"];
                    }
                }
                else{
                  $status_msg="Not approved yet !";
                }
                ?>
                <p><?php echo $status_msg; ?></p>
            </div>
          </div>
          <div class="approve-reject-buttons-container">
            <form method="POST" enctype="multipart/form-data">
            <input type="submit" name="regapprove" value="Approve">
             <?php
               if(isset($_POST["regapprove"])){
                $status_msg="Approved";
                $reg_query=mysqli_query($conn,"SELECT * FROM registrar_final_approve WHERE student_id='$manage_id' ") or die(mysqli_error($conn));
                $rows=mysqli_num_rows($reg_query);
                  $library_sql="SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id'";
                  $library_res=mysqli_query($conn,$library_sql) or die( mysqli_error($conn));
                  $library_rows=mysqli_num_rows($library_res);
                 
                  $lab_sql="SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id'";
                  $lab_res=mysqli_query($conn,$lab_sql) or die( mysqli_error($conn));
                  $lab_rows=mysqli_num_rows($lab_res);
                 
                  $dorm_sql="SELECT * FROM dormitory_final_approve_reject WHERE student_id='$manage_id' ";
                  $dorm_res=mysqli_query($conn,$dorm_sql) or die( mysqli_error($conn));
                  $dorm_rows=mysqli_num_rows($dorm_res);
                 
                  $dep_sql="SELECT * FROM department_final_approve_reject WHERE student_id='$manage_id' ";
                  $dep_res=mysqli_query($conn,$dep_sql) or die( mysqli_error($conn));
                  $dep_rows=mysqli_num_rows($dep_res);
                 
                  $sport_sql="SELECT * FROM sport_final_approve_reject WHERE student_id='$manage_id' ";
                  $sport_res=mysqli_query($conn,$sport_sql) or die( mysqli_error($conn));
                  $sport_rows=mysqli_num_rows($sport_res);
                  if($rows>0){
                    echo "<p style=color:red;>Already approved...</p>"; 
                  }
                  else if(( !$sport_rows>0 && !$library_rows>0 && !$lab_rows>0 && !$dorm_rows>0 && !$dep_rows>0 && !$sport_rows>0)){
                    echo "<p style=color:red;>The student has problem with all the staffs!!</p>"; 
                  }
                  else if(!$library_rows>0){
                    echo "<p style=color:red;>The student has some problem with library!!</p>"; 
                  }
                  else if(!$lab_rows>0){
                    echo "<p style=color:red;>The student has some problem with laboratory!!</p>"; 
                  }
                  else if(!$dorm_rows>0){
                    echo "<p style=color:red;>The student has some problem with dormitory!!</p>"; 
                  }
                  else if(!$dep_rows>0){
                    echo "<p style=color:red;>The student has some problem with department!!</p>"; 
                  }
                  else if(!$sport_rows>0){
                    echo "<p style=color:red;>The student has some problem with sport department!!</p>"; 
                  }
                  else{
                    $date = date('Y-m-d H:i:s');
                    $sql_regapprove=mysqli_query($conn,"INSERT INTO registrar_final_approve (student_id,status,date) VALUES('$manage_id','$status_msg','$date')") or die(mysqli_error($conn));
                    $sql_delete_request=mysqli_query($conn,"DELETE FROM requests WHERE id='$manage_id'") or die(mysqli_error($conn));
                    echo "<p style=color:green;>Clearance approved successfully...</p>";
                  }
                  
                } 
             ?>
            <input type="submit" name="regreject" value="reject" style="background-color: red;">
            <?php
               if(isset($_POST["regreject"])){
                $status_msg="Rejected";
                $sql_regapprove=mysqli_query($conn,"INSERT INTO registrar_final_rejected (student_id,status) VALUES('$manage_id','$status_msg')") or die(mysqli_error($conn));
                if($sql_regapprove){
                  echo "<p style=color:green;>Clearance rejected successfully...</p>";
                  
                } 
                else{
                  echo "<p style=color:red;>Clearance Not approved !!</p>";
                }
              }
             ?>
            </form>
          </div>
        </div>
        <div class="right-side-container">
            <div class="approval-form" id="approve">
               <img src="images/amu-logo.gif" width="100px" height="100px" alt="">
               <h3>ARBAMINCH UNIVERSITY</h3>
               <h3>STUDENT SERVICE CENTER</h3>
               <h3 style="font-weight: bold;">CLEARANCE/WITHDRAWAL FORM</h3>
               <div class="personal-informations">
                 <h4>PART I: PERSONAL INFORMATIONS</h4>
                  <div class="infos">
                    <label for="fullname">Full name</label>
                    <p id="fullname" ><?php echo $fullName; ?></p>
                  </div>
                  <div class="infos">
                    <label for="institute">Institute/college</label>
                    <p id="institute" >Arbaminch institute of technology</p>
                  </div>
                  <div class="infos">
                    <label for="dept">Department</label>
                    <p id="dept" ><?php echo $dep; ?></p>
                  </div>
                  <div class="infos">
                    <label for="classYear">Class year</label>
                    <p id="classYear" ><?php echo $cly; ?></p>
                  </div>
                  <div class="infos">
                    <label for="semester">Semester</label>
                    <p><?php echo $sem; ?></p>
                  </div>
                  <div class="infos">
                    <label for="lastDate">Last date class attended</label>
                    <p id="lastDate"><?php echo $ld; ?></p>
                  </div>
                  <div class="infos">
                    <label for="reason">Reason for withdrawal: (please attach evidence)</label>
                    <p><?php echo $reason; ?></p>
                  </div>
               </div>
               <div class="concerned-bodies">
                 <h4>PART II: CONCERNED BODIES</h4>
                 <h4>DEPARTMENT</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Amin Tuni Gura</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_dep_app=mysqli_query($conn,"SELECT * FROM department_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_dep_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_dep_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>LIBRARY</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Ayele Ancha Bacha</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_dep_app=mysqli_query($conn,"SELECT * FROM library_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_dep_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_dep_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>LABORATORY</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Solomon Feleke Fera</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_dep_app=mysqli_query($conn,"SELECT * FROM lab_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_dep_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_dep_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="80px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!!";
                    }
                    ?>
                 </div>
                 <h4>DORMITORY</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Markos Macha Manna</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_dep_app=mysqli_query($conn,"SELECT * FROM dormitory_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_dep_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_dep_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet";
                    }
                    ?>
                 </div>
                 <h4>SPORT</h4>
                 <div class="infos">
                    <label for="fullname">Full name</label>
                    <p>Kidane Amare Annie</p>
                    <label for="signature">Signature</label>
                    <?php
                    $sql_dep_app=mysqli_query($conn,"SELECT * FROM sport_final_approve_reject WHERE student_id='$manage_id'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_dep_app);
                    if($rows>0){
                      while ($rows=mysqli_fetch_assoc($sql_dep_app)){
                    ?>
                    <p><img src="<?php echo $rows['signature']; ?>" width="100px" height="10px" alt=""></p>
                    
                    <label for="date">Date</label>
                    <p><?php echo $rows['date']; ?></p>
                    <?php
                      }
                    }
                    else{
                      echo "Not signed yet!";
                    }
                    ?>
                 </div>
                 <h4>Registrar</h4>
                 <p style="font-size:12px; font-weight:bold;">NB: one copy for registrar,one copy for department, one copy for the student</p>
               </div>
            </div>
            <div class="print-buttons">
              <button id="print" onclick="window.print();">Print</button>
              <button id="cancel">cancel</button>
          </div>
        </div>
    </div>

    <script src="js/approve.js"></script>
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
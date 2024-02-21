<?php
session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['dep_logged_in'])){
  header("Location:index.php");
 }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/department/department_home_page.css">
    <link rel="stylesheet" href="css/department/departmentSmall_screen.css">

    <style media="screen">
      .dropdown-container{
        display: none;
        flex-direction: column;
        background-color: #1a162b;
        padding-left: 10px;
        transition: all .5s ease;
      }
      .icon{
        margin-left: 10px;
      }
      .fa-caret-down{
        float: right;
        padding-right: 8px;
      }
      .dropdown-button{
        text-decoration: none;
        text-align: center;
        font-size: 18px;
        margin-left: 10px;
        color: white;
        border: none;
        background: none;
        cursor: pointer;
        outline: none;
      }
      .dropdown-container a{
        margin: 10px;
      }
      .dropdown-container a:hover{
        color: orangered;
      }
      .table-of-record-container{
        margin-bottom:120px;
      }
      td, th {
      border: 2px solid #ddd;
      padding: 8px;
    }
    th{
      background: white;
      color: black;
    }
      footer{
        background: #1a162b;
        color: white;
        padding: 10px;
        text-align: center;
      }
      .popup-profile-container{
        top: 10;
        background-color: rgb(26, 32, 51);
      }
      .popup-profile-container label{
        color: white;
      }
      .popup-profile-container p{
        color: white;
        font-size: 20px;
        text-align: center;
        background-color: rgb(39, 50, 66);
        padding: 2px;
      }
      .view-request-top-title{
        background-color: rgb(32, 49, 48);
        color: white;
      }
      .material-lend-register .top-title{
        background-color: rgb(4, 48, 49);
        color: white;
      }

  form .form-row{
  width: 45%;
  float: left;
  display: flex;
  flex-direction: column;
  margin-left: 20px;
}
.material-lend-register form input[type="text"],input[type="date"]{
  width: 90%;
  padding: 12px;
  margin: 15px;
  font-size: 16px;
  border: 1px solid gray;
}
.material-lend-register form input[type="date"]{
  width:90%;
}
.material-lend-register form input[type="submit"]:hover{
  transform: scale(1.18);
  background-color: white;
  border: 1px solid black;
  color: black;
  cursor:pointer;
}
.material-lend-register label{
  font-weight: bold;
  font-size: 18px;
  margin-left:30px;
}
.material-lend-register form input[type="submit"]{
  width: 180px;
  border-radius: 10px;
  background-color: rgb(14, 32, 54);
  color: white;
  font-size: 18px;
  padding: 10px;
  margin: 20px;
  transition: 1s;
}

/* drop down in top */
.dropbtn {
    background-color: #3498DB;
    background-color: white;
    font-size: 16px;
    border: none;
    padding: 5pt;
    cursor: pointer;
  }
  
  .dropbtn:hover, .dropbtn:focus {
    cursor: pointer;background-color: #ddd;
  
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 200px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown a:hover {background-color: #ddd;}
  .show {display: block;}
.profile-cont img{
    border-radius: 50%;
}
.notifyNum{
  background-color:red;
  color:white;
  padding-left:6px;
  padding-right:6px;
  border-radius:50%;
  width:10%;
  height:50%;
  margin:0;
  font-size:16px;
  font-weight:bold;
  margin-left:20px;
}
    </style>
  </head>
  <body>
    <div class="container">
      <div class="sidebar-container" id="sidebar">
          <nav>
              <div class="logo">
                  <img src="images/amu-logo.gif" width="80px" height="80px" alt="No internet Connection">
                  <h1 style="color: white; font-weight:bolder; font-size:34px;">AMU</h1>
              </div>

              <ul class="side-bar-itmes">
                    <li class="list">
                      <a href="#dashboard">
                         <span class="icon"> <img src="icons/dashboard.png" width="20px" height="20px" alt=""> </span>
                         <span class="title">Dashboard</span>
                      </a>
                   </li>
                   <li class="list active">
                      <a href="#view-request">
                        <span class="icon"> <img src="icons/view1.png" width="20px" height="20px" alt=""> </span>
                         <span class="title">View Request</span>
                      </a>
                   </li>
                   <li>
                    <span class="icon"> <img src="icons/manage(copy).png" width="20px" height="20px" alt=""> </span>
                     <button type="button" class="dropdown-button" >Manage Property
                      <span class="icon"> <img src="icons/dropdown.png" width="18px" height="18px" alt=""> </span>
                     </button>
                     <div class="dropdown-container" id="dropdown-cont" style="flex-direction:column;">
                        <a href="#material-register">Record property</a>
                        <a href="#edit-delete-lend">Manage property</a>                       
                     </div>

                   </li>
              </ul>
          </nav>
      </div>
      <div class="main-home">
        <div class="top-container">
            <div class="menu-icon">
            <img src="icons/menu.png" class="openCloseIcon" alt="" width="40px" height="40px" onclick="toggleMenu()">
                  <img src="icons/menu.png" width="40px" height="40px" class="forSmall" alt="" onclick="toggleMenuSmallScreen()">
            </div>
            <div class="top-title" style="display: flex; flex-direction: column; align-items:center; justify-content:center;">
                <h1>Arbaminch university</h1>
                <p>students online clearance system - Department</p>

            </div>
            <div class="profile-cont">
            <img src="<?php echo $_SESSION['dept_image']; ?>" alt="" width="60px" height="60px">
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION ['department_u_name'];?>&#9660;</button>
                  <div id="myDropdown" class="dropdown-content">
                    <a href="#" onclick="profilePopup()">View profile</a>
                    <a href="#" onclick="changepwPopup()">Change password</a>
                    <a href="logout.php">Logout</a>
                  </div>
                </div>
            </div>
        </div>
        <div class="main-main-home">
          <a name="dashboard">
           <div class="dashboard-container">
            <h3>Dashboard</h3>
              <div class="dashboard">
                <img src="icons/student.png" width="30px" height="30px" alt="">
                <h4>Total Property lend</h4>
                <?php
                  $stmt="SELECT property_id FROM department_record ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
              </div>
              <hr>
              <div class="dashboard">
                <img src="icons/users.png" width="30px" height="30px" alt="">
                <h4>Total Students</h4>
                <?php
                  $stmt="SELECT id FROM student ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
              </div>
              <hr>
              <div class="dashboard">
                <img src="icons/request5.png" width="40px" height="40px" alt="">
                <h4>Total requests</h4>
                <?php
                  $stmt="SELECT id FROM request_department ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p><?php echo $row ?></p>
              </div>
              <hr>
              <div class="dashboard">
                <img src="icons/approveds.png" width="40px" height="40px" alt="">
                <h4>Approved request</h4>
                <?php
                  $stmt="SELECT student_id FROM department_final_approve_reject ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
              </div>
              <hr>
              <div class="dashboard">
                <img src="icons/rejcteduser.png" width="40px" height="40px" alt="">
                <h4>Rejected requests</h4>
                <?php
                  $stmt="SELECT student_id FROM department_rejected_requests ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
              </div>
              <hr>
           </div>
           <!-- for view request container -->
            <a name="view-request">
           <div class="view-request-container">
             <div class="view-request-top-title">
              <h3 style="margin-left: 10px;">Clearance requests</h3>
                <hr>
             </div>
             <?php
              $sql="SELECT * FROM request_department INNER JOIN student ON request_department.id = student.id";
                  $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                  $rows=mysqli_num_rows($res);
                  if($rows>0){
                    while ($rows=mysqli_fetch_assoc($res)){
                      $student_id=$rows["id"];
                      $reason=$rows["reason"];
                      $fullName=$rows["fullName"];
                      $date=$rows["date"];
                   ?>
                   <hr>
              <div class="requests">
                <img src="icons/requests.png" width="40px" height="40px" alt="">
                <p style="color:blue;"><?php echo $date; ?></p>
                <p>ID: <?php echo $student_id; ?></p>
                <p><?php echo $fullName; ?></p>
                <p>sent clearance request</p>
                <button>
                  <a href="department_approval.php?manageid=<?php echo $student_id; ?>&fullName=<?php echo $fullName; ?>&reason=<?php echo $reason; ?>">Manage</a>
                </button>
             </div>
             <hr>
             <?php
                    }
                    ?>
                    <?php
                }
                else{
                  echo "<h3 style=color:red;>No request found!</h3>";
                }
                ?>
           </div>
           <!-- manage propert-register material lend container -->
           <a name="material-register">
           <div class="material-lend-register">
               <div class="top-title">
                 <h1 style="margin:10px;">Record property Lend</h1>
               </div>
               <form class="registe-material" method="post" enctype="multipart/form-data">
               <div class="form-row">
                   <label for="property_id">Property ID</label>
                   <input type="text" name="property_id" required>
                   <label for="pr_name">Property name</label>
                   <input type="text" name="property_name" id="pr_name" required>
                   <label for="date_t">Date Taken</label>
                   <input type="date" name="date_t" value="" required>
                 </div>
                 <div class="form-row">
                   <label for="taken_by">Taken By:</label>
                   <input type="text" name="taken_by" value="" required>
                   <label for="student_id">Student ID</label>
                   <input type="text" name="student_id" required>
                   <label for="given_by">Given By</label>
                   <input type="text" name="given_by" value="<?php echo $_SESSION['dept_full_name']; ?>" required>
                 </div>
                 <input type="submit" name="register" value="Save">
                 <?php
                     if(isset($_POST["register"]))
                     {
                       $property_id=$_POST["property_id"];
                       $property_name=$_POST["property_name"];
                       $date_taken=$_POST["date_t"];
                       $taken_by=$_POST["taken_by"];
                       $student_id=$_POST["student_id"];
                       $given_by=$_POST["given_by"];
                               $sql2=mysqli_query($conn,"INSERT INTO department_record(property_id,property_name, date_taken, taken_by,student_id,given_by)
                               VALUES ('$property_id','$property_name','$date_taken','$taken_by','$student_id','$given_by')") or die(mysqli_error($conn));
                               if($sql2)
                               {
                                   echo "<i style='color:green'> Record Successfully added.. </i>";
                                  
                               }
                               else{
                                   echo "<i style='color:red'> Unable to register! </i>";
                               }
                              }
                    ?>
               </form>
           </div>
                      <!--Manage proprty container-->
                      <a name="edit-delete-lend">
                        <div class="edit-delete-material-lend-container">
                         <div class="top-h1-add-container">
                           <h3 style="margin: 10px;">Lists of property lend </h3>
                         </div>
                            <div class="table-of-record-container">
                              <div class="search-bar-container">
                                <form method="GET">
                                    <input type="search" name="search" placeholder="search">
                                    <button type="submit" name="search_btn">Search</button>  
                                  </form>
                                <i class="fa-solid fa-search"></i>
                                <a href="#material-register"><button>+Add new record</button></a>
                              </div>
                              <table border="1">
                              <th>Propery ID</th>
                              <th>Property name</th>
                              <th>Date Taken</th>
                              <th>Student name</th>
                              <th>Student ID</th>
                              <th>Given by</th>
                              <th>Action</th>
                              <?php
                              if(isset($_GET['search_btn'])){
                            $filterValues=$_GET["search"];
                            $query=mysqli_query($conn,"SELECT * FROM department_record WHERE CONCAT(property_name,student_id,taken_by) LIKE '%$filterValues%'") or die(mysqli_error($conn));
                            $rows_srch=mysqli_num_rows($query);
                            if($rows_srch>0){
                              while ($rows_srch=mysqli_fetch_assoc($query)){
                                $property_id=$rows_srch["property_id"];
                                $pr_name=$rows_srch["property_name"];
                                $date_tkn=$rows_srch["date_taken"];
                                $tkn_by=$rows_srch["taken_by"];
                                $stdnt_id=$rows_srch["student_id"];
                                $staff_name=$rows_srch["given_by"];
                                $table_name="department_record";
                                $header="department.php#edit-delete-lend";
                                ?>
                                <tr>
                                <td><?php echo $property_id; ?></td>
                                <td><?php echo $pr_name; ?></td>
                                <td><?php echo $date_tkn; ?></td>
                                <td><?php echo $tkn_by; ?></td>
                                <td><?php echo $stdnt_id; ?></td>
                                <td><?php echo $staff_name; ?></td>
                                <td>
                      <div class="edit-delete-btn" style="display: flex; flex-direction:column;
                      align-items: center;">
                      <a href="delete_record.php?deleteid=<?php echo $property_id; ?>&tn=<?php echo $table_name; ?>&sti=<?php echo $stdnt_id; ?>&hdr=<?php echo $header; ?>">
                        <button style="background-color: red; color:white;
                        border:none;
                        padding:6pt;
                        width: 80px;
                        border-radius: 4px;">delete
                        </button>
                        </a>
                      </div>
                    </td>
                   </tr>
                   <?php
                              }
                              ?>
                              
                         <?php
                            }
                            else{
                              echo "<p>record not found! </p>";
                            }
                          }
                          else{
                          ?>
                              <?php
                        $sql="SELECT * FROM department_record ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows>0){
                      while ($rows=mysqli_fetch_assoc($res)){
                        $property_id=$rows["property_id"];
                        $property_name=$rows["property_name"];
                        $date_given=$rows["date_taken"];
                        $taken_by=$rows["taken_by"];
                        $student_id=$rows["student_id"];
                        $given_by=$rows["given_by"];
                        $table_name="department_record";
                        $header="department.php#edit-delete-lend";
                   ?>
                              <tr>
                                <td><?php echo $property_id; ?></td>
                                <td><?php echo $property_name; ?></td>
                                <td><?php echo $date_given; ?></td>
                                <td><?php echo $taken_by; ?></td>
                                <td><?php echo $student_id; ?></td>
                                <td><?php echo $given_by; ?></td>
                                <td>
                      <div class="edit-delete-btn" style="display: flex; flex-direction:column;
                      align-items: center;">
                      <a href="delete_record.php?deleteid=<?php echo $property_id; ?>&tn=<?php echo $table_name; ?>&sti=<?php echo $student_id; ?>&hdr=<?php echo $header; ?>">
                        <button style="background-color: red; color:white;
                        border:none;
                        padding:6pt;
                        width: 80px;
                        border-radius: 4px;">delete
                        </button>
                      </a>
                      </div>
                    </td>
                   </tr>
                   <?php
                    }
                    ?>
                    <?php
                }
                else{
                    echo "No record found!";
                }
                ?>
                  <?php }
                      ?>
                  </table>
               </div>
           </div>
        </div>
      </div>
    </div>
    <div class="popup-profile-container" id="popup-profile">
      <div class="profile-container">
      <div class="profile-detail">
         <h1 style="text-align: center; color:orangered;">My Profile</h1>
          <hr>
        <div class="detail">
          <label for="firstnm">Full name :</label>
        <p id="firstnm"><?php echo $_SESSION['dept_full_name']; ?></p>
        </div>
        <hr>
        <div class="detail">
          <label for="dept">ID :</label>
          <p id="dept"><?php echo $_SESSION['dept_id']; ?></p>
        </div>
        <hr>
        <div class="detail">
          <label for="age">Age :</label>
          <p id="age"><?php echo $_SESSION['dept_ag']; ?></p>
        </div>
        <hr>
        <div class="detail">
          <label for="sex">Sex :</label>
          <p id="sex"><?php echo $_SESSION['dept_sx']; ?></p>
        </div>
        <hr>
        <div class="detail">
          <label for="year">Qualification :</label>
          <p id="year"><?php echo $_SESSION['dept_qualification']; ?></p>
        </div>
        <hr>
         <div class="detail">
          <label for="academic">Position :</label>
          <p id="academic"><?php echo $_SESSION['dept_position']; ?></p>
         </div>
      </div>
      <div class="profile-picture-container">
          <div class="profile-picture-bg">
          <?php
             $sql="SELECT * FROM staff WHERE username='".$_SESSION['department_u_name']."' ";
              $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
              $rows=mysqli_num_rows($res);
              if($rows>0){
                while ($rows=mysqli_fetch_assoc($res)){
                  $image=$rows["im_age"];
               ?>
               <img src="<?php echo $image; ?>" alt="no internet connection"><br>
              <?php
        }
           ?>
          <?php
      }
      else{
          echo "Image not found!";
      }
      ?>
          </div>
          <p style="color: orangered; font-size:20px; margin-top:10px;">Profile picture</p>
      </div>
  </div>
      <div class="buttons">
          <button
          style="border: none;
          padding: 10pt;
          background-color: red;
          border-radius: 10px;"
          onclick="profilePopupClose()" >Close</button>
      </div>
  </div>
  <div class="popup-change-password-container" id="changepw">
      <div class="cp-title-above">
          <h1>Change Password</h1>
      </div>
      <div class="change-pw-form-container">
        <form method="POST" enctype="multipart/form-data">
          <label for="oldpw">Current Password</label>
          <input type="password" name="old_pw" id="oldpw"><br>
          <label for="newpw">New Password</label>
          <input type="password" name="new_pw" id="newpw"><br>
          <label for="confirmpw">Confirm new Password</label>
          <input type="password" name="confirmpw" id="confirmpw"><br>
           <div class="changepw-buttons">
              <input type="submit" name="change_pw" id="submit" value="Change" style="background-color: #1a162b;">
              <?php
                  if(isset($_POST["change_pw"])){
                    $old_password=md5($_POST["old_pw"]);
                    $new_password=md5($_POST["new_pw"]);
                    $confirm_password=md5($_POST["confirmpw"]);
                    $sql_change_password=mysqli_query($conn,"SELECT * FROM login WHERE username='".$_SESSION['department_u_name']."'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_change_password);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($sql_change_password)){
                          $old_pw=$rows["password"];
                        if($new_password==$confirm_password && $old_password == $old_pw){
                          $sql_change=mysqli_query($conn,"UPDATE login SET password='$new_password' WHERE username='".$_SESSION['department_u_name']."' ") or die(mysqli_error($conn));
                          echo "<i style=color:green;>password changed successfully.....</i>";
                        }
                      else{
                        echo "<i style=color:red;>Password does not match!!</i>";
                      }
                    }
                  }
                }
                  ?>
             <input type="button" name="cancel" value="Cancel" onclick="changepwPopupClose()" style="background-color: red;">
             </form>
            </div>
      </div>
  </div>
    <footer>
    Copyright © 2012 - 2022 Arba Minch University
    </footer>

    <script src="js/top_dropdown.js"></script>
    <script type="text/javascript">
      var sideBar=document.getElementById("sidebar");
      sideBar.style.maxWidth="20%";
     // var mainHome=document.getElementById("main-home");
      function toggleMenu(){
        if(sideBar.style.maxWidth=="20%"){
         sideBar.style.maxWidth="0px";

        }else{
         sideBar.style.maxWidth="20%";
         sideBar.style.display="flex";
        }
      }
      function toggleMenuSmallScreen(){
        if(sideBar.style.maxHeight=="0px"){
         sideBar.style.maxHeight="100vh";
         sideBar.style.maxWidth="100%";
         sideBar.style.display="flex";

        }else{
         sideBar.style.maxHeight="0px";
        }
      }

    </script>
    <script type="text/javascript">
      function dropdownList(){
          var dropdown=document.getElementById("dropdown-cont");
        if(dropdown.style.display="none"){
          document.getElementById('dropdown-cont').style.display="flex";
        }
        else {
        dropdown.style.display="none";
        }
      }
    </script>
    <script>
var dropdown = document.getElementsByClassName("dropdown-button");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "flex") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "flex";
    }
  });
}
</script>
<script type="text/javascript">
    function profilePopup(){
    var popupProfile=document.getElementById("popup-profile");
      if(popupProfile.style.display="none"){
        popupProfile.style.display="flex";
      }
     }
     function changepwPopup(){
    var popupProfile=document.getElementById("changepw");
      if(popupProfile.style.display="none"){
        popupProfile.style.display="flex";
      }
     }
  function profilePopupClose(){
      document.getElementById("popup-profile").style.display="none";
  }
  function changepwPopupClose(){
    document.getElementById("changepw").style.display="none";
  }
  function healthProblem(){
    var reason=document.getElementById("withdrawal-reason").value;

    switch (reason) {
      case "00":
         document.getElementById("healthProblem").style.display="none";
        break;
        case "01":
         document.getElementById("healthProblem").style.display="none";
         break;
        case "02":
          document.getElementById("healthProblem").style.display="none";
           break;
        case "03":
          document.getElementById("healthProblem").style.display="none";
           break;
        case "04":
             document.getElementById("healthProblem").style.display="flex";
              break;
        case "05":
             document.getElementById("healthProblem").style.display="none";
           break;
        case "06":
            document.getElementById("healthProblem").style.display="none";
          break;
      default:

    }
  }

 </script>
 
 <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>
  </body>
</html>

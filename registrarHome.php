<?php
 session_start();
 include 'dbconnect.php';
 mysqli_select_db($conn,$db_name);
 if(!isset($_SESSION['admin_logged_in'])){
  header("Location:index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="css/registrar_sidebar.css">
    <link rel="stylesheet" href="css/smallScreen.css">
    <link rel="stylesheet" href="css/registrarHome.css">
    <style>
       .appr-buttons input{
           width: 120px;
           padding: 10px;
           margin: 20px;
           font-size: 18px;
           background-color: white;
           border: 1px solid black;
       }
       .appr-buttons input:hover{
           transform: scale(1.18);
           background-color: rgb(8, 231, 8);
           color: white;
           transition: all 1.1s ease;
       }
       .health-problem #attach{
           width: 120px;
           background-color: orangered;
           padding: 10px;
           font-size: 18px;
           font-weight: bold;
           margin: 20px;
           border: none;
           color: white;
           border-radius: 10px;
       }
       .footer-container footer{
         background: #312F3A;
         color: white;
         text-align: center;
         padding-top: 20px;
         padding-bottom: 20px;         bottom: 0;
         
       }
       td, th {
      border: 2px solid #ddd;
      padding: 8px;
    }
    th{
      background: white;
      color: black;
    }
    .create-account-dashboard-container hr{
      width: 10px;
      height: 120px;
      color: red;
      background-color:orangered;
      margin-top: 30px;
    }
    .success-popup-container{
      position: absolute;
      top: 0;
      left: 50%;
      z-index: 99;
      width: 40%;
      background-color: rgb(238, 215, 235);
      box-shadow: 1px 1px 1px 1px gray;
      margin: auto;
      flex-direction: column;
      visibility: hidden;
      transition: transform 0.4s, top 0.4s;
      padding: 20px;
      text-align: center;
      transform: translate(-50%, -50%) scale(0.1);
    }
    .open-popup{
      visibility: visible;
      top: 50%;
     transform: translate(-50%, -50%) scale(1);
  }
    .success-popup-container p{
      font-size: 18px;
      margin-bottom: 10px;
    }
    .success-popup-container input{
      width: 60%;
      margin: auto;
      padding: 8pt;
      font-size: 18px;
      border: none;
      color: white;
      border-radius: 10px;
      background-color: blue;
    }
    input,select{
      border: 1px solid rgb(206, 207, 207);
      padding:6pt;
    }
    hr{
      border: 1px solid rgb(206, 207, 207);
    }
    .search-bar-container button{
      border:none;
      padding:6pt;
      margin:0;
      background-color:blue;
      color:white;
      font-size:16px;
      border-radius:5px;
    }
    .search-bar-container button:hover{
      transform:scale(1.08);
      cursor:pointer;
      transition:1s;
    }
    .staff-account-side input[type="submit"]{
      background-color:white;
      border :1px solid black;
      font-size:16px;
      font-weight:bold;
      border-radius:5px; 
    }
    .staff-account-side input[type="submit"]:hover{
      background-color:black;
      color:white;
      transition:1s;
      cursor:pointer;
    }
    .change-pw-form-container input{
      border: 1px solid rgb(206, 207, 207);
      padding:6pt;
      border-radius:5px;
      background-color:white;
    }
    .registrar-dashboard-container .registrar-dashboard:hover{
      background-color:gray;
      color:white;
      cursor: pointer;
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
                          <a href="#home">
                             <span class="icon"> <img src="icons/dashboard.png" width="20px" height="20px" alt=""> </span>
                             <span class="title">Dashboard</span>
                          </a>
                       </li>
                       <li class="list active">
                          <a href="#viewRequest">
                            <span class="icon"> <img src="icons/view1.png" width="20px" height="20px" alt=""> </span>
                             <span class="title">View Request</span>
                          </a>
                       </li>
                       <li>
                        <span class="icon"> <img src="icons/manage(copy).png" width="20px" height="20px" alt=""> </span>
                         <button type="button" class="dropdown-button" >Users
                          <span class="icon"> <img src="icons/dropdown.png" width="18px" height="18px" alt=""> </span>
                         </button>
                         <div class="dropdown-container" id="dropdown-cont" style="flex-direction:column;">
                            <a href="#createAccount">Create user account</a>                      
                         </div>
                       </li>
                       <li class="list active">
                        <a href="#student-profile">
                          <span class="icon"> <img src="icons/student.png" width="20px" height="20px" alt=""> </span>
                           <span class="title">Students</span>
                        </a>
                     </li>
                     <li class="list active">
                      <a href="#staff-profile">
                        <span class="icon"> <img src="icons/users.png" width="20px" height="20px" alt=""> </span>
                         <span class="title">Staffs</span>
                      </a>
                   </li>
                </ul>
            </nav>
        </div>
        <div class="main-home" id="main-home">
            <div class="top-container">
                <div class="menu-icon" style="margin-left: 10px;">
                  <label for="close" id="lbl" class="openCloseIcon" onclick="toggleMenu()">
                    <img src="icons/menu.png" width="40px" height="40px" alt="">
                  </label>
                    <div class="smallScreen-Menu-icon">
                      <img src="icons/menu.png" width="40px" height="40px" alt="" onclick="toggleMenuSmallScreen()">
                    </div>
                </div>
                <div class="top-title" style="display: flex; flex-direction: column; align-items:center; justify-content:center;">
                    <h1>Arbaminch University</h1>
                    <p>Students online clearance system - Registrar</p>
                </div>
                <div class="profile-cont">
                    <img src="images/avatar.jpg" alt="" width="60px" height="60px">
                    <div class="dropdown">
                      <button onclick="myFunction()" class="dropbtn"><?php echo $_SESSION['admin_u_name'];?>&#9660;</button>
                      <div id="myDropdown" class="dropdown-content">
                        <a href="#" onclick="profilePopup()">View profile</a>
                        <a href="#" onclick="changepwPopup()">Change password</a>
                        <a href="logout.php">Logout</a>
                      </div>
                    </div>
                </div>
            </div>
            <div class="homeDetails-container">
              <a name="home">
                <div class="registrar-dashboard-container">
                    <div class="registrar-dashboard">
                      <img src="icons/student.png" width="40px" height="40px" alt="">
                      <h4>Total Students Registered</h4>
                      <?php
                  $stmt="SELECT id FROM student ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/request4.png" width="40px" height="40px" alt="">
                      <h4>Total Requests</h4>
                      <?php
                  $stmt="SELECT id FROM requests ORDER BY id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p><?php echo $row ?></p>
                    </div>
                    <hr>
                    <?php
                    $table_name="registrar_final_approve";
                    ?>
                    <a href="approved_requests.php?tn=<?php echo $table_name; ?>">
                    <div class="registrar-dashboard">
                      <img src="icons/approveds.png" width="40px" height="40px" alt="">
                      <h4>Total Cleared Students</h4>
                      <?php
                $stmt="SELECT student_id FROM registrar_final_approve ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    </a>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/rejcteduser.png" width="40px" height="40px" alt="">
                      <h4>Total rejected Students </h4>
                      <?php
                  $stmt="SELECT student_id FROM registrar_final_rejected ORDER BY student_id";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                    <div class="registrar-dashboard">
                      <img src="icons/users.png" width="40px" height="40px" alt="">
                      <h4>Total staffs </h4>
                      <?php
                $stmt="SELECT username FROM staff ORDER BY username";
                  $res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                  $row=mysqli_num_rows($res);
                  ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                    <hr>
                </div>
                <!-- Registrar view request container-->
                <a name="viewRequest">
                <div class="registrar-view-request-container">
                  <div class="view-request-top-title">
                    <h3 style="margin-left: 10px;">Clearance requests</h3>
                    <hr>
                 </div>
                 <?php
                 $sql="SELECT * FROM requests INNER JOIN student ON requests.id = student.id";
                     $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                     $rows=mysqli_num_rows($res);
                     if($rows>0){
                       while ($rows=mysqli_fetch_assoc($res)){
                        $student_id=$rows["id"];
                        $reason=$rows["reason"];
                        $fullName=$rows["fullName"];
                        $ag=$rows["age"];
                        $sx=$rows["sex"];
                        $department=$rows["department"];
                        $class_year=$rows["class_year"];
                        $semester=$rows["semester"];
                        $last_date=$rows["last_date"];
                        $date=$rows["date"];

                      ?>
                      <hr>
                 <div class="requests">
                   <img src="icons/requests.png" width="40px" height="40px" alt="">
                   <p style="color:blue;"><?php echo $date; ?></p>
                   <p>ID: <?php echo $student_id; ?></p>
                   <p style="font-weight:bold;"><?php echo $fullName; ?></p>
                   <p style="color:red;">sent clearance request</p>
                   <button>
                     <a href="registrar_approval.php?manageid=<?php echo $student_id; ?>&fullName=<?php echo $fullName; ?>&reason=<?php echo $reason; ?>&ag=<?php echo $ag; ?>&sx=<?php echo $sx; ?>&dep=<?php echo $department; ?>&cly=<?php echo $class_year; ?>&sem=<?php echo $semester; ?>&ld=<?php echo $last_date; ?>">Manage</a>
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
                <!-- Create user account container-->
                <a name="createAccount">
                <div class="create-user-account-container">
                   <div class="top-container-registrar">
                    <h1>Create user account</h1>
                   </div>
                   <div class="create-account-dashboard-container">
                    <div class="create-account-dashboard">
                       <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Students</h4>
                       <?php
                       $stmt="SELECT id FROM student ORDER BY id";
                        $res_stdnt=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                        $row_stdnt=mysqli_num_rows($res_stdnt);
                        ?>
                  <p> <?php echo $row_stdnt; ?> </p>
                    </div>
                    <hr>
                    <div class="create-account-dashboard">
                      <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Staff</h4>
                      <?php
                       $stmt="SELECT username FROM staff ORDER BY username";
                        $staff_res=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
                        $row_staff=mysqli_num_rows($staff_res);
                        ?>
                  <p> <?php echo $row_staff; ?> </p>
                    </div>
                    <hr>
                    <div class="create-account-dashboard">
                      <img src="icons/approve.png" width="30px" height="30px" alt="">
                       <h4>Total Users</h4>
                       <?php
                        $row=$row_stdnt + $row_staff;
                        ?>
                  <p> <?php echo $row; ?> </p>
                    </div>
                   </div>
                   <h2 style="margin-left: 10px;">Please select user to create account</h2>
                   <div class="user-account-select">
                    <label for="account">Select user</label>
                    <select name="account" id="account" onchange="createAccountForm()">
                      <option value="00">Select</option>
                      <option value="01">Student Registration</option>
                      <option value="02">Create Staff Account</option>
                    </select>
                   </div>
                   <div class="student-account" id="studentAccount">
                    <p>Create student account</p>           
                     <form method="POST" enctype="multipart/form-data">
                      <div class="student-account-side">
                        <label for="fName">Full Name</label>
                        <input type="text" name="fullName" id="fName" required><br>
                        <label for="st_id">ID</label>
                        <input type="text" name="student_id" id="st_id" required><br>
                        <label for="ag">Age</label>
                        <input type="text" name="age" id="ag" required><br>
                        <label for="sx">Sex</label>
                        <select name="sex" id="sx" style="margin-bottom:20px;">
                          <option value="select sex">Select sex</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                        <label for="dpt">Department</label>
                        <select name="dept" id="dpt">
                          <option value="select">Select</option>
                          <option value="IT">IT</option>
                          <option value="Software">Software</option>
                          <option value="Computer science">Computer Science</option>
                          <option value="Mechanical engineering">Mechanical engineering</option>
                          <option value="Irrigation engineering">Irrigationengineering</option>
                          <option value="Hydraulic engineering">Hydraulic engineering</option>
                          <option value="Architecture and Urban plannig">Architecture and urban plannning</option>
                          <option value="Civil engineering">Civil engineering engineering</option>
                        </select><br>
                      </div>
                      <hr>
                      <div class="student-account-side">
                      <label for="cls_year">Class year</label>
                        <input type="year" name="class_year" id="cls_year" required><br>
                        <label for="sem">Semester</label>
                         <select name="semester" id="sem" style="margin-bottom:20px;">
                          <option value="select">Select semester</option>
                          <option value="I">I</option>
                          <option value="II">II</option>
                          <option value="III">III</option>
                         </select>
                        <label for="last_date" style="margin-top:30px;">Last date class attended</label>
                        <input type="date" name="last_date" id="last_date" required><br>
                        <label for="password">Password</label>
                        <input type="password" name="pword" id="password" required><br>
                        <label for="image">Image</label>
                         <div class="profile-pic" style="display: flex;">
                          <input type="file" name="pimage" id="upload_button">
                          <img src="images/avatar.jpg" id="chosen_image" width="80px" height="80px">
                         </div>
                        <input type="submit" name="registerStudent" value="Register">
                         <?php
                         if(isset($_POST["registerStudent"])) {
                          $fullName=$_POST["fullName"];
                          $id_number=$_POST["student_id"];
                          $age=$_POST["age"];
                          $sex=$_POST["sex"];
                          $department=$_POST["dept"];
                          $class_year=$_POST["class_year"];
                          $semester=$_POST["semester"];
                          $last_date=$_POST["last_date"];
                          $password=md5($_POST["pword"]);
                          $role="student";
                          //session variables

                          
                          if(isset($_FILES['pimage'])){
                          $photo_name = $_FILES["pimage"]["name"];
                          $photo_loc = $_FILES["pimage"]["tmp_name"];
                          $profile="uploads/".basename($photo_name);
                          if(move_uploaded_file($photo_loc,$profile)){
                          $sql2=mysqli_query($conn,"INSERT INTO student(fullName,id,age,sex,department,class_year,semester,last_date,pass_word,st_image)
                          VALUES ('$fullName','$id_number','$age','$sex','$department','$class_year','$semester','$last_date','$password','$profile')") or die(mysqli_error($conn));
                          $sql3=mysqli_query($conn,"INSERT INTO login(username,password,role) VALUES('$id_number','$password','$role')");
                         if($sql2 && $sql3) {
                              echo "<i style=color:green; font-weight:bold;> Successfully Registered! </i>";

                          }
                          else{
                              echo "<i style='color:red'> Unable to register! </i>";
                          }
                        }
                        else{
                          echo "<i style='color:red'> Unable to upload image! </i>";
                        }
                    }else{
                      echo "<p style=color:red;>image not found!</p>";
                     }
                    }
                          ?>
                      </div>
                     </form>
                   </div>
                   <div class="staff-account" id="staffAccount">
                    <p>Create staff account</p>
                    <form method="POST" enctype="multipart/form-data">
                      <div class="staff-account-side">
                      <label for="fullName">Full Name</label>
                        <input type="text" name="fullName" id="fullName" required><br>
                        <label for="age">Age</label>
                        <input type="text" name="age" id="ag" required><br>
                        <label for="sex">Sex</label>
                         <select name="sex" id="sx" required>
                           <option value="select sex">Select</option>
                           <option value="male">Male</option>
                           <option value="female">Female</option>
                         </select><br><br>
                         <label for="qualification">Qualification</label>
                        <input type="text" name="qualification" id="qualify">
                      </div>
                      <hr>
                      <div class="staff-account-side">
                        <label for="position">Position</label>
                         <select name="position" id="pos" required>
                           <option value="Not selected">select</option>
                           <option value="Department head">Department head</option>
                           <option value="Librarian">Librarian</option>
                           <option value="Lab assistant">Lab Assistant</option>
                           <option value="Sport head">Sport head</option>
                           <option value="Dormitory">Dormitory</option>
                         </select><br><br>
                         <label for="uname">Staff ID/Username</label>
                         <input type="text" name="username" id="username" required><br>
                        <label for="pword">Password</label>
                        <input type="password" name="password" id="pword" required><br>
                        <label for="staff_image">Image</label>
                         <div class="profile-pic" style="display: flex;">
                          <input type="file" name="pimage" id="upload_btn">
                          <img src="images/avatar.jpg" id="chosen_img" width="80px" height="80px">
                         </div>
                        <input type="submit" name="staffRegister" value="Create" onclick="openSuccessPopup()">
                        <?php
                        if(isset($_POST["staffRegister"])) {
                          $fullName=$_POST["fullName"];
                          $age=$_POST["age"];
                          $sex=$_POST["sex"];
                          $qualification=$_POST["qualification"];
                          $position=$_POST["position"];
                          $username=$_POST["username"];
                          $password=md5($_POST["password"]);
                     
                            if(isset($_FILES['pimage'])){
                          $photo_name = $_FILES["pimage"]["name"];
                          $photo_loc = $_FILES["pimage"]["tmp_name"];
                          $profile="uploads/".basename($photo_name);
                          if(move_uploaded_file($photo_loc,$profile)){
                              $sql2=mysqli_query($conn,"INSERT INTO staff(fullName,age,sex,qualification,position,username,pass_word,im_age)
                              VALUES ('$fullName','$age','$sex','$qualification','$position','$username','$password','$profile')") or die(mysqli_error($conn));
                             $sql3=mysqli_query($conn,"INSERT INTO login(username,password,role) VALUES('$username','$password','$position')");
                             if($sql2 && $sql3){
                                  echo "<p style=color:green;>Successfully registered...</p>";
                                  echo "<script>";
                                  echo "openSuccessPopup()";
                                  echo "</script>";
                              }
                              else{
                                echo "<i style=color:red;>Unable to register!!</i>";
                              }
                        }else{
                          echo "<i style=color:red;>There is some problem in image upload!!!</i>";
                         }
                        }
                        else{
                          echo "<i style='color:red'> image not found! </i>";
                        }
                       }
                         ?>
                      </div>
                     </form>
                  </div>
                </div>
                <a name="student-profile">
                  <div class="view-student-profile-container">
                    <h3 style="margin: 10px;">Students profile</h3>
                    <div class="search-bar-container">
                      <form method="GET">
                      <input type="search" name="search" placeholder="search">
                       <button type="submit" name="search_btn">Search</button>
                       </form>
                    </div>
                    <div class="view-student-profile-tables-container">
                      <div class="student-table-container">
                         <table border="1">
                          <th>Full name</th>
                          <th>ID</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>Department</th>
                          <th>Actions</th>
                          <?php
                          if(isset($_GET['search_btn'])){
                            $filterValues=$_GET["search"];
                            $query=mysqli_query($conn,"SELECT * FROM student WHERE CONCAT(fullName,id) LIKE '%$filterValues%'") or die(mysqli_error($conn));
                            $rows_srch=mysqli_num_rows($query);
                            if($rows_srch>0){
                              while ($rows_srch=mysqli_fetch_assoc($query)){
                                $fN=$rows_srch["fullName"];
                                $st_id=$rows_srch["id"];
                                $age=$rows_srch["age"];
                                $sex=$rows_srch["sex"];
                                $department=$rows_srch["department"];
                                $class_year=$rows_srch["class_year"];

                                ?>
                                <tr>
                            <td><?php echo $rows_srch["fullName"]; ?></td>
                            <td><?php echo $rows_srch["id"]; ?></td>
                            <td><?php echo $rows_srch["age"]; ?></td>
                            <td><?php echo $rows_srch["sex"]; ?></td>
                            <td><?php echo $rows_srch["department"]; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_student_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&dep=<?php echo $department; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_student_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&dep=<?php echo $department; ?>&sx=<?php echo $sex; ?>&ld=<?php echo $last_date; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              <button style="background-color: red;">delete</button>
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
                        $sql="SELECT * FROM student ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows>0){
                      while ($rows=mysqli_fetch_assoc($res)){
                        $fullName=$rows["fullName"];
                        $id_number=$rows["id"];
                        $sex=$rows["sex"];
                        $age=$rows["age"];
                        $department=$rows["department"];
                        $class_year=$rows["class_year"];
                        $last_date=$rows["last_date"];
                       ?>

                          <tr>
                            <td><?php echo $fullName; ?></td>
                            <td><?php echo $id_number; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $department; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_student_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&dep=<?php echo $department; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_student_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&dep=<?php echo $department; ?>&sx=<?php echo $sex; ?>&ld=<?php echo $last_date; ?>&cy=<?php echo $class_year; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              <button style="background-color: red;">delete</button>
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
                  <a name="staff-profile">
                  <div class="view-staff-profile-container">
                    <h3 style="margin: 10px;">Staffs profile</h3>
                    <div class="search-bar-container">
                      <form method="GET">
                      <input type="search" name="search" placeholder="search">
                      <button type="submit" name="staff_search_btn">Search</button>
                      </form>
                    </div>
                    <div class="view-staff-profile-tables-container">
                      <div class="staff-table-container">
                         <table border="1">
                          <th>Full name</th>
                          <th>ID</th>
                          <th>Age</th>
                          <th>Sex</th>
                          <th>Position</th>
                          <th>Actions</th>
                          <?php
                          if(isset($_GET['staff_search_btn'])){
                            $filterValues=$_GET["search"];
                            $stf_query=mysqli_query($conn,"SELECT * FROM staff WHERE CONCAT(fullName,username) LIKE '%$filterValues%'") or die(mysqli_error($conn));
                            $rows_stf_srch=mysqli_num_rows($stf_query);
                            if($rows_stf_srch>0){
                              while ($rows_stf_srch=mysqli_fetch_assoc($stf_query)){
                                $fN=$rows_stf_srch["fullName"];
                                $st_id=$rows_stf_srch["username"];
                                $age=$rows_stf_srch["age"];
                                $sex=$rows_stf_srch["sex"];
                                $qualn=$rows_stf_srch["qualification"];
                                $posn=$rows_stf_srch["position"];

                                ?>
                                <tr>
                            <td><?php echo $fN; ?></td>
                            <td><?php echo $st_id; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $posn; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_staff_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ql=<?php echo $qualn; ?>&ps=<?php echo $posn; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);">
                              <a href="view_staff_data.php?fn=<?php echo $fN; ?>&idn=<?php echo $st_id; ?>&ag=<?php echo $age; ?>&ql=<?php echo $qualn; ?>&sx=<?php echo $sex; ?>&ps=<?php echo $posn; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              <button style="background-color: red;">delete</button>
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
                        $sql="SELECT * FROM staff ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows>0){
                      while ($rows=mysqli_fetch_assoc($res)){
                        $fullName=$rows["fullName"];
                        $id_number=$rows["username"];
                        $sex=$rows["sex"];
                        $age=$rows["age"];
                        $position=$rows["position"];
                        $qualification=$rows["qualification"];
                       ?>

                          <tr>
                          <td><?php echo $fullName; ?></td>
                            <td><?php echo $id_number; ?></td>
                            <td><?php echo $age; ?></td>
                            <td><?php echo $sex; ?></td>
                            <td><?php echo $position; ?></td>
                            <td>
                              <button style="background-color: blue;">
                              <a href="update_staff_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ql=<?php echo $qualification; ?>&ps=<?php echo $position; ?>" style="text-decoration:none;color:white;">edit</a> 
                              </button>
                              <button style="background-color: rgb(11, 160, 160);" onclick="viewStaffProfile()">
                              <a href="view_staff_data.php?fn=<?php echo $fullName; ?>&idn=<?php echo $id_number; ?>&ag=<?php echo $age; ?>&sx=<?php echo $sex; ?>&ql=<?php echo $qualification; ?>&ps=<?php echo $position; ?>" style="text-decoration:none;color:white;">view</a> 
                              </button>
                              <button style="background-color: red;">delete</button>
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
                <?php
                 }
                ?>
                         </table>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="popup-profile-container" id="popup-profile">
        <div class="profile-detail">
          <h1 style="text-align: center; color:orangered;">My Profile</h1>
          <hr>
          <div class="detail">
            <label for="firstnm">Username :</label>
          <p id="firstnm"><?php echo $_SESSION['admin_u_name']; ?></p>
          </div>
          <hr>
    </div>
        <div class="buttons">
            <button
            style="border: none;
            padding: 10pt;
            background-color: orangered;
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
            <input type="password" name="old_pw" id="oldpw" required><br>
            <label for="newpw">New Password</label>
            <input type="password" name="new_pw" id="newpw" required><br>
            <label for="confirmpw">Confirm new Password</label>
            <input type="password" name="confirmpw" id="confirmpw" required><br>
             <div class="changepw-buttons">
                <input type="submit" name="change_pw" id="submit" value="Change" style="background-color: rgb(15, 150, 15);">
                  <?php
                  if(isset($_POST["change_pw"])){
                    $old_password=md5($_POST["old_pw"]);
                    $new_password=md5($_POST["new_pw"]);
                    $confirm_password=md5($_POST["confirmpw"]);
                    $sql_change_password=mysqli_query($conn,"SELECT * FROM login WHERE username='".$_SESSION['admin_u_name']."'") or die(mysqli_error($conn));
                    $rows=mysqli_num_rows($sql_change_password);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($sql_change_password)){
                          $old_pw=$rows["password"];
                        if($new_password==$confirm_password && $old_password == $old_pw){
                          $sql_change=mysqli_query($conn,"UPDATE login SET password='$new_password' WHERE username='".$_SESSION['admin_u_name']."' ") or die(mysqli_error($conn));
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

 <!-- Success popup container-->
     <div class="success-popup-container" id="success-popup">
       <img src="icons/right.png" width="100px" height="100px" alt="">
       <p>User successfully registered...</p>
       <input type="submit" name="ok" value="Ok" onclick="closeSuccessPopup()">
     </div>

    <div class="footer-container">
        <footer>
            Copyright © 2012 - 2022 Arba Minch University
        </footer>
    </div>

    <script src="js/image_review.js"></script>
    <script src="js/top_dropdown.js"></script>
    <script src="js/staff_image_preview.js"></script>
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
    <script>
     var sideBar=document.getElementById("sidebar");
     var mainHome=document.getElementById("main-home");
     sideBar.style.maxWidth ="20%";
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
        sideBar.style.maxHeight="100%";
        sideBar.style.maxWidth="100%";
        sideBar.style.display="block";

       }else{
        sideBar.style.maxHeight="0px";
       }
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
     function createAccountForm(){
      var accountType=document.getElementById("account").value;
      switch(accountType){
        case "00":
        document.getElementById("studentAccount").style.display="none";
          document.getElementById("staffAccount").style.display="none";
          break;
          case "01":
          document.getElementById("studentAccount").style.display="block";
          document.getElementById("staffAccount").style.display="none";
          break;
          case "02":
          document.getElementById("staffAccount").style.display="block";
          document.getElementById("studentAccount").style.display="none";
          break;
          default:
            break;
      }
     }
    </script>
    <script src="js/edit_profile.js"></script>
    <script src="js/view_profile.js"></script>
    <script>
      var successPopupOpen=document.getElementById("success-popup");
      function openSuccessPopup(){
        successPopupOpen.classList.add('open-popup');
      }
      function closeSuccessPopup(){
      successPopupOpen.classList.remove('open-popup');
      }
    </script>

  <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>

<script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>
</body>
</html>
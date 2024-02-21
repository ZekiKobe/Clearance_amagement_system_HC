<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online student clearance system Homepage</title>
    <link rel="stylesheet" href="css/indexLogin.css">
    <link rel="stylesheet" href="css/login_page.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body style="background-image:url('images/dep.jpg')">
    <nav>
        <div class="logo">
            <img src="images/amu-logo.gif" alt="no internet connection">
        </div>
        <div class="top-texts">
            <h1>Arba Minch University</h1>
            <p>STUDENTS ONLINE CLEARANCE SYSTEM</p>
        </div>
        <ul>
            <li><a href="#" onclick="openLoginForm()">Login</a></li>
        </ul>
    </nav>
 <div class="main-container">
    <div class="mission-container">
        <h1>AMU Mission</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptates autem sequi, perspiciatis ea repellat minus 
            vero quae, facere eveniet omnis ducimus doloribus itaque? 
            Dignissimos maxime quo, a quam cupiditate fugit.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptates autem sequi, perspiciatis ea repellat minus 
            vero quae, facere eveniet omnis ducimus doloribus itaque? 
            Dignissimos maxime quo, a quam cupiditate fugit.
        </p>
    </div>
    <div class="mission-container">
        <h1>AMU Vision</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptates autem sequi, perspiciatis ea repellat minus 
            vero quae, facere eveniet omnis ducimus doloribus itaque? 
            Dignissimos maxime quo, a quam cupiditate fugit.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptates autem sequi, perspiciatis ea repellat minus 
            vero quae, facere eveniet omnis ducimus doloribus itaque? 
            Dignissimos maxime quo, a quam cupiditate fugit.
        </p>
    </div>

 </div>
 <div class="form" id="login">
       <div class="close-btn">
        <label for="close" onclick="close_me()" style="font-size: 44px;">&CircleTimes;</label>
        </div>

        <br>
        
    <div class="head">
        
        
    <h3>Login to CMS</h3>
   
</div>
    <form method="post" autocomplete="on">
       
        <div class="element">
            <label for="username" id="uname-lbl">Username/ID number</label><br><br>
            <img src="icons/user.png" width="25px" height="25px" alt="">
            <input type="text" class="uname-txt" name="username" placeholder="username goes here" required>
            <label for="password" id="password-lbl">Password</label> <br><br>
            <img src="icons/lock.png" width="25px" height="25px" alt="">
            
            <input type="password" name="password" class="password-txt" placeholder="password goes here" required>
            <input type="submit" name="login" class="login-btn" value="Login">
            <?php
            if(isset($_POST['login'])){
                $uname=$_POST["username"];
                $pword=md5($_POST["password"]);
                $sql=mysqli_query($conn,"SELECT * FROM login WHERE username='$uname' AND password='$pword'") or die( mysqli_error($conn));
                $result=mysqli_num_rows($sql);
                if($result > 0){
                    $row=mysqli_fetch_assoc($sql);
                    
                    if($row["username"]===$uname && $row["password"]==$pword && $row["role"]=="student"){
                        header("Location:student_home.php");
                     $_SESSION['u_name']=$uname;
                     $_SESSION['student_logged_in']=$uname;
                   $sql="SELECT * FROM student WHERE id='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $st_id=$rows["id"];
                    $fullName=$rows["fullName"];
                    $age=$rows["age"];
                    $sex=$rows["sex"];
                    $department=$rows["department"];
                    $class_year=$rows["class_year"];
                    $semester=$rows["semester"];
                    $last_date=$rows["last_date"];
                    $profile_pic=$rows['st_image'];
                        }
                        $_SESSION['st_id']=$st_id;
                        $_SESSION['full_name']=$fullName;
                        $_SESSION['ag']=$age;
                        $_SESSION['sx']=$sex;
                        $_SESSION['dept']=$department;
                        $_SESSION['class_year']=$class_year;
                        $_SESSION['semester']=$semester;
                        $_SESSION['last_date']=$last_date;
                        $_SESSION['profile_picture']=$profile_pic;
                    }
                    }
                    else if($row["username"]===$uname && $row["password"]==$pword && $row["role"]=="Admin"){
                        header("Location:registrarHome.php");
                        $_SESSION['admin_u_name']=$uname;  
                        $_SESSION['admin_logged_in']=$uname;

                    }
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Librarian"){
                        header("Location:librarian.php");
                        $_SESSION['librarian_u_name']=$uname;
                        $_SESSION['librarian_logged_in']=$uname;
                $sql="SELECT * FROM staff WHERE username='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $librarian_id=$rows["username"];
                    $librarian_fullName=$rows["fullName"];
                    $librarian_age=$rows["age"];
                    $librarian_sex=$rows["sex"];
                    $librarian_qualification=$rows["qualification"];
                    $librarian_position=$rows["position"];
                    $librarian_image=$rows["im_age"];
                        }
                        $_SESSION['full_name']=$librarian_fullName;
                        $_SESSION['staff_id']=$librarian_id;
                        $_SESSION['ag']=$librarian_age;
                        $_SESSION['sx']=$librarian_sex;
                        $_SESSION['qualification']=$librarian_qualification;
                        $_SESSION['position']=$librarian_position;
                        $_SESSION['librarian_image']=$librarian_image;
                    }
                    }
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Lab assistant"){
                        header("Location:lab.php");
                        $_SESSION['lab_u_name']=$uname;
                        $_SESSION['lab_logged_in']=$uname;
                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                    $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                    $rows=mysqli_num_rows($res);
                    if($rows == 1){
                    while ($rows=mysqli_fetch_assoc($res)){
                    $lab_id=$rows["username"];
                    $lab_fullName=$rows["fullName"];
                    $lab_age=$rows["age"];
                    $lab_sex=$rows["sex"];
                    $lab_qualification=$rows["qualification"];
                    $lab_position=$rows["position"];
                    $lab_image=$rows["im_age"];
                        }
                        $_SESSION['lab_full_name']=$lab_fullName;
                        $_SESSION['lab_id']=$lab_id;
                        $_SESSION['lab_ag']=$lab_age;
                        $_SESSION['lab_sx']=$lab_sex;
                        $_SESSION['lab_qualification']=$lab_qualification;
                        $_SESSION['lab_position']=$lab_position;
                        $_SESSION['lab_image']=$lab_image;
                    }
                    }
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Department head"){
                        header("Location:department.php");
                        $_SESSION['department_u_name']=$uname;
                        $_SESSION['dep_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows == 1){
                        while ($rows=mysqli_fetch_assoc($res)){
                        $dep_id=$rows["username"];
                        $dep_fullName=$rows["fullName"];
                        $dep_age=$rows["age"];
                        $dep_sex=$rows["sex"];
                        $dep_qualification=$rows["qualification"];
                        $dep_position=$rows["position"];
                        $dep_image=$rows["im_age"];
                            }
                            $_SESSION['dept_full_name']=$dep_fullName;
                            $_SESSION['dept_id']=$dep_id;
                            $_SESSION['dept_ag']=$dep_age;
                            $_SESSION['dept_sx']=$dep_sex;
                            $_SESSION['dept_qualification']=$dep_qualification;
                            $_SESSION['dept_position']=$dep_position;
                            $_SESSION['dept_image']=$dep_image;
                        }
                    }
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Sport head"){
                        header("Location:sport.php");
                        $_SESSION['sport_u_name']=$uname;
                        $_SESSION['sport_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $rows=mysqli_num_rows($res);
                        if($rows == 1){
                        while ($rows=mysqli_fetch_assoc($res)){
                        $sport_id=$rows["username"];
                        $sport_fullName=$rows["fullName"];
                        $sport_age=$rows["age"];
                        $sport_sex=$rows["sex"];
                        $sport_qualification=$rows["qualification"];
                        $sport_position=$rows["position"];
                        $sport_image=$rows["im_age"];
                            }
                            $_SESSION['sport_full_name']=$sport_fullName;
                            $_SESSION['sport_id']=$sport_id;
                            $_SESSION['sport_ag']=$sport_age;
                            $_SESSION['sport_sx']=$sport_sex;
                            $_SESSION['sport_qualification']=$sport_qualification;
                            $_SESSION['sport_position']=$sport_position;
                            $_SESSION['sport_image']=$sport_image;
                        }
                    }
                    else if($row["username"]==$uname && $row["password"]==$pword && $row["role"]=="Dormitory"){
                        header("Location:dormitory.php");
                        $_SESSION['dormitory_u_name']=$uname;
                        $_SESSION['dormitory_logged_in']=$uname;

                        $sql="SELECT * FROM staff WHERE username='$uname' ";
                        $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
                        $dormitory_rows=mysqli_num_rows($res);
                        if($dormitory_rows == 1){
                        while ($dormitory_rows=mysqli_fetch_assoc($res)){
                        $dormitory_fullName=$dormitory_rows["fullName"];
                        $dormitory_age=$dormitory_rows["age"];
                        $dormitory_sex=$dormitory_rows["sex"];
                        $dormitory_qualification=$dormitory_rows["qualification"];
                        $dormitory_position=$dormitory_rows["position"];
                        $dormitory_id=$dormitory_rows["username"];
                        $dormitory_image=$dormitory_rows["im_age"];
                            }
                            $_SESSION['dormitory_id']=$dormitory_id;
                            $_SESSION['dormitory_ag']=$dormitory_age;
                            $_SESSION['dormitory_sx']=$dormitory_sex;
                            $_SESSION['dormitory_qualification']=$dormitory_qualification;
                            $_SESSION['dormitory_position']=$dormitory_position;
                            $_SESSION['dormitory_full_name']=$dormitory_fullName;
                            $_SESSION['dormitory_image']=$dormitory_image;
                        }
                    }
                    else{
                       
                    }
                }
                else{

                    echo "<script>alert('Username or password incorrect!!')</script>";
                }
                
             }
            ?>
        </div>
        <div class="forget">
            <a href="#">Forget password?</a>
            
        </div>
    </form>
</div>   
    <footer>
     Copyright ©2022 Arba Minch University
    </footer>

    <script src="js/login.js"></script>

    <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>
</body>
</html>
<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);

$fn=$_GET["fn"];
$id=$_GET['idn'];
$dep=$_GET['dep'];
$ag=$_GET['ag'];
$sx=$_GET['sx'];
$cy=$_GET['cy'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit student profile</title>
    <link rel="stylesheet" href="css/update_student_profile/update_student_profile.css">
    <link rel="stylesheet" href="css/update_student_profile/update_student_profileSmallScreen.css">
    <style>
            form{
        display:flex;
        flex-direction:column;
      }
    </style>
</head>
<body>
    <div class="student-profile-edit-container" id="edit-student-profile">
        <div class="profile-detail">
          <h3  style="color: orangered; margin: 10px;">Edit <?php echo $fn; ?>'s profile</h3>
          <hr>
         <form method="POST" enctype="mulipart/form-data">
          <label for="fullname">Full name</label>
          <input type="text" name="fullName" value="<?php echo $fn; ?>">
          <label for="id">ID number</label>
          <input type="text" name="id" value="<?php echo $id; ?>">
          <label for="dept">Department</label>
          <input type="text" name="dept" value="<?php echo $dep; ?>">
          <label for="age">Age</label>
          <input type="text" name="age" value="<?php echo $ag; ?>">
          <label for="sex">Sex</label>
          <input type="text" name="sex" value="<?php echo $sx; ?>">
          <label for="class_year">Class year</label>
          <input type="text" name="class_year" value="<?php echo $cy; ?>">
      
          <div class="edit-cancel-buttons">
            <input type="submit" name="edit" value="Edit">
            <?php
            if(isset($_POST["edit"])){
              $full_name=$_POST["fullName"];
              $id_num=$_POST["id"];
              $department=$_POST["dept"];
              $age=$_POST["age"];
              $sex=$_POST["sex"];
              $class_year=$_POST["class_year"];

              $sql_edit=mysqli_query($conn,"UPDATE student SET fullName='$full_name',age='$age',sex='$sex',class_year='$class_year',department='$department',id='$id_num' WHERE id='$id'") or die(mysqli_error($conn));
              if($sql_edit){
                echo "<p style=color:green>Successfully edited...</p>";
              }else{
                echo "<p style=color:red>please enter data correctly!</p>";
              }
            }
            ?>
            <input type="button" name="cancel" value="Cancel">
            </form>
          </div>
        </div>
      </div>

      <footer>Copyright ©2022 Arba Minch University</footer>

      <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>

</body>
</html>
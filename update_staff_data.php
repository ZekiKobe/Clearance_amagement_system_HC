<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);

$fn=$_GET["fn"];
$id=$_GET['idn'];
$ql=$_GET['ql'];
$ag=$_GET['ag'];
$sx=$_GET['sx'];
$ps=$_GET['ps'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo $fn; ?>'s profile</title>
    <link rel="stylesheet" href="css/update_staff_profile/update_staff_profile.css">
    <link rel="stylesheet" href="css/update_staff_profile/update_staff_profile_smallScreen.css">
    <style>
      form{
        display:flex;
        flex-direction:column;
      }
    </style>
</head>
<body>
    <div class="staff-profile-edit-container" id="edit-staff-profile">
        <div class="profile-detail">
          <h3 style="color: orangered; margin: 10px;">Edit <?php echo $fn; ?>'s profile</h3>
          <hr>
        <form method="POST" enctype="multipart/form-data">
          <label for="fullname">Full name</label>
          <input type="text" name="fullName" value="<?php echo $fn; ?>">
          <label for="id">ID number</label>
          <input type="text" name="id" value="<?php echo $id; ?>">
          <label for="qual">Qualification</label>
          <input type="text" name="qual" value="<?php echo $ql; ?>">
          <label for="age">Age</label>
          <input type="text" name="age" value="<?php echo $ag; ?>">
          <label for="sex">Sex</label>
          <input type="text" name="sex" value="<?php echo $sx; ?>">
          <label for="pos">Position</label>
          <input type="text" name="pos" value="<?php echo $ps; ?>">
          <div class="edit-cancel-buttons">
            <input type="submit" name="edit" value="Edit">
            <?php
            if(isset($_POST["edit"])){
              $full_name=$_POST["fullName"];
              $id_num=$_POST["id"];
              $qualification=$_POST["qual"];
              $age=$_POST["age"];
              $sex=$_POST["sex"];
              $position=$_POST["pos"];

              $sql_edit=mysqli_query($conn,"UPDATE staff SET fullName='$full_name',age='$age',sex='$sex',qualification='$qualification',position='$position',username='$id_num' WHERE username='$id'") or die(mysqli_error($conn));
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
<?php
session_start();
include 'dbconnect.php';
mysqli_select_db($conn,$db_name);

$fn=$_GET["fn"];
$id=$_GET['idn'];
$cy=$_GET['cy'];
$ag=$_GET['ag'];
$sx=$_GET['sx'];
$ld=$_GET['ld'];
$dep=$_GET['dep'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View student profile</title>
    <link rel="stylesheet" href="css/view_student_profile/view_student_profile.css">
    <link rel="stylesheet" href="css/view_student_profile/view_student_profile_smallScreen.css">
</head>
<body>
    <div class="student-profile-view-container" id="view-student-profile">
       <div class="profile-container">
        <div class="profile-detail">
          <h2 style="text-align:center; color:orangered;"><?php echo $fn; ?>'s profile</h2>
          <hr>
          <p>Full name: <?php echo $fn; ?> </p>
          <p>ID number : <?php echo $id; ?></p>
          <p>Department : <?php echo $dep; ?></p>
          <p>Age : <?php echo $ag; ?></p>
          <p>sex : <?php echo $sx; ?></p>
          <p>Class year : <?php echo $cy; ?></p>
          <p>Last date class attended: <?php echo $ld; ?></p>
        </div>
        <div class="profile-picture-container">
            <div class="profile-picture-bg">
            <?php
             $sql="SELECT * FROM student WHERE id='$id'";
              $res=mysqli_query($conn,$sql) or die( mysqli_error($conn));
              $rows=mysqli_num_rows($res);
              if($rows>0){
                while ($rows=mysqli_fetch_assoc($res)){
                  $image=$rows["st_image"];
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
    </div>

    <footer>Copyright ©2022 Arba Minch University</footer>

    <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>

</body>
</html>
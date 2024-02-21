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
    <title>View staff data</title>
    <link rel="stylesheet" href="css/view_staff_profile/view_staff_profile.css">
</head>
<body>
    
    <div class="staff-profile-view-container" id="view-staff-profile" name="view-staff-profile">
       <div class="profile-container">
        <div class="profile-detail">
          <h3 style="margin: 10px; color:orangered">Staff profile</h3>
          <hr>
          <p>Full name: <?php echo $fn; ?></p>
          <p>ID number : <?php echo $id; ?></p>
          <p>Qualification : <?php echo $ql; ?></p>
          <p>Age : <?php echo $ag; ?></p>
          <p>sex : <?php echo $sx; ?></p>
          <p>Position :<?php echo $ps; ?></p>
        </div>
        <div class="profile-picture-container">
            <div class="profile-picture-bg">
            <?php
             $sql="SELECT * FROM staff WHERE username='$id'";
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
    </div>

    <footer>Copyright ©2022 Arba Minch University</footer>

    <script>
     if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
     }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/profile.css">
    <title>Chilee's Camagru</title>
</head>
<body>
<?php

require_once('./classes/dbh.classes.php');
$users_id = $_SESSION["userid"];
$conn = new Dbh;    
$sql= "SELECT * FROM users WHERE users_id = '$users_id'" ;
$stmt = $conn->connect()->query($sql);
$row=$stmt->fetch();
$users_uid = $row['users_uid'];
$users_email = $row['users_email'];
$notify=$row['notify'];
$stmt=null;

?>
<div class="all_profile">
    <div class="titre_profile">
    <h3 type="text">My Profile</h3></div>

    <div class="env_form">
        <div class="photo_form" style="background-image:url('../common/img/profile.png');" >
        </div><!-- fin  photo_form -->


        <div class="content_form">
            <div class="titre_form_profile">Modify your informations</div>

            <form action="../classes/profile_modify.classes.php" method="post">
            <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"]; ?>">
            <label for="uid">Your login*</label>
            <input type="text" id="uid" name="uid" value="<?php echo $users_uid ?>" required="required">

            <!-- <label for="password">Your password*</label>
            <input type="password" id="password" name="password" value="******" required="required"> -->

            <label for="email">Your email*</label>
            <input type="text" id="email" name="email" value="<?php echo $users_email ?>" required="required">
            <?php if($notify==="yes"){ 
            echo'      
            <label for="notification">Be notified by email?</label>
            <input type="checkbox" id="notifyemail" name="notify" value="yes" checked><br>
            ';} ?>
             <?php if($notify==="no"){ 
            echo'      
            <label for="notification">Be notified by email?</label>
            <input type="checkbox" id="notifyemail" name="notify" value="yes" uncheck><br>
            ';} ?>

            <div class="text_r">* Required Field</div>
           
                <div class="btn_profile">
                <div class="txt_pwd"><a href="../index.php?url=Resetpassword">Change Password, Clic here !</a></div>
                <button type="submit_profile" name="submit_modify">Modify</button>
                </div>
       

            </form>
           

        </div><!-- fin  content_form -->
    </div><!-- fin  env_form -->
    <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "profileModified"){
                        echo 'Your profile had been modified';
                    }
                }
            ?>
</div><!-- fin all_profile -->


</body>
</html>

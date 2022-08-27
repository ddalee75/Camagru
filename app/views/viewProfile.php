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





?>
<div class="all_profile">
    <div class="titre_profile">
    <h3 type="text">My Profile</h3></div>

    <div class="env_form">
        <div class="photo_form">
        </div><!-- fin  photo_form -->


        <div class="content_form">
            <div class="titre_form_profile">Modify your informations</div>

            <form action="http://localhost/controllers/ControllerProfile.php" method="post">
            <label for="uid">Your login*</label>
            <input type="text" id="uid" name="uid" value="John" required="required">

            <!-- <label for="password">Your password*</label>
            <input type="password" id="password" name="password" value="******" required="required"> -->

            <label for="email">Your email*</label>
            <input type="text" id="email" name="email" value="doe@gmail.com" required="required">

            <label for="notification">Be notified by email?</label>
            <input type="checkbox" id="notification" name="notification" value="yes" checked> <br>
            <div class="text_r">* Required Field</div>
           
                <div class="btn_profile">
                <div class="txt_pwd"><a href="../index.php?url=Resetpassword">Change Password, Clic here !</a></div>
                <button type="submit_profile" name="submit">Modify</button>
                </div>
       

            </form>


        </div><!-- fin  content_form -->
    </div><!-- fin  env_form -->
</div><!-- fin all_profile -->


</body>
</html>

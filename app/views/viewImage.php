
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/image.css">
   
    <title>Chilee's Camagru</title>
</head>

<body>



<div class="all_image">
        <div class="showbloc_image">
        <?php
            $idGallery= $_GET["idGallery"];
            include('./classes/image_manage.classes.php');
    
            $showImage = new ImageManage();
            $showImage->showImage($idGallery);
            
             if(isset($_GET["error"])){
                if($_GET["error"] == "notYourPhoto"){
                   
                    echo 'This is not your photo, can\'t delete';
                }
            }
        ?>
        
        <?php
            if(isset($_SESSION["userid"]))
            {
        ?>

        <?php 
            require_once('./classes/dbh.classes.php');
            $sql= "SELECT idGallery FROM likes WHERE idGallery = '$idGallery'" ;
            $conn = new Dbh;
            $stmt = $conn->connect()->prepare($sql);
            $stmt->execute();
            $likes =$stmt->rowCount();

        ?>        

            <div class="icons_image">
            <div class=likes>
            <a href="../classes/like_image.classes.php?t=1&idGallery=<?php echo $idGallery; ?>&userid=<?php echo $_SESSION["userid"]; ?>" ><img src="../common/img/like_yes.png" width=20px></img></a>&nbsp;&nbsp;(&nbsp;<?php echo $likes ?>&nbsp;)
        
           
            </div>

            <div class=croix_image>
            <form action="../classes/del_image.classes.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"]; ?>">
                  <input type="hidden" name="idGallery" value="<?php echo $idGallery; ?>">
                  <button type="submit_croix" name="submit_delImage">x</button>
            </form>

            <!-- <img id ="croix_image" src="../common/img/croix.png" name="userid" value="<?php echo $_SESSION["userid"];?>" name2="idGallery" value2="<?php echo $idGallery ?>" width="20" height="20"></img> -->
            </div> <!-- fin de croix_image -->

        </div> <!-- fin de icons_image -->

        <div  id="jaxa2" style='width:60%;margin:5px;'></div>
        </div> <!-- fin de showbloc_image -->
        
        <div class="comments_image">
        
            <form action="../classes/image_form_manage.classes.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idGallery" value="<?php echo $idGallery ?>">
            <input type="hidden" name="useruid" value="<?php echo $_SESSION["useruid"];?>" >
            <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"];?>" >
            <textarea class ="txt_zone" name="content" placeholder="Write your comment here..." required></textarea>
            <div class="btn_comment"><button type="submit" name="submit">Submit Comment</button></div>
            </form>
            
            <div class="message_image">
                <?php 
                    if(isset($_GET["error"])){
                    
                    
                        if($_GET["error"] == "imageError"){
                            echo 'Image error, please return to gallery !';
                        }
                        if($_GET["error"] == "commentSucess"){
                            echo 'comment posted';
                        }
                        if($_GET["error"] == "stmtError"){
                            echo 'statment error when set comment';
                        }
                    }
                ?>        
            </div> <!-- fin de message_image -->
        

            <?php } ?> 
            <div class="partage_sociaux">
<button class="button share_twitter" data-url="http://localhost/index.php?url=image&idGallery=<?php echo $idGallery ?>" style = 'background-color: #00ACEE; border:0px;height:30px;color:white;'>
    Partager sur twitter
</button>
<button class="button share_facebook" data-url="http://localhost/index.php?url=image&idGallery=<?php echo $idGallery ?>" style = 'background-color: #3b5998; border:0px;height:30px;color:white;'>
    Partager sur facebook
</button>
</div>


            <div class="show_comments">
            <?php
            
                // print_r($idGallery);
                require_once('./classes/image_show_comment.classes.php');

                $show_comment = new CommentManage();
                $show_comment->showComment($idGallery);
            ?>
            </div> <!-- fin de cshow_comments -->
        </div> <!-- fin de comments_image -->


        
</div> <!-- all_image -->


<script type="text/javascript" src="../common/js/partageSociaux.js"></script>
</body>
</html>
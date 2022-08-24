
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
        <?php
            $orderGallery= $_GET["orderGallery"];
            require_once('./classes/image_manage.classes.php');
    
            $showImage = new ImageManage();
            $showImage->showImage($orderGallery);
        ?>
        
        
        <div class="comments_image">
        
            <form action="../classes/image_form_manage.classes.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="orderGallery" value="<?php echo $orderGallery ?>">
            <input type="hidden" name="useruid" value="<?php echo $_SESSION["useruid"];?>" >
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
            </div>
        


            <div class="show_comments">
            <?php
            
                // print_r($orderGallery);
                require_once('./classes/image_show_comment.classes.php');

                $show_comment = new CommentManage();
                $show_comment->showComment($orderGallery);
            ?>
            </div>
        </div>

        
</div>
</body>
</html>
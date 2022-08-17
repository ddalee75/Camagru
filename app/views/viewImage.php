
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
            <input class="input_txt_gallery" type="text" name="name" placeholder="Your name" >
            <textarea name="content" placeholder="Write your comment here..." required></textarea>
            <button class="bn_gallery" type="submit" name="submit">Submit Comment</button>

            </form>

            <?php 
                if(isset($_GET["error"])){
                   
                    if($_GET["error"] == "emptyUserName"){
                        echo 'Please Enter your Name !';
                    }
                    if($_GET["error"] == "imageError"){
                        echo 'Image error, please return to gallery !';
                    }
                    if($_GET["error"] == "commentSucess"){
                        echo 'comment posted';
                    }
                }
            ?>        
        </div>

        
 </div>
</body>
</html>
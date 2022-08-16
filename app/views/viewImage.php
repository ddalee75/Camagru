
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
<?php
$orderGallery= $_GET["orderGallery"];
// print_r($orderGallery);
require_once('./classes/dbh.classes.php');
class ImageManage extends Dbh
{
    public function showImage($orderGallery)
    {
    $sql= "SELECT * FROM gallery WHERE orderGallery = '$orderGallery'" ;
    
    $stmt = $this->connect()->query($sql);
    $row=$stmt->fetch();

echo '
    <div class="all_image">
        <div class="titre_image">
            <h2> '.$row["nameGiven"].'</h2>
        </div>

        <div class="show_image">
        <img src="'.$row["path"].'"></img>
        </div>

        <div class="like_image">
        <p>Like</p>
        </div>

        <div class="comments_image">
        
            <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="orderGallery" value="<?php echo $orderGallery ?>">
            <input class="input_txt_gallery" type="text" name="filename" placeholder="File name">
            
            <button class="bn_gallery" type="submit" name="submit_comments">Submit</button>

         </form>


        </div>
        <div class="show_comments">
        </div>


    </div>
    ';
    }
}    
        $showImage = new ImageManage();
        $showImage->showImage($orderGallery);
          ?> 


    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/gallery.css">
   
    <title>Chilee's Camagru</title>
    
</head>
<body>
  <!-- <?php 
    print_r($_SESSION["userid"]);
  ?> -->
<div class="all_gallery">
  
  <div class="upload">
    
              <form action="../classes/gallery.classes.php" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"]; ?>">
                  <input class="input_txt_gallery" type="text" name="filename" placeholder="File name">
                  <input class="input_txt_gallery2" type="file" name="file">
                  <button class="bn_gallery" type="submit" name="submit_upload">Upload</button>
        
              </form>
            
              
              
  </div>
  <div class="titre_upload">Upload Your Image Here</div>
  <div class="message_gallery">
  <?php 
                      if(isset($_GET["error"])){
                          if($_GET["error"] == "TypeNotCorrect"){
                             
                              echo 'Only jpg, png and pdf file, please';
                          }
                          if($_GET["error"] == "NoFile"){
                            echo 'No file input';
                          }
                          if($_GET["error"] == "UploadSuccess"){
                            echo 'Upload Success, Go back to camera please';
                          }
                          if($_GET["error"] == "FileNamePlease"){
                            echo 'Please give a file name';
                          }
                          if($_GET["error"] == "FileTooBig"){
                            echo 'Your file is too Big <2Mb please';
                          }
                          if($_GET["error"] == "AnError"){
                            echo 'An error when upload';
                          }
                          if($_GET["error"] == "imageDel"){
                            echo 'Photo deleted';
                          }
                        }
                        ?>
</div>                        
<div class="titre_gallery">Our Best Souvenirs!</div>
  <div class = "gallery">
    
    <div class = "gallery-container">
              
    
          <?php
          require_once('./classes/dbh.classes.php');
          require_once('./classes/gallery_manage.classes.php');

          $show = new GalleryManage();
          $show->showGallery();
          ?> 


                   
     
  </div>

  
</div>

</body>
</html>


<!-- <?= "IN ".basename (__FILE__, '.php')."" ?> -->
<?php



if (isset($_POST['submit_upload']))
{
  if (!empty($_FILES)){
    $img = $_FILES['img'];
    move_uploaded_file($img['tmp_name'],"../common/gallery/".$img['name']);
  }}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/home.css">
    <title>Chilee's Camagru</title>
    
</head>
<body>

        <form action="#" method="POST" enctype="multipart/form-data">
            <!-- <input type="text" name="filename" placeholder="File ssname">
            <input type="text" name="filetitle" placeholder="Image title">
            <input type="text" name="filedesc" placeholder="Image description"> -->
            <input type="file" name="img">
            <button type="submit" name="submit_upload">Upload</button>
        </form>

</body>
</html>



<!-- <!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Multipart Form Data</title>
  </head>
  <body>
    <form action="uploading.php" method="POST" 
          enctype="multipart/form-data">
     <h4>Browse your file</h4>
       <input type="file" name="uploadfile" /> <br><br>
       <input type="submit" value="Upload File"/>
   </form>
  </body>
</html> -->
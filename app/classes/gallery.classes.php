<?php
require_once('./dbh.classes.php');
class Gallery extends Dbh
{

  public function uploadImage()
  {
    if (isset($_POST['submit_upload']))
    {
      if (!empty($_POST['filename']))
      {
        if (!empty($_FILES)){
          $file = $_FILES['file'];
          $fileName = $_FILES['file']['name'];
          $fileTmpName = $_FILES['file']['tmp_name'];
          $fileSize = $_FILES['file']['size'];
          $fileError = $_FILES['file']['error'];
          $fileType = $_FILES['file']['type'];
          $nameGiven = $_POST['filename'];
          $newName = strtolower(str_replace(" ", "_", $nameGiven));
          // print_r($file); //avec ca on recupere tous les infos de file
          // print_r($fileName);

          $fileExt = explode('.', $fileName);
          $fileActualExt =  strtolower(end($fileExt));
          $allowed = array('jpg', 'jpeg', 'png', 'pdf');

          //si pas de file 
          if ($fileError !== 0){
            header("location: ../index.php?url=gallery&error=NoFile");
            exit();
          }

          // check si jpeg, png, pdf et size of image + creer un nom image unique
          if(in_array($fileActualExt, $allowed)){
            
            if ($fileError === 0){
              
              if($fileSize < 2000000)
              {
                $imgFullName = $newName."_".uniqid('',true).".".$fileActualExt;
                $path = "../common/gallery/".$imgFullName;
                move_uploaded_file($fileTmpName,"../common/gallery/".$imgFullName);
                
            
                $sql = "SELECT * FROM gallery";
              
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $row= $stmt->rowCount();
                $setImageOrder = $row +1;
                //  print_r($setImageOrder);
                //  print_r($path);

                $sql = "INSERT INTO gallery (namegiven, imgFullNameGallery, orderGallery, path) VALUES(?, ?, ?, ?);";
                $stmt = $this->connect()->prepare($sql);
                if(!$stmt->execute(array($nameGiven, $imgFullName, $setImageOrder, $path)))
                {
                  $stmt = null;
                  header("location: ../index.php?url=galley&error=stmtfailed");
                  exit();
                }

        

                $stmt = null;

                header("location: ../index.php?url=gallery&error=UploadSuccess");
                exit();
                
              }else{
                header("location: ../index.php?url=gallery&error=FileTooBig");
                exit();
              }

            }else {
              header("location: ../index.php?url=gallery&error=AnError");
              exit();
            }

          }else{
            header("location: ../index.php?url=gallery&error=TypeNotCorrect");
            exit();
          
          }
        }
      }else{
        header("location: ../index.php?url=gallery&error=FileNamePlease");
            exit();
      }
    
    }
  } 
}

$gallery = new Gallery;
$gallery->uploadImage();

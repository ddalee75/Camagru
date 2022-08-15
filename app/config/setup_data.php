<?php
require_once "database.php";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=$charset", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

  // sql to create table users
  $query_users = "CREATE TABLE IF NOT EXISTS users (
    users_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    users_uid TINYTEXT NOT NULL,
    users_pwd LONGTEXT NOT NULL,
    users_email TINYTEXT NOT NULL,
    users_token VARCHAR(20) NOT NULL,
    users_confirm INT NOT NULL DEFAULT '0',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    pwd_token VARCHAR(20) NOT NULL,
    pwd_ask_date TIME
  )";

  $query_gallery ="CREATE TABLE IF NOT EXISTS gallery (
          idGallery INT AUTO_INCREMENT PRIMARY KEY,
          nameGiven LONGTEXT not null,
          imgFullNameGallery LONGTEXT not null,
          orderGallery LONGTEXT not null,
          path VARCHAR(1000) NOT NULL
      )";
  

  // $query_gallery_seed = 
  // "INSERT INTO gallery (imgFullNameGallery, path) VALUES ('logo, ../common/gallery/logo.png');";


try{

  $conn->exec($query_users);
  echo "Table users created successfully,";
  
  $conn->exec($query_gallery);
  echo "Table gallery created successfully,";

  // $conn->exec($query_gallery_seed);
  // echo "Gallery insert successfully,";


} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$conn = null;
?>

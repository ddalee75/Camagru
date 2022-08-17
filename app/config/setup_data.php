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
    users_id INT(11) AUTO_INCREMENT PRIMARY KEY,
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
          path VARCHAR(1000) NOT NULL,
          users_id INT(11), 
          FOREIGN KEY (users_id) REFERENCES users(users_id)
          

      )";
  

  $query_gallery_seed = 
  "INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Advengers', 'gallery-advenger.png', '1', '../common/img/gallery-advenger.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Anniversaire', 'gallery-anniversaire.png', '2', '../common/img/gallery-anniversaire.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Cadre poto', 'gallery-cadre.png', '3', '../common/img/gallery-cadre.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Jaconde', 'gallery-jaconde.png', '4', '../common/img/gallery-jaconde.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Time', 'gallery-time.png', '5', '../common/img/gallery-time.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Titanic', 'gallery-titanic.png', '6', '../common/img/gallery-titanic.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Wanted', 'gallery-wanted.png', '7', '../common/img/gallery-wanted.png');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Sahara', 'dersert.jpg', '8', '../common/gallery/desert.jpg');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Plage', 'plage.jpg', '9', '../common/gallery/plage.jpg');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Etretat', 'etretat.jpg', '10', '../common/gallery/etretat.jpg');
  INSERT INTO gallery (nameGiven, imgFullNameGallery, orderGallery, path) VALUES ('Road', 'road.jpg', '11', '../common/gallery/road.jpg')";

  $query_comment="CREATE TABLE IF NOT EXISTS comment(
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    postUser LONGTEXT NOT NULL,
    postContent TEXT NOT NULL,
    orderGallery LONGTEXT NOT NULL,
    postDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
   )";



try{

  $conn->exec($query_users);
  echo "Table users created successfully,";
  
  $conn->exec($query_gallery);
  echo "Table gallery created successfully,";

  $conn->exec($query_gallery_seed);
  echo "Gallery insert successfully,";

  $conn->exec($query_comment);
  echo "Table comment created successfully,";



} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$conn = null;
?>

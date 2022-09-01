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
    users_confirm INT NOT NULL,
    notify INT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    pwd_token VARCHAR(20) NOT NULL,
    pwd_ask_date TIME
  )";

  $query_users_seed=
  "INSERT INTO users(users_id, users_uid, users_pwd, users_email, users_token, users_confirm, notify, pwd_token) VALUE ('1', 'admin', 'QWMFqO4/XsMMc', 'chilee42paris@gmail.com', '',  '1', '1', '')";

  $query_gallery ="CREATE TABLE IF NOT EXISTS gallery (
          idGallery INT AUTO_INCREMENT PRIMARY KEY,
          nameGiven LONGTEXT not null,
          imgFullNameGallery LONGTEXT not null,
          path VARCHAR(1000) NOT NULL,
          date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          users_id INT(11), 
          FOREIGN KEY (users_id) REFERENCES users(users_id)
          

      )";
  

  $query_gallery_seed = 
  "INSERT INTO gallery (nameGiven, imgFullNameGallery, path, users_id) VALUES ('Advengers', 'gallery-advenger.png', '../common/img/gallery-advenger.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Anniversaire', 'gallery-anniversaire.png', '../common/img/gallery-anniversaire.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Cadre poto', 'gallery-cadre.png', '../common/img/gallery-cadre.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Joconde', 'gallery-jaconde.png', '../common/img/gallery-jaconde.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Time', 'gallery-time.png', '../common/img/gallery-time.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Titanic', 'gallery-titanic.png', '../common/img/gallery-titanic.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Hellfest', 'gallery-hellfest.png', '../common/img/gallery-hellfest.png', '1');
  INSERT INTO gallery (nameGiven, imgFullNameGallery,  path, users_id) VALUES ('Wanted', 'gallery-wanted.png', '../common/img/gallery-wanted.png', '1')";
  
  

  $query_comment="CREATE TABLE IF NOT EXISTS comment(
    id_comment INT AUTO_INCREMENT PRIMARY KEY,
    postUser LONGTEXT NOT NULL,
    postContent TEXT NOT NULL,
    idGallery LONGTEXT NOT NULL,
    postDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    
   )";

  $query_likes ="CREATE TABLE IF NOT EXISTS likes (
    id_likes INT AUTO_INCREMENT PRIMARY KEY,
    idGallery TINYTEXT not null,
    users_id INT(11) 
   )";


try{

  $conn->exec($query_users);
  echo "Table users created successfully,";

  $conn->exec($query_users_seed);
  echo "Table users created successfully,";
  
  $conn->exec($query_gallery);
  echo "Table gallery created successfully,";

  $conn->exec($query_gallery_seed);
  echo "Gallery insert successfully,";

  $conn->exec($query_comment);
  echo "Table comment created successfully,";

  $conn->exec($query_likes);
  echo "Table likes created successfully,";


} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$conn = null;
?>

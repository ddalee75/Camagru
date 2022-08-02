<?php
$servername = "mysql8-container";
$username = "root";
$password = "camagru";
$dbname = "camagru_DB";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // sql to create table
  $sql = "CREATE TABLE users (
  users_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  users_uid TINYTEXT NOT NULL,
  users_pwd LONGTEXT NOT NULL,
  users_email TINYTEXT NOT NULL,
  token VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  confirm INT NOT NULL DEFAULT '0',
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Table users created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>

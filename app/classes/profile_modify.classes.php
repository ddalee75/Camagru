<?php 
require_once('./dbh.classes.php');
$users_id = $_POST["userid"];
$notify = $_POST["notify"];


if (isset($_POST['submit_modify']))
{

    
    if(!empty($_POST['email'] && !empty($_POST['uid'])))
    {
        // print_r($users_id);
        $conn = new Dbh;    
        $sql= 'UPDATE users SET users_uid = ?, users_email=? WHERE users_id = ? ';
        $stmt = $conn->connect()->prepare($sql);
        $stmt->bindValue(1, $_POST['uid']);
        $stmt->bindValue(2, $_POST['email']);
        $stmt->bindValue(3, $users_id);
        $stmt->execute();
        

        if($notify !== "yes"){
            $changeNotify = "no";
            $sql ='UPDATE users SET notify = ? WHERE users_id = ?';
            $stmt = $conn->connect()->prepare($sql);
            $stmt->bindValue(1, $changeNotify);
            $stmt->bindValue(2, $users_id);
            $stmt->execute();
            $stmt=null;

        }
        if($notify === "yes"){
            $changeNotify = "yes";
            $sql ='UPDATE users SET notify = ? WHERE users_id = ?';
            $stmt = $conn->connect()->prepare($sql);
            $stmt->bindValue(1, $changeNotify);
            $stmt->bindValue(2, $users_id);
            $stmt->execute();
            $stmt=null;
        }
    
        header("location: ../index.php?url=profile&error=profileModified");
    }
}
    

?>



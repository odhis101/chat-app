<?php 
    session_start ();
    if(isset($_SESSION['unique_id'])){ // if user logged in then come to this page otherwise logout
        include_once "config.php";
        echo ' we are here';
        
        $logout_id = mysqli_real_escape_string($conn, $_GET['id']);
        if(isset($logout_id)){ // if logout id is set
            $status = "Offline now";
            $sql = mysqli_query($conn,"UPDATE users SET status = '{$status}' WHERE  unique_id = {$logout_id}");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../login.php");
         }
            else{
                header("location:../users.php");
            }
        }
    }
    else{
       
        header("location:../login.php");
    }
?>
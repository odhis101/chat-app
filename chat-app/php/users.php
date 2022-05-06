<?php
    session_start();
    include_once ('config.php');
    $outgoing_id =$_SESSION['unique_id'];
    
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ";
    $res = mysqli_query($conn,$sql);
    $output ='';
    if(mysqli_num_rows($res) == 0 ){
        $output .= 'No users available to chat';

    }
    elseif(mysqli_num_rows($res) > 0){
       include 'data.php';
        
    }
    
    echo $output;
?>
<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once 'config.php';
        $outgoing_id = mysqli_real_escape_string($conn,$_POST ['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($conn,$_POST ['incoming_id']);
        $message = mysqli_real_escape_string($conn,$_POST ['message']);


        if(!empty( $message)){
            $sql ="INSERT INTO messages SET
                         
                            incoming_msg_id = $incoming_id,
                            outgoing_msg_id = '$outgoing_id',
                            msg = '$message'
                           
                            " or die();
            $res = mysqli_query($conn, $sql);
        }

    }else{
        header('../login.php');
    }

?>
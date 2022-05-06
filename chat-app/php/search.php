<?php 
    session_start();
    include_once ('config.php');
    $outgoing_id =$_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    
    $sql = " SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' )";
    $res = mysqli_query($conn,$sql);
    $output = '';
    if(mysqli_num_rows($res) > 0){
        include 'data.php';
    }
    else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>
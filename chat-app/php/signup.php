
<?php 
// gods eye
    session_start();
    include_once 'config.php';
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
            // check users email 
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                // check if user and email is valid in the database
                $sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'" );
                if(mysqli_num_rows($sql)>0){ 
                    // email already exists

                    echo "$email - this email exists";
                }
            else{
                // lets check user upload file or not
                if( isset($_FILES['image'])){
                    // file is uploaded
                    $img_name = $_FILES['image']['name']; // getting user uploaded img name
                    $img_type =  $_FILES['image']['type']; // getting user upload img type
                    $tmp_name = $_FILES['image']['tmp_name']; // this is temp name used to save file 

                    // get the file type name (jpg , png )
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    $extension = ['png', 'jpeg', 'jpg'];
                    if(in_array($img_ext, $extension) == true){
                        // if the uploaded img is in the valid array 
                        
                        
                        $time = time(); // time for unique id 
                        $new_img_name =  $time.$img_name;
                        
                       

                       
                        if( move_uploaded_file( $tmp_name, "../assets/img/img" .$new_img_name)){ // if user uploaded img move to our folder succesfully 
                            $status = 'Active'; // when user logs in his status will be active
                            $random_id = rand(time(), 100000); // random id for user 

                            // lets insert all users data in the table 

                            $sql2 ="INSERT INTO users SET
                            unique_id = $random_id,
                            fname = '$fname',
                            lname = '$lname',
                            email = '$email',
                            password = '$password',
                            img = '$new_img_name',
                            status = '$status'
                            
                            ";
                            $res = mysqli_query($conn, $sql2);
                        
                            if ($sql2){ // if these data inserted
                                $sql3 = mysqli_query($conn,"SELECT  * FROM users WHERE email ='{$email}'");
                                if(mysqli_num_rows($sql3)> 0){
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id']; // using this session we need user unique_id in other php file
                                    echo 1;
                                }
                            }
                            else{ // 
                                echo 'something went wrong';

                            }
                        }
                    }
                    else{
                        echo ' please select an image file';
                    }
                }
                else{
                    echo 'please insert an image';
                }
            }

            }
            else{
                echo 'email is not valid';
            }
    }
    else{
        echo 'Input all fields';
    }
<?php include_once('header.php') ?>
<?php 
   session_start();
   include 'php/config.php'; 
   if (!isset($_SESSION['unique_id'])){ // if he doesn't have a unique id he is redirected
       header('location: login.php');
   }
  
            
 
  ?> 


    <body>
    <div class="wrapper">
        
        <section class="chat-area">
           <header>
           <?php

            $user_id = mysqli_real_escape_string($conn ,$_GET['user_id']);
            $sql = "SELECT * FROM users WHERE unique_id = {$user_id} ";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);

            }
          ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>    
                <img src="assets/img/<?php echo "img",$row['img'];?>" alt="" >
                
                <div class="details">
                <span><?php echo $row['fname'],' ', $row ['lname']  ;?> </span>
                <p> <?php echo $row['status'];?></p>
                </div>
            
            </header>
            <div class="chat-box">
               
            </div>
              
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name='outgoing_id' value="<?php echo $_SESSION['unique_id']; ?>"hidden>
                <input type="text" name='incoming_id' value="<?php echo $user_id; ?>" hidden>
                <input type="text" name = message class= 'input-field' placeholder="type message here ....">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
   
        
        <script src="assets/javascript/chat.js" async defer></script>
    </body>
</html>
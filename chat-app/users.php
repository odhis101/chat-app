<?php 
    session_start();
    include 'php/config.php'; 
    if (!isset($_SESSION['unique_id'])){ // if he doesn't have a unique id he is redirected
        
        header('location: login.php');
    }
     
?>

<?php include ('header.php') ?>

    <body>
    <div class="wrapper">
        <section class="users">
        
          <?php
            
            $sql = "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']} ";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);

            }
          ?>
           <header>
                <div class="content">
                    <img src="assets/img/img<?php echo $row['img'];?>" alt="" >
                    
                    <div class="details">
                        <span><?php echo $row['fname'],' ', $row ['lname']  ;?> </span>
                        <p> <?php echo $row['status'];?></p>
                    </div>
                    
                </div>
                <a href="php/logout.php?id=<?php echo $row['unique_id'] ?>" class="logout"> logout</a>
           </header>
    
           <div class="search">
              <span class="text">Select a users to chat with</span>
               <input type="text" placeholder=" Enter name to search ...">
               <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            
               

        </section>
    </div>
        
        <script src="assets/javascript/users.js" async defer></script>
    </body>
</html>
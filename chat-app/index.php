<?php 
    session_start();
  
?>
<?php include ('header.php') ?>
    <body>
        
    <div class="wrapper">
        <section class="form signup">
            <header> Realtime chat app </header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <lable>First name </lable>
                        <input type="text" name=fname placeholder="first name" required>
                    </div>
                    <div class="field input">
                        <lable>Last name </lable>
                        <input type="text" name=lname placeholder="Last name" required>
                    </div> 
                    <div class="field input">
                        <lable>Email Address: </lable>
                        <input type="text" name=email placeholder="Email Address" required>
                    </div> 
                    <div class="field input">
                        <lable>Password </lable>
                        <input type="password" name = password placeholder="Enter your password " required>
                        <i class="fas fa-eye"> </i>
                    </div> 
                    <div class="field image">
                        <lable>Select Image </lable>
                        <input type="file" name= image required>
                    </div> 
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
                </div>
            </form> 
            <div class="link"> Already signed up? <a href='login.php' >Login now</a></div>
    
    
    
    


        </section>
    </div>
        
        <script src="assets/javascript/show-pass.js" async defer></script>
        <script src="assets/javascript/signup.js" async defer></script>

    </body>

</html>
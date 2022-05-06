<?php 

?>
<?php include ('header.php') ?>
    <body>
    <div class="wrapper">
        <section class="form login">
            <header> Realtime chat app </header>
            <form action="#">
                <div class="error-txt"></div>
                <div class="name-details">
            
                    <div class="field input">
                        <lable>Email Address: </lable>
                        <input type="text" name= 'email' placeholder="Email Address">
                    </div> 
                    <div class="field input">
                        <lable>Password </lable>
                        <input type="password" name='password' placeholder="Enter your password ">
                        <i class="fas fa-eye"> </i>
                    </div> 
                    <div class="field button">
                        <input type="submit" value="Continue to chat">
                    </div>
                </div>
            </form> 
            <div class="link"> No Account, No Problem? <a href='index.php' >Sign Up now</a></div>
    
    
    
    


        </section>
    </div>
        
    <script src="assets/javascript/show-pass.js" async defer></script>
    <script src="assets/javascript/login.js" async defer></script>
    </body>
</html>
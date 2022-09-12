<?php require_once 'app/init.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SITE_NAME; ?> - REGISTER</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
</head>
<body>
    <header>
            <div id="navBar"></div>
            <img class="headerImage" src="images/avatar.png" alt="">
    </header>
    <main>
          <h2>Sign Up</h2>
          <div id="formcontainer">
              <form action="" method="post">
                  <div class="form-container">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="formclass" placeholder="Enter Your Name">
                  </div>
                  <div class="form-container">
                     <label for="email">Email</label>
                     <input type="text" name="email" id="email" class="formclass" placeholder="Enter Email">
                  </div>
                  <div class="form-container">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="formclass" placeholder="Enter Password">
                  </div>
                  <div class="form-container">
                     <label for="confirmPassword">Confirm Password</label>
                     <input type="password" name="confirmPassword" id="confirmPassword" class="formclass" placeholder="Confirm Password">
                  </div>
                  <div class="form-container">
                     <input type="submit" value="REGISTER" class="formclass">
              </form>
              <p>Already have an Account? <a href="login.php">Login</a></p>
          </div> 
    </main>
    <footer>
               Mini Q&A - &copy copyright 2022
    </footer>
    
</body>
</html>
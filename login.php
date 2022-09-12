<?php require_once 'app/init.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SITE_NAME; ?> - Sign In</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
</head>
<body>
    <header>
            <div id="navBar"></div>
            <img class="headerImage" src="images/avatar.png" alt="">
    </header>
    <main>
          <h2>Sign In</h2>
          <div id="formcontainer">
              <form action="" method="post">
                  <div class="form-container">
                     <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="formclass" placeholder="Enter Email">
                  </div>
                  <div class="form-container">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="formclass" placeholder="Enter Password">
                  </div>
                  <div class="form-container">
                     <input type="submit" value="LOGIN" class="formclass">
                  </div>
              </form>
              <p>Don't have an Account? <a href="register.php">Register</a></p>
          </div> 
    </main>
    <footer>
               Mini Q&A - &copy copyright 2022
    </footer>
    
</body>
</html>
<?php require_once 'app/init.php'; ?>
<?php
   //Instantiate user object
   $login_user = new User;
   $login_user->login();

?>

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
              <form action="<?php echo URL_ROOT ?>/login.php" method="post">
                  <div class="form-container">
                     <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="formclass <?php echo (!empty($login_user->data['emailErr'])) ? 'inputError' : ''; ?>" value="<?php echo $login_user->data['email']; ?>" placeholder="Enter Email">
                    <span class="errorText block"><?php echo $login_user->data['emailErr']; ?></span>
                  </div>
                  <div class="form-container">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="formclass <?php echo (!empty($login_user->data['passwordErr'])) ? 'inputError' : ''; ?>" value="<?php echo $login_user->data['password']; ?>" placeholder="Enter Password">
                     <span class="errorText block"><?php echo $login_user->data['passwordErr']; ?></span>
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
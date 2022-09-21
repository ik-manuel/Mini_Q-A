<?php require_once 'app/init.php'; ?>
<?php
   //instantiate user object
   $reg_user = new User;
   $reg_user->register();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SITE_NAME; ?> - Register</title>
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
              <form action="<?php echo URL_ROOT ?>/register.php" method="post">
                  <div class="form-container">
                     <label for="name">Name</label>
                     <input type="text" name="name" id="name" class="formclass <?php echo (!empty($reg_user->data['nameErr'])) ? 'inputError' : ''; ?>" value="<?php echo $reg_user->data['name']; ?>" placeholder="Enter Your Name">
                     <span class="errorText block"><?php echo $reg_user->data['nameErr']; ?></span>
                  </div>
                  <div class="form-container">
                     <label for="email">Email</label>
                     <input type="text" name="email" id="email" class="formclass <?php echo (!empty($reg_user->data['emailErr'])) ? 'inputError' : ''; ?>" value="<?php echo $reg_user->data['email']; ?>" placeholder="Enter Email">
                     <span class="errorText block"><?php echo $reg_user->data['emailErr']; ?></span>
                  </div>
                  <div class="form-container">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="formclass <?php echo (!empty($reg_user->data['passwordErr'])) ? 'inputError' : ''; ?>" value="<?php echo $reg_user->data['password']; ?>" placeholder="Enter Password">
                     <span class="errorText block"><?php echo $reg_user->data['passwordErr']; ?></span>
                  </div>
                  <div class="form-container">
                     <label for="confirm_password">Confirm Password</label>
                     <input type="password" name="confirm_password" id="confirmPassword" class="formclass <?php echo (!empty($reg_user->data['confirm_passwordErr'])) ? 'inputError' : ''; ?>" value="<?php echo $reg_user->data['confirm_password']; ?>" placeholder="Confirm Password">
                     <span class="errorText block"><?php echo $reg_user->data['confirm_passwordErr']; ?></span>
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
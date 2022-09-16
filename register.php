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
                     <input type="text" name="name" id="name" class="formclass <?php echo (!empty($data['name_err']) ? 'inputError' : '') ?>" value=" <?php echo $data['name']; ?>" placeholder="Enter Your Name">
                     <span class="errorText"> <?php echo $data['name_err'] ?></span>
                  </div>
                  <div class="form-container">
                     <label for="email">Email</label>
                     <input type="text" name="email" id="email" class="formclass <?php echo (!empty($data['email_err']) ? 'inputError' : '') ?>" value=" <?php echo $data['email']; ?>" placeholder="Enter Email">
                     <span class="errorText"> <?php echo $data['email_err'] ?></span>
                  </div>
                  <div class="form-container">
                     <label for="password">Password</label>
                     <input type="password" name="password" id="password" class="formclass <?php echo (!empty($data['password_err']) ? 'inputError' : '') ?>" placeholder="Enter Password">
                     <span class="errorText"> <?php echo $data['password_err'] ?></span>
                  </div>
                  <div class="form-container">
                     <label for="confirmPassword">Confirm Password</label>
                     <input type="password" name="confirmPassword" id="confirmPassword" class="formclass <?php echo (!empty($data['confirm_password_err']) ? 'inputError' : '') ?>" placeholder="Confirm Password">
                     <span class="errorText"> <?php echo $data['confirm_password_err'] ?></span>
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
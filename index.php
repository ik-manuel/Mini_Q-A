<?php

require_once 'app/init.php';
//User object
$user = new User;
//Instantiate Question Object
$questions = new Questions;
//add new question
$questions->addQuestion();

?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo SITE_NAME; ?> - Ask & Get Answer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
            <div id="navBar"></div>
            <img class="headerImage" src="images/avatar.png" alt="">
    </header>

     <!-- Flash Message -->
     <?php flash('success_message'); ?>

    <main>
           <div id="heading">
                <h1><?php echo SITE_NAME; ?></h1>
                <form action="<?php echo URL_ROOT; ?>/index.php" method="post" id="formClass">
                    <input type="text" name="question" placeholder=" <?php echo (!empty($questions->data['questionErr'])) ? $questions->data['questionErr'] : 'What\'s your Question?'; ?>" class="qstFormClass <?php echo (!empty($questions->data['questionErr'])) ? 'inputError' : ''; ?>">
                    <input type="submit" name="submit" value="ASK" class="submitButton">
                </form>
           </div>
           <div id="container">
                <div id="top">
                    <h2>Top Questions</h2>
                    <div class="navMenu">
                        <ul>
                            <!-- Show only for non-logged in ans loggedin user -->
                            <?php if($user->isLoggedIn()) : ?>
                                <li><a href="" class="btn-nav">My Questions</a></li>
                                <li><a href="">My Answers</a></li>
                                <li><a href="app/helper/logout.php" class="btn">Log Out</a></li>
                            <?php else : ?>
                            <li><a href="login.php" class="btn">Login/Register</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="questionBox">
                    <!-- Looping throught question records -->
                    <?php foreach($questions->fetchAllQuestions() as $question) : ?>
                    <div class="questions">
                        <div class="question">
                           <h3><a href="question.php?qst=<?php echo $question->qst_id; ?>"><?php echo $question->question; ?></a> <span class="ansCount">(2 Answer) 
                            <!-- Add edit/delete button when session/question owner exist    -->
                            <?php if($user->isLoggedIn()) : ?>
                                <?php if($question->user_id == $_SESSION['user_id']) : ?> 
                                    <a class="editBtn" href=" <?php echo URL_ROOT; ?> /index.php?edit=<?php echo $question->qst_id; ?> ">Edit</a>
                                <?php endif ; ?>
                            <?php endif ; ?>
                        </span> </h3>
                        </div>
                        <div class="questionDate">
                            <p>Asked <?php echo $question->created_at; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    
                </div>
                
               
           </div>

    </main>
    <footer>
            Mini Q&A - &copy copyright 2022
    </footer>
    
</body>
</html>
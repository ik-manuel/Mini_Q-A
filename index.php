<?php

require_once 'app/init.php';

echo APPROOT;
?> 




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Q&A - Ask & Get Answer</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
            <div id="navBar"></div>
            <img class="headerImage" src="images/avatar.png" alt="">
    </header>
    <main>
           <div id="heading">
                <h1>Mini Q&A</h1>
                <form action="" method="post" id="formClass">
                    <input type="text" name="question" placeholder="What's your Question?" class="qstFormClass">
                    <input type="submit" name="submit" value="ASK" class="submitButton">
                </form>
           </div>
           <div id="container">
                <div id="top">
                    <h2>Top Questions</h2>
                    <div class="navMenu">
                        <ul>
                            <li><a href="" class="btn-nav">My Questions</a></li>
                            <li><a href="">My Answers</a></li>
                            <li><a href="signin.html" class="btn">Login/Sign Up</a></li>
                        </ul>
                    </div>
                </div>
                <div class="questionBox">
                    <div class="questions">
                        <div class="question">
                           <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a> <span>(2 Answer)</span> </h3>
                        </div>
                        <div class="questionDate">
                            <p>Asked August 10th, 2022</p>
                        </div>
                    </div>
                    <div class="questions">
                        <div class="question">
                           <h3><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a> <span>(2 Answer)</span> </h3>
                        </div>
                        <div class="questionDate">
                            <p>Asked August 10th, 2022</p>
                        </div>
                    </div>
                    <div class="questions">
                        <div class="question">
                           <h3><a href="">Lorem ipsum dolor sit amet consectetur?</a> <span>(2 Answer)</span> </h3>
                        </div>
                        <div class="questionDate">
                            <p>Asked August 10th, 2022</p>
                        </div>
                    </div>

                </div>
                
               
           </div>

    </main>
    <footer>
            Mini Q&A - &copy copyright 2022
    </footer>
    
</body>
</html>
<?php
require_once '../init.php';

//Log out user
function logout(){
    $user = new User;
    $user->logOut();
}

logout();
<?php
/*
*Helper function to handle redirect
*Flash message session
*/

//Start session
session_start();


//Redirect function
function redirect($url){
    header("location:". URL_ROOT . "/". $url);
}



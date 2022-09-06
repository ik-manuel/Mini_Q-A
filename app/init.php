<?php

// Load Config 
require_once 'config.php';

// Autoload Classes
spl_autoload_register(function($className){
    require_once '/' . $className . 'php';
});
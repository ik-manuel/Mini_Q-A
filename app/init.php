<?php

// Load Config 
require_once 'config/config.php';

// Autoload Classes
spl_autoload_register(function($className){
    require_once 'libraries/' . $className . '.php';
});

<?php
session_start();
    ob_start(); // Turning on output buffering
    require_once('credentials.php');//defined database credentials
    require_once('db_functions.php');//defined database functions
    require_once('validation_functions.php');//defined database functions

    // Load all classes in the directory
    foreach (glob('classes/*.class.php') as $model) {
        include_once($model);
    }

    //Autoload Class Definitions
    function my_autoload($class)
    {
        if (preg_match('/\A\w+\Z/',$class)) {
            include('classes/'.$class.'.class.php');
        }
    }
    spl_autoload_register('my_autoload');
    $database= db_connect();
    Databaseobject::setDatabase($database);

?>
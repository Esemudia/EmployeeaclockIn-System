<?php
//Database connection
    function db_connect()
    {
        $database= new mysqli(DB_Server,DB_user,DB_pass,DB_name);
         confirm_db_conn( $database);
         return $database;
    }

function  confirm_db_conn($database)
    {
        if ($database->connect_errno) {
            $msg="Database Connection Failed: ";
            $msg .=$database->connect_error;
            $msg .="(".$database->connect_errno.")";
            exit($msg);
        }
    }

    function db_disconnect($database)
    {
        if (isset($database)) {
            $database->close();
        }
    }
?>
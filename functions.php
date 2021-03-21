<?php
    require('classes/DB.php');
    require('classes/Users.php');
    require('classes/Messages.php');

    session_start();

    global $db;
    $db = new DB();

 ?>
<?php
require("../functions.php");
$currentUser = new User($_SESSION['id']);
if ($currentUser) {
    session_destroy();
    header("Location: http://localhost/dylan/chat-app/views/login.php");
    
    exit();
} else {
    alert("An Error Occured When Trying To Log Out");

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}
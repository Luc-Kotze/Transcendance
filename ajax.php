<?php 

require 'functions.php';


$action = $_POST['action'];

if ($action == 'signup') {


    $user = insert_record('users', [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $_SESSION['id'] = $user['id'];


    echo json_encode([

        'result' => true

    ]);
    exit();
}

if ($action == 'signin') {

    $result = false;

    $error = '';

    $user_exists = record_exists('users', 'name', $_POST['name']);
    if ($user_exists) {

        $user = get_result_by_key('users', 'name', $_POST['name']);
        if (password_verify($_POST['password'], $user['password'])) {

            $_SESSION['id'] = $user['id'];
            $result = true;
        } else {

            $error = "Incorrect Password";

        }

        

    } else {

        $error = "Username does not exist";

    }

    


    echo json_encode([

        'success' => $result,
        'error' => $error

    ]);
    exit();
}
<?php 

require 'functions.php';
global $db;

$action = $_POST['action'];

if ($action == 'signup') {
    User::signup($_POST['name'], $_POST['email'], $_POST['password']);
    echo json_encode([
        'result' => true
    ]);
    exit();
}

if ($action == 'signin') {
    $result = User::signin($_POST['name'], $_POST['password']);
    echo json_encode($result);
    exit();
}

if ($action == 'sendMessage') {
    $result = Message::send($_POST['content'], $_POST['recipientId']);
    echo json_encode([
        'html' => $result->html()
    ]);
    exit();
}
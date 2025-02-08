<?php
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $id = $_POST['id'];

    $status = $_SESSION['tasks'][$id]['status'];

    if ($status == 'Pending')
        $_SESSION['tasks'][$id]['status'] = 'Done';
    else
        $_SESSION['tasks'][$id]['status'] = 'Pending';

    header("location: ../index.php");
}

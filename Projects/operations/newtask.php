<?php
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $task = $_POST['task'];

    $data = [
        'name' => $task,
        'status' => 'pending'
    ];

    array_push($_SESSION['tasks'], $data);


    header("location: ../index.php");
}

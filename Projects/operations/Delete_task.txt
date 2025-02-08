<?php

session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $id = $_POST['id'];

    unset($_SESSION['tasks'][$id]);

    header("location: ../index.php");
}

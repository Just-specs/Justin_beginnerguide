
<?php

session_start();

if(isset($_POST['id'])){
    $id = $_POST['id'];

   if(isset($_SESSION['contacts'][$id])){
     unset($_SESSION['contacts'][$id]);
     $_SESSION['contacts']= array_values(array: $_SESSION['contacts']);
   } 
}

header(header: 'Location: index.php');

exit;
?>

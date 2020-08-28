<?php
session_start();
require_once 'includes/dbConnection.php';
 

if(isset($_POST['submit']))
{
 
    $first_name = htmlentities($_POST['first_name']);
    $last_name= htmlentities($_POST['last_name']);
    $email= htmlentities($_POST['email']);
    $address= htmlentities($_POST['address']);
    

    if($person->IsEmpty(array($first_name,$last_name,$email,$address)))
     {
        $_SESSION['msg'] = $person->Create($first_name,$last_name,$email,$address);
     }else{
        $_SESSION['msg'] = 'Failed !! Empty fields !!';
     }
     if($_SESSION['msg'] == '1'){
        $_SESSION['msg'] = "Success !! Employee is added .";
     } 
}

header("Location: index.php");






?>




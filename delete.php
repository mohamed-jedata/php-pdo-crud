<?php
session_start();
require_once 'includes/dbConnection.php';


if(isset($_GET['delete_id']))
{

    $id = $_GET['delete_id'];
    

    if($person->IsEmpty(array($id)))
     {
        $_SESSION['msg'] =  $person->Delete($id);
     }else{
        $_SESSION['msg'] = 'Failed !! Empty fields !!';
     }
     if($_SESSION['msg'] == '1'){
      $_SESSION['msg'] = "Success !! Employee is Deleted .";
   } 
}

header("Location: index.php");






?>




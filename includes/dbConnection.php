<?php


$hostname = "localhost";
$username = "mohamed";
$password = "jedata";
$dbname = "pdo";


try{
   
   $conn = new PDO("mysql:$hostname=localhost;dbname=$dbname", $username,$password);

// , array(
//     PDO::ATTR_PERSISTENT => true
// )
   
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   
//    echo "Connection successd<br>";

}catch(PDOException $ex){

    echo "Error : " . $ex->getMessage() . "<br>";
    die();

}


include_once 'person.php';


$person = new PersonDB($conn);






















?>
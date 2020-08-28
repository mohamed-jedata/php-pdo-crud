<?php
session_start();
require_once 'includes/dbConnection.php';



if(isset($_GET['edit_id']) && !isset($_POST['update'])){

    $id = rawurlencode($_GET['edit_id']);

     $row = $person->getID($id) ;


?>




<form class="uk-grid-small" method="POST" action="edit.php?edit_id=<?php echo $id;?>" uk-grid>
    <div class="uk-width-1-2@s">
        <input class="uk-input" type="text" value="<?php echo $row['first_name']; ?>" name="first_name">
    </div>
    <div class="uk-width-1-2@s">
        <input class="uk-input" type="text" value="<?php echo $row['last_name']; ?>" name="last_name">
    </div>
    <div class="uk-width-1-1@s">
        <input class="uk-input" type="email" value="<?php echo $row['email']; ?>" name="email">
    </div>
    <div class="uk-width-1-1@s">
        <input class="uk-input" type="text" value="<?php echo $row['address']; ?>" name="address">
    </div>
    
    <div>
    <button class="uk-button uk-button-primary" type="submit" name="update">update</button>
    </div>



</form>

<?php
}


if(isset($_GET['edit_id']) && isset($_POST['update'])){

    $id = urlencode($_GET['edit_id']);
    $first_name = htmlentities($_POST['first_name']);
    $last_name= htmlentities($_POST['last_name']);
    $email= htmlentities($_POST['email']);
    $address= htmlentities($_POST['address']);
    

    if($person->IsEmpty(array($id,$first_name,$last_name,$email,$address)))
     {
        $_SESSION['msg'] = $person->Update($id,$first_name,$last_name,$email,$address);
     }else{
        $_SESSION['msg'] = 'Failed !! Empty fields !!';
     }
     if($_SESSION['msg'] == '1'){
        $_SESSION['msg'] = "Success !! Employee is Updated .";
     } 

     header("Location: index.php");
}






?>

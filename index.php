<?php
session_start();
require_once 'includes/dbConnection.php';
require_once 'includes/header.php';

?>







    <nav class="uk-navbar-container" uk-navbar>

<div class="uk-navbar-left">

    <ul class="uk-navbar-nav">
        <li class="uk-active"><a href="index.php">Employees management</a></li>
    </ul>

</div>


<div class="uk-navbar-right">

    <ul class="uk-navbar-nav">

<!-- This is a button toggling the modal -->
<button class="uk-button uk-button-default uk-margin-small-right" style="color: red;" type="button" uk-toggle="target: #modal-example"> <i class="fas fa-plus"></i> &nbsp; Add User  </button>

    </ul>

</div>

</nav>



  <?php  
if(isset($_SESSION['msg']))
{
  
    $msg= $_SESSION['msg'];
    $_SESSION['msg']=null;
    ?>
    <div  class="uk-padding-large" style="margin-bottom: -80px;">
<div class="uk-alert-danger " uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>
        <?php
    echo $msg;
    ?>
</p>
</div>

</div>
<?php
}
?>








<!-- This is the modal -->
<div id="modal-example" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Add Employee</h2>


        <form class="uk-grid-small" method="POST" action="create.php" uk-grid>
    <div class="uk-width-1-2@s">
        <input class="uk-input" type="text" placeholder="First Name" name="first_name">
    </div>
    <div class="uk-width-1-2@s">
        <input class="uk-input" type="text" placeholder="Last Name" name="last_name">
    </div>
    <div class="uk-width-1-1@s">
        <input class="uk-input" type="email" placeholder="E-Mail" name="email">
    </div>
    <div class="uk-width-1-1@s">
        <input class="uk-input" type="text" placeholder="Address" name="address">
    </div>
    
    <div>
    <button class="uk-button uk-button-primary" type="submit" name="submit">Add</button>
    </div>



</form>


    </div>
</div>





 

    <div class="uk-container uk-padding-large  uk-table-responsive " uk-scrollspy="target: > *; cls: uk-animation-fade; delay: 500">
       <h3 class="uk-card-title">Employees Information :</h3>
       <?php $person->DataView(); ?>
    </div>







<!-- This is the Edit model -->
<div id="model-edit" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        
    <h2 class="uk-modal-title">Edit Info :</h2>
 
    <div id="updateForm">
<!-- Edit form edit.php-->

    </div>

    </div>
</div>



<?php

require_once 'includes/footer.php';

?>




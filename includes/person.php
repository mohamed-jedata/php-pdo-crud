<?php

include_once 'Database.php';

class PersonDB implements IDatabase{
 
  private $db ;

  public function __construct($conn)
  {
      $this->db = $conn;
  }


  public function IsEmpty(array $fields){

    foreach ($fields as $value) {
      if(empty($value)){
        return false;
      }
    }
    return true;

  }

  public function Create($first_name,$last_name,$email,$address){

    try{

        $stmp = $this->db->prepare("INSERT INTO `users`(`first_name`, `last_name`, `email`, `address`) VALUES (:first_name,:last_name,:email,:address)");
    
        $stmp->bindParam(':first_name',$first_name);
        $stmp->bindParam(':last_name',$last_name);
        $stmp->bindParam(':email',$email);
        $stmp->bindParam(':address',$address);
    
        $stmp->execute();
    
        return true;
     
    }catch(PDOException $ex){
     
         return "Error : " . $ex->getMessage() . "<br>";
         return false;
  
    }

  }


  public function Update($id,$first_name,$last_name,$email,$address){
    
    try{

        $stmp = $this->db->prepare("UPDATE `users` SET `first_name`=:first_name,`last_name`=:last_name,`email`=:email,`address`=:address WHERE `id`=:id");
    
        $stmp->bindParam(':id',$id);
        $stmp->bindParam(':first_name',$first_name);
        $stmp->bindParam(':last_name',$last_name);
        $stmp->bindParam(':email',$email);
        $stmp->bindParam(':address',$address);
    
        $stmp->execute();
    
        return true;
     
    }catch(PDOException $ex){
     
         echo "Error : " . $ex->getMessage() . "<br>";
         return false;
  
    }

  }


  public function getID($id){


    try{

      $stmp = $this->db->prepare("SELECT * FROM `users` WHERE `id` = :id");
  
      // $stmp->bindParam(':id',$id);
      $stmp->execute(array(":id"=>$id));
      $editRow = $stmp->fetch(PDO::FETCH_ASSOC);
      return $editRow ;

   
  }catch(PDOException $ex){
   
       echo "Error : " . $ex->getMessage() . "<br>";
       return false;

  }


  }


  
  public function Delete($id){


    try{

      $stmp = $this->db->prepare("DELETE FROM `users` WHERE `id`=:id");
  
      $stmp->bindParam(':id',$id);
      $stmp->execute();

      return true;
   
  }catch(PDOException $ex){
   
       echo "Error : " . $ex->getMessage() . "<br>";
       return false;

  }


  }



  public function DataView(){


    try{

      $stmp = $this->db->prepare("SELECT * FROM `users`");
      $stmp->execute();
?>
      <table class="uk-table uk-table-striped">

      <thead>
          <tr>
              <th>#</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Address</th>
          </tr>
      </thead>
      <tbody>
<?php
      if($stmp->rowCount()>0){
        while($row = $stmp->fetch(PDO::FETCH_ASSOC)){       
          ?>

          <tr>
            <td class="editId"><?php echo $row['id'];?></td>
            <td><?php echo htmlentities($row['first_name']);?></td>
            <td><?php echo htmlentities($row['last_name']);?></td>
            <td><?php echo htmlentities($row['email']);?></td>
            <td><?php echo htmlentities($row['address']);?></td>
            <td>

            <a class="uk-button uk-button-primary updateInfo"  href="#model-edit" uk-toggle>
                  <i class="fas fa-pencil-alt" style="padding-right: 6px;"></i>Edit
            </a>

                  
           </td>
           <td>
                <a class="uk-button uk-button-danger" href="delete.php?delete_id=<?php echo $row['id']; ?>">
                  <i class="fas fa-trash-alt" style="padding-right: 6px;"></i>Delete
                </a>
                <!-- <a href="delete.php?delete_id=<?php// echo $row['id']; ?>">
                  <i class="fas fa-2x fa-trash-alt" ></i>
                </a> -->
            </td>

          </tr>
    <?php  
    }

      }else{
        ?>
        <tr>
        <td>  No records (:<td>
        </tr>
        <?php
      }
      ?>
      </tbody>
      </table>

  <?php 
  }catch(PDOException $ex){
   
       echo "Error : " . $ex->getMessage() . "<br>";
       return false;

  }


  }



}









?>




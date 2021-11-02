<?php 
if(array_key_exists('id',$_GET) && !empty($_GET['id'])){
      $id = $_GET['id'];
      require_once($_SERVER['DOCUMENT_ROOT'].'/core/database.php');
    
      if($database){
         $sql = "DELETE  FROM books WHERE id=$id";
         $status = mysqli_query($database ,$sql);
         if($status){
             header('Location: /pages/books/index.php');
         }
          
      }
}
?>
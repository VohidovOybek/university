<?php 
$errors = [];
if($_SERVER['REQUEST_METHOD'] ==   'POST'){
    require_once($_SERVER['DOCUMENT_ROOT'].'/core/database.php');
    if(array_key_exists('first_name',$_POST) && !empty($_POST['first_name'])){
        $f_name = $_POST['first_name'];
    }else{
        $errors['first_name'] = 'First name is required!'; 
    }

    if(array_key_exists('last_name',$_POST) && !empty($_POST['last_name'])){
        $l_name = $_POST['last_name'];
    }else{
        $errors['last_name'] = 'Last name is required!'; 
    }
    
    if(array_key_exists('group_number',$_POST) && !empty($_POST['group_number'])){
        $group_number = $_POST['group_number'];
    }else{
        $errors['group_number'] = 'Group_Number is required!'; 
    }

    if(array_key_exists('id_card',$_POST) && !empty($_POST['id_card'])){
        $id_card = $_POST['id_card'];
    }else{
        $errors['id_card'] = 'ID CARD is required!'; 
    }

    if(array_key_exists('id',$_POST) && !empty($_POST['id'])){
        $id= $_POST['id'];
    }else{
        $errors['id'] = 'ID  is required!'; 
    }

    if(count($errors) == 0){
        $sql = "UPDATE  students SET first_name = '$f_name' , lastname='$l_name', group_number = '$group_number', id_card = '$id_card' WHERE id = $id";
        $status = mysqli_query($database , $sql);
        if($status){
            header('Location: /pages/students/index.php');
        }else{
            dump($status);
        }
    }else{
        dump($errors);
    }
}
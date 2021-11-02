<?php 
$errors = [];
if($_SERVER['REQUEST_METHOD'] ==   'POST'){
    require_once($_SERVER['DOCUMENT_ROOT'].'/core/database.php');

    if(array_key_exists('name',$_POST) && !empty($_POST['name'])){
        $name = $_POST['name'];
    }else{
        $errors['name'] = 'Name is required!';
    }
    if(array_key_exists('id',$_POST) && !empty($_POST['id'])){
        $id= $_POST['id'];
    }else{
        $errors['id'] = 'ID  is required!'; 
    }

    if(count($errors) == 0){
        $sql = "UPDATE  group_names SET name = '$name' WHERE id = $id";
        $status = mysqli_query($database , $sql);
        if($status){
            header('Location: /pages/group_names/index.php');
        }else{
            dump($status);
        }
    }else{
        dump($errors);
    }
}
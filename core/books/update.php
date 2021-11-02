<?php 
$errors = [];
if($_SERVER['REQUEST_METHOD'] ==   'POST'){
    require_once($_SERVER['DOCUMENT_ROOT'].'/core/database.php');

    if(array_key_exists('title',$_POST) && !empty($_POST['title'])){
        $title = $_POST['title'];
    }else{
        $errors['title'] = 'Title is required!';
    }

    if(array_key_exists('quantity',$_POST) && !empty($_POST['quantity'])){
        $quantity = $_POST['quantity'];
    }else{
        $errors['quantity'] = 'Quantity is required!';
    }
    if(array_key_exists('id',$_POST) && !empty($_POST['id'])){
        $id= $_POST['id'];
    }else{
        $errors['id'] = 'ID  is required!'; 
    }

    if(count($errors) == 0){
        $sql = "UPDATE  books SET title = '$title',quantity = '$quantity' WHERE id = $id";
        $status = mysqli_query($database , $sql);
        if($status){
            header('Location: /pages/books/index.php');
        }else{
            dump($status);
        }
    }else{
        dump($errors);
    }
}
<?php 
$errors = [];
if($_SERVER['REQUEST_METHOD'] ==   'POST'){
    require_once($_SERVER['DOCUMENT_ROOT'].'/core/database.php');
    if(array_key_exists('room_number',$_POST) && !empty($_POST['room_number'])){
        $r_number = $_POST['room_number'];
    }else{
        $errors['room_number'] = 'Room number is required!';
    }


    if(count($errors) == 0){
        $sql = "INSERT INTO rooms values(null,'$r_number')";
        $status = mysqli_query($database , $sql);
        if($status){
            header('Location: /pages/rooms/index.php');
        }else{
            dump($status);
        }
    }else{
        dump($errors);
    }
}
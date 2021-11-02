<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    $errors = [];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");

    if (array_key_exists('first_name', $_POST) && !empty($_POST['first_name'])){
        $f_name = $_POST['first_name'];
    }else{
        $errors['first_name'] = 'First name is required!';
    }

    if (array_key_exists('last_name', $_POST) && !empty($_POST['last_name'])){
        $l_name = $_POST['last_name'];
    }else{
        $errors['last_name'] = 'Last name is required!';
    }


    if (array_key_exists('id_card', $_POST) && !empty($_POST['id_card'])){
        $id_card = $_POST['id_card'];
    }else{
        $errors['id_card'] = 'ID Card is required!';
    }

    if (array_key_exists('student', $_POST) && !empty($_POST['student'])){
        $student_ids = $_POST['student']; // [1, 3, 4, 5];
    }else{
        $errors['student'] = 'Student is required';
    }



    if(count($errors) == 0){
        $sql = "INSERT INTO teachers values (null, '$f_name', '$l_name', '$id_card')";
        $status = mysqli_query($database, $sql);
        $sql2 = 'SELECT LAST_INSERT_ID() as id';
        $table_data = mysqli_query($database, $sql2);
        if($row = mysqli_fetch_assoc($table_data)){
            $id = $row['id'];
            $count_students = count($student_ids);
            if($count_students > 0 && $id != 0){
                $sql3 = "INSERT INTO student_teacher VALUES ";
                // insert into student_teacher values (1, 1)
                foreach($student_ids as $key => $student_id){
                    if($key != ($count_students - 1)){
                        $sql3 .= "($student_id, $id),";
                    }else{
                        $sql3 .= "($student_id, $id)";
                    }
                }
                mysqli_query($database, $sql3);
            }

        }
        if($status){
            header('Location: /pages/teachers/index.php');
        }
    }else{
        dump($errors);
    }

}

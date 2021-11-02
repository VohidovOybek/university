<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');

    if ($database) {
        $sql = "SELECT * FROM students WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if (!$table_data) {
            header('Location: /pages/students/index.php');
        } else {
            if (mysqli_num_rows($table_data) > 0) {
                $student = mysqli_fetch_assoc($table_data);
            }
        }
    }
}
?>
<main>
<h2 class="mx-5 mb-3"> Show student </h2>
<div class="card w-50 mx-5">
  <div class="card-header">
   id = <?= $id ?>
  </div>
  <div class="card-body">
    <h5 class="title">First_name :<?= $student['first_name']?></h5>
    <hr>
    <h5 class="title">Last_name : <?= $student['lastname']?></h5>
    <hr>
    <h5 class="title">Group_number : <?= $student['group_number']?></h5>
    <hr>
    <h5 class="title">Id_card : <?= $student['id_card']?></h5>
    
    <a href="/pages/students/index.php" class="btn btn-primary float-end">Go back</a>
  </div>
</div>
</main>
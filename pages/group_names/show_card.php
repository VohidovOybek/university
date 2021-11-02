<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');

    if ($database) {
        $sql = "SELECT * FROM group_names WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if (!$table_data) {
            header('Location: /pages/group_names/index.php');
        } else {
            if (mysqli_num_rows($table_data) > 0) {
                $gr_name = mysqli_fetch_assoc($table_data);
            }
        }
    }
}
?>
<main>
<h2 class="mx-5 mb-3"> Show Group </h2>
<div class="card w-50 mx-5">
  <div class="card-header">
   id = <?= $id ?>
  </div>
  <div class="card-body">
    <h5 class="title">Title :<?= $gr_name['name']?></h5>


    <a href="/pages/group_names/index.php" class="btn btn-primary float-end">Go back</a>
  </div>
</div>
</main>
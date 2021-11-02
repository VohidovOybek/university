<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $teacher = null;
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM teachers WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(mysqli_num_rows($table_data) > 0){
            $teacher = mysqli_fetch_assoc($table_data);
        }else{
            dump("$id li teacher topilmadi ?");
        }
    }
}else{
    header('Location: /pages/teachers/index.php');
}
?>
<?php if($teacher) : ?>
<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Teachers</h1>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                    Update teacher with id : <?= $id ?? '' ?>
                            </div>
                            <div class="card-body">
                            <form action='/core/teachers/update.php' method='POST'>
                                <div class="form-group">
                                    <label for="first_name">Enter First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" value="<?= $teacher['first_name'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Enter Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="<?= $teacher['last_name'] ?? ''; ?>">
                                </div>
                                
                                <div class="form-group">
                                    <label for="id_card">Enter ID card </label>
                                    <input type="text" name='id_card' class="form-control" id="id_card" placeholder="ID card" value="<?= $teacher['id_card'] ?? ''; ?>">
                                </div>
                                <input name="id" type="hidden" value="<?= $id; ?>">
                                <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
</main>
<?php endif; ?>
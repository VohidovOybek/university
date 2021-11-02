<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM students WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(mysqli_num_rows($table_data) >  0){
          $student =  mysqli_fetch_assoc($table_data);
        }else{
            dump("$id li student topilmadi ?");
        }
    }
}else{
    header('Location: /pages/students/index.php');
} ?>

<?php if($student) :  ?>



<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Students</h1>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                    Update Students with id : <?= $id ?? '' ?>
                            </div>
                            <div class="card-body">
                            <form action='/core/students/update.php' method='POST'>
                                <div class="form-group">
                                    <label for="first_name">Enter First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name" value="<?= $student['first_name'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Enter Last name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name" value="<?= $student['lastname'] ?? ''; ?>">
                                </div>
                                
                               
                                
                                <div class="form-group">
                                    <label for="group_number">Group_number</label>
                                    <input type="number" name='group_number' class="form-control" id="group_id" placeholder="Group number"  value="<?= $student['group_number'] ?? ''; ?>" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="id_card">Enter ID card </label>
                                    <input type="text" name='id_card' class="form-control" id="id_card" placeholder="ID card" value="<?= $student['id_card'] ?? ''; ?>">
                                </div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
</main>
<?php endif ?>
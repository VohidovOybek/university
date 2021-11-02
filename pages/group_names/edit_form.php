<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM group_names WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(mysqli_num_rows($table_data) >  0){
          $gr_name =  mysqli_fetch_assoc($table_data);
        }else{
            dump("$id li guruh topilmadi ?");
        }
    }
}else{
    header('Location: /pages/group_names/index.php');
} ?>

<?php if($gr_name) :  ?>

<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Groups</h1>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                    Update Groups with id : <?= $id ?? '' ?>
                            </div>
                            <div class="card-body">
                            <form action='/core/group_names/update.php' method='POST'>
                                <div class="form-group">
                                    <label for="name">Enter Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= $gr_name['name'] ?? ''; ?>">
                                </div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
</main>
<?php endif ?>
<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM rooms WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(mysqli_num_rows($table_data) >  0){
          $room =  mysqli_fetch_assoc($table_data);
        }else{
            dump("$id li room topilmadi ?");
        }
    }
}else{
    header('Location: /pages/rooms/index.php');
} ?>

<?php if($room) :  ?>



<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Rooms</h1>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                    Update Rooms with id : <?= $id ?? '' ?>
                            </div>
                            <div class="card-body">
                            <form action='/core/rooms/update.php' method='POST'>
                                <div class="form-group">
                                    <label for="room_number_number">Enter room number</label>
                                    <input type="text" name="room_number" class="form-control" id="room_number" placeholder="Room number" value="<?= $room['room_number'] ?? ''; ?>">
                                </div>

                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
</main>
<?php endif ?>
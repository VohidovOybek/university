<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = 'SELECT * FROM rooms';
$students = [];
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $rooms[] = $table_row;
    }
}
?>


<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Rooms</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Rooms</li>
                </ol>
                <a class='btn btn-primary float-end p-2 my-2' href='/pages/rooms/create.php'>Create Room</a>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Room Number</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Room Number</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($rooms) > 0) : ?>
                            <?php foreach ($rooms as  $room) : ?>
                                <tr>
                                    <td><?= $room['id']; ?></td>
                                    <td><?= $room['room_number']; ?></td>

                                    <td class="d-inline-flex ">
                                        <a href="/pages/rooms/edit.php?id=<?= $room['id'] ?>" class="mx-1 btn btn-success">UPDATE</a>
                                        <a href="/core/rooms/delete.php?id=<?= $room['id'] ?>" class=" mx-1 btn btn-danger">DELETE</a>
                                        <a href="/pages/rooms/show.php?id=<?= $room['id'] ?>" class="mx-1 btn btn-warning">SHOW</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
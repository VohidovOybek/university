<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = "SELECT * FROM teachers";
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    $teachers = [];
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $teachers[] = $table_row;
    }
}

$sqlr = "SELECT * FROM rooms";
$table_data = mysqli_query($database, $sqlr);
if (mysqli_num_rows($table_data) > 0) {
    $rooms = [];
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $rooms[] = $table_row;
    }
}

$sqlgn = "SELECT * FROM group_names";
$table_data = mysqli_query($database, $sqlgn);
if (mysqli_num_rows($table_data) > 0) {
    $group_names = [];
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $group_names[] = $table_row;
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Students</h1>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Create new Student
            </div>
            <div class="card-body">
                <form action='/core/students/store.php' method='POST'>
                    <div class="form-group">
                        <label for="first_name">Enter First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Enter Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name">
                    </div>

                    <div class="form-group">
                        <label for="group_number">Group_number</label>
                        <input type="number" name='group_number' class="form-control" id="group_number" placeholder="Group number">
                    </div>

                    <div class="form-group">
                        <label for="id_card">Enter ID card </label>
                        <input type="text" name='id_card' class="form-control" id="id_card" placeholder="ID card">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">SELECT Teacher</label>
                        <select multiple name='Teacher[]' class="form-control" id="exampleFormControlSelect2">
                            <?php if (count($teachers) > 0) : ?>
                                <?php foreach ($teachers as $teacher) : ?>
                                    <option value="<?= $teacher['id'] ?>"><?= $teacher['first_name'] . ' ' . $teacher['last_name'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">SELECT Rooms</label>
                        <select multiple name='room[]' class="form-control" id="exampleFormControlSelect2">
                            <?php if (count($rooms) > 0) : ?>
                                <?php foreach ($rooms as $room) : ?>
                                    <option value="<?= $room['id'] ?>"><?= $room['room_number'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">SELECT Group names</label>
                        <select multiple name='group_names[]' class="form-control" id="exampleFormControlSelect2">
                            <?php if (count($group_names) > 0) : ?>
                                <?php foreach ($group_names as $gr_name) : ?>
                                    <option value="<?= $gr_name['id'] ?>"><?= $gr_name['name'] ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
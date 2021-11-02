<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = "SELECT * FROM students";
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    $students = [];
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $students[] = $table_row;
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
                <h1 class="mt-4">Teachers</h1>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Create new Teacher
            </div>
            <div class="card-body">
                <form action='/core/teachers/store.php' method='POST'>
                    <div class="form-group">
                        <label for="first_name">Enter First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Enter Last name</label>
                        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last name">
                    </div>

                    <div class="form-group">
                        <label for="id_card">Enter ID card </label>
                        <input type="text" name='id_card' class="form-control" id="id_card" placeholder="ID card">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">SELECT Student</label>
                        <select multiple name='student[]' class="form-control" id="exampleFormControlSelect2">
                            <?php if (count($students) > 0) : ?>
                                <?php foreach ($students as $student) : ?>
                                    <option value="<?= $student['id'] ?>"><?= $student['first_name'] . ' ' . $student['lastname'] ?></option>
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
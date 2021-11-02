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

$sqls = "SELECT * FROM students";
$table_data = mysqli_query($database, $sqls);
if (mysqli_num_rows($table_data) > 0) {
    $students = [];
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $students[] = $table_row;
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
                <h1 class="mt-4">Rooms</h1>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Create new Room
            </div>
            <div class="card-body">
                <form action='/core/rooms/store.php' method='POST'>
                    <div class="form-group">
                        <label for="room_number">Enter Room Number</label>
                        <input type="text" name="room_number" class="form-control" id="room_number" placeholder="Room number">
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
                        <label for="exampleFormControlSelect2">SELECT Students</label>
                        <select multiple name='student[]' class="form-control" id="exampleFormControlSelect2">
                            <?php if (count($students) > 0) : ?>
                                <?php foreach ($students as $student ) : ?>
                                    <option value="<?= $student['id'] ?>"><?= $student['first_name'] . ' ' . $student['lastname'] ?></option>
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
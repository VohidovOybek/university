<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = 'SELECT * FROM students';
$students = [];
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $students[] = $table_row;
    }
}
?>


<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Students</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Students</li>
                </ol>
                <a class='btn btn-primary float-end p-2 my-2' href='/pages/students/create.php'>Create Student</a>
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Group Number</th>
                            <th>ID CART</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Group Number</th>
                            <th>ID CART</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($students) > 0) : ?>
                            <?php foreach ($students as  $student) : ?>
                                <tr>
                                    <td><?= $student['id']; ?></td>
                                    <td><?= $student['first_name']; ?></td>
                                    <td><?= $student['lastname']; ?></td>
                                    <td><?= $student['group_number']; ?></td>
                                    <td><?= $student['id_card']; ?></td>
                                    <td class="d-inline-flex ">
                                        <a href="/pages/students/edit.php?id=<?= $student['id'] ?>" class="mx-1 btn btn-success">UPDATE</a>
                                        <a href="/core/students/delete.php?id=<?= $student['id'] ?>" class=" mx-1 btn btn-danger">DELETE</a>
                                        <a href="/pages/students/show.php?id=<?= $student['id'] ?>" class="mx-1 btn btn-warning">SHOW</a>
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
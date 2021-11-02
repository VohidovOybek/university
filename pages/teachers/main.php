<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = 'SELECT * FROM teachers';
$teachers = [];
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $teachers[] = $table_row;
    }
}
?>


<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Teachers</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Teachers</li>
                </ol>
                <a class='btn btn-primary float-end p-2 my-2' href='/pages/teachers/create.php'>Create Teacher</a>
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
                            <th>ID CART</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>ID CART</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($teachers) > 0) : ?>
                            <?php foreach ($teachers as $teacher) : ?>
                                <tr>
                                    <td><?= $teacher['id']; ?></td>
                                    <td><?= $teacher['first_name']; ?></td>
                                    <td><?= $teacher['last_name']; ?></td>
                                    <td><?= $teacher['id_card']; ?></td>
                                    <td>
                                        <div class="d-inline-flex flex-row">
                                            <a class="mx-1 btn btn-success" href='/pages/teachers/edit.php?id=<?= $teacher['id'] ?>'>UPDATE</a>
                                            <a class="mx-1 btn btn-danger" href="/core/teachers/delete.php?id=<?= $teacher['id'] ?>">DELETE</a>
                                            <a class="mx-1 btn btn-warning" href='/pages/teachers/show.php?id=<?= $teacher['id'] ?>'>Show</a>
                                        </div>
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
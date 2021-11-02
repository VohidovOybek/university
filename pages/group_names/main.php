<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = 'SELECT * FROM group_names';
$groups = [];
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $groups[] = $table_row;
    }
}
?>


<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Groups</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Groups</li>
                </ol>
                <a class='btn btn-primary float-end p-2 my-2' href='/pages/group_names/create.php'>Create Group</a>
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
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($groups) > 0) : ?>
                            <?php foreach ($groups as  $group) : ?>
                                <tr>
                                    <td><?= $group['id']; ?></td>
                                    <td><?= $group['name']; ?></td>
                                    <td class="d-inline-flex ">
                                        <a href="/pages/group_names/edit.php?id=<?= $group['id'] ?>" class="mx-1 btn btn-success">UPDATE</a>
                                        <a href="/core/group_names/delete.php?id=<?= $group['id'] ?>" class=" mx-1 btn btn-danger">DELETE</a>
                                        <a href="/pages/group_names/show.php?id=<?= $group['id'] ?>" class="mx-1 btn btn-warning">SHOW</a>
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
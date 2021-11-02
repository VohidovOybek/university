<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/core/database.php');
$sql = 'SELECT * FROM books';
$books = [];
$table_data = mysqli_query($database, $sql);
if (mysqli_num_rows($table_data) > 0) {
    while ($table_row = mysqli_fetch_assoc($table_data)) {
        $books[] = $table_row;
    }
}
?>


<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Books</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Books</li>
                </ol>
                <a class='btn btn-primary float-end p-2 my-2' href='/pages/books/create.php'>Create Book</a>
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
                            <th>Title</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Quantity</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($books) > 0) : ?>
                            <?php foreach ($books as  $book) : ?>
                                <tr>
                                    <td><?= $book['id']; ?></td>
                                    <td><?= $book['title']; ?></td>
                                    <td><?= $book['quantity']; ?></td>
                                    <td class="d-inline-flex ">
                                        <a href="/pages/books/edit.php?id=<?= $book['id'] ?>" class="mx-1 btn btn-success">UPDATE</a>
                                        <a href="/core/books/delete.php?id=<?= $book['id'] ?>" class=" mx-1 btn btn-danger">DELETE</a>
                                        <a href="/pages/books/show.php?id=<?= $book['id'] ?>" class="mx-1 btn btn-warning">SHOW</a>
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
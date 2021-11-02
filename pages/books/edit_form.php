<?php
if (array_key_exists('id', $_GET) && !empty($_GET['id'])){
    $id = $_GET['id'];
    require_once($_SERVER['DOCUMENT_ROOT'] . "/core/database.php");
    if($database){
        $sql = "SELECT * FROM books WHERE id=$id";
        $table_data = mysqli_query($database, $sql);
        if(mysqli_num_rows($table_data) >  0){
          $book =  mysqli_fetch_assoc($table_data);
        }else{
            dump("$id li book topilmadi ?");
        }
    }
}else{
    header('Location: /pages/books/index.php');
} ?>

<?php if($book) :  ?>

<main>
                    <div class="container-fluid px-4">
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class="mt-4">Books</h1>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                    Update Books with id : <?= $id ?? '' ?>
                            </div>
                            <div class="card-body">
                            <form action='/core/books/update.php' method='POST'>
                                <div class="form-group">
                                    <label for="title">Enter Title</label>
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Title name" value="<?= $book['title'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="quantity"> Enter Quantity </label>
                                    <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity" value="<?= $book['quantity'] ?? ''; ?>">
                                </div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-primary mt-3 float-end">Update</button>
                            </form>
                            </div>
                        </div>
                    </div>
</main>
<?php endif ?>
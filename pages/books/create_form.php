
<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Books</h1>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Create new Book
            </div>
            <div class="card-body">
                <form action='/core/books/store.php' method='POST'>
                    <div class="form-group">
                        <label for="title">Enter Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title name">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Enter quantity</label>
                        <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity name">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
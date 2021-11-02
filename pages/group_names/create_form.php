
<main>
    <div class="container-fluid px-4">
        <div class='row'>
            <div class='col-md-12'>
                <h1 class="mt-4">Group Names</h1>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Create new Group
            </div>
            <div class="card-body">
                <form action='/core/group_names/store.php' method='POST'>
                    <div class="form-group">
                        <label for="name">Enter Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Name name">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 float-end">Save</button>
                </form>
            </div>
        </div>
    </div>
</main>
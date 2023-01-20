<?php require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/process/createcategory.php" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="name">
                </div>




                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label for="exampleInputPassword1"  class="form-label">Parent Category</label>
                    <select  class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="parent_id">
                        <option value="0">Main Category</option>
                        <?php
                        $category = new Categories();
                        echo $category->getList();
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>


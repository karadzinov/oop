<?php require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Create product</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/process/createproduct.php" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="name">
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio"  id="inlineRadio1" value="male" name="sex"/>
                    <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="inlineRadio2" value="female" name="sex" />
                    <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>


                <div>
                    <label for="description"  class="form-label">Description</label>
                    <textarea name="description" id="description"></textarea>
                </div>

                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label for="price"  class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" onfocus="focused(this)" onfocusout="defocused(this)"  name="price">
                </div>
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label for="exampleInputPassword1"  class="form-label">Image</label>
                    <input type="file" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="image">
                </div>


                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label for="exampleInputPassword1"  class="form-label">Category</label>
                    <select  class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="cat_id">
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


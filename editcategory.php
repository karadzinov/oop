<?php require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$id = $_GET['cat_id'];

$category  = new Categories();
$category->first($id);




?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="/process/editcategory.php" method="post" enctype="multipart/form-data">


                <input type="hidden" value="<?php echo $category->id; ?>" name="id">
                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" name="name" value="<?php echo $category->getName(); ?>">
                </div>




                <div class="input-group input-group-outline my-3 focused is-focused">
                    <label for="exampleInputPassword1"  class="form-label">Parent Category</label>
                    <select  class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" id="parent_id" name="parent_id">
                        <option value="0">Main Category</option>
                        <?php
                        $cats = new Categories();
                        echo $cats->getList();
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('parent_id').value = "<?php echo $category->parent_id; ?>";
</script>
<?php require_once "footer.php"; ?>


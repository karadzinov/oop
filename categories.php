<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});




$category = new Categories();

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="/createcategory.php" class="btn btn-primary">Create Category</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <?php echo $category->getTree(); ?>


            </div>
        </div>
    </div>
<?php

require_once "footer.php";

?>
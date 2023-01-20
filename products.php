<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$products = new Product();
$products = $products->getAll();



?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Products</h1>
            <p><a href="createproduct.php" class="btn btn-primary">Create product</a></p>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Category</th>

            </tr>
            </thead>
            <tbody>
            <?php




            foreach ($products as $product) {


                $category = new Categories();
                if($product->cat_id) {
                   $category =  $category->first($product->cat_id);
                   $categoryName = $category->getName();
                } else {
                    $categoryName = 'Not in Category';
                }




                echo '
                <tr>
                    <td><a href="product.php?id='.$product->id.'">'.$product->id.'</a></td>
                    <td>'.$product->name.'</td>
                    <td>'.$product->type.'</td>
                    <td>'.mb_strimwidth(strip_tags($product->description), 0, 100, '...').'</td>
                    <td>'.$product->price.'</td>
                    <td><img src="'.$product->image.'" alt="product"></td>
                    <td>'.$categoryName.'</td>
                </tr>';
            }
            ?>
            </tbody>
        </table>



    </div>



</div>

<?php require_once "footer.php"; ?>

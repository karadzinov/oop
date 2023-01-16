<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php



                $p = new Product();

                $product = $p->first(7);

                var_dump($product->getName());
                die();


                $user = new User();
                $user->setFirstName("Petko");
                $user->setLastName("Ilevski");
                $user->setEmail("mile@ilevski.com");
                $user->setPassword("temp1234");
                $user->setDob("1985-03-12");
                $user->setImage("n/a");

                // $user->create();


                //  echo $user->id();


                ?>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Image</th>

                </tr>
                </thead>
                <tbody>
                <?php

                $user = new User();
                $users = $user->getAll();
                foreach ($users as $user) {


                    echo '
                <tr>
                    <td><a href="user.php?id='.$user->id.'">'.$user->id.'</a></td>
                    <td>'.$user->first_name.'</td>
                    <td>'.$user->last_name.'</td>
                    <td>'.$user->email.'</td>
                    <td>'.$user->dob.'</td>
                    <td>'.$user->image.'</td>
                </tr>';
                }
                ?>
                </tbody>
            </table>


        </div>
    </div>
<?php
require_once "footer.php";

?>
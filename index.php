<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$category  = new Categories();
$category->setName("Motori");
$category->setParentId(NULL);
// $category->save();



?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php


                $user = new User();
                $user->setFirstName("Petko"); // $this->first_name
                $user->setLastName("Ilevski"); // $this->last_namee
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
        <div class="row">
            <div class="col-md-12">

                <select class="browser-default custom-select">
                    <option>Motori</option>
                    <option> - Honda</option>
                    <option> -- XR 250R</option>
                    <option> --- 4x4</option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <option></option>
                    <?php
                    echo $category->getList();
                    ?>
                </select>



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
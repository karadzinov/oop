<?php
require_once "header.php";
require_once "class/User.php";
require_once "class/Pets.php";
require_once "class/DB.php";
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php



                $martin = new User();


                $martin->setFirstName("Martin");
                $martin->setDob("30-09-1984");
                $martin->setEmail("martin@pingdevs.com");
                $martin->setLastName("Karadzinov");
                $martin->setImage("images/martin.jpg");
                $martin->setPassword("temp12345");



                var_dump($martin->connect());







               // echo $martin->first_name . ' ' . $martin->last_name;


                $mache = new Pets('Charli', 'cat');
                $kuche = new Pets('Nova', 'dog');

                echo $mache->action("meow meow");
                echo $kuche->action("ciu ciu");






                ?>
            </div>
        </div>
    </div>
<?php
require_once "footer.php";

?>
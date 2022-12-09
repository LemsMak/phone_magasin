<?php
    include "database.php";

    $sql = $conn->prepare("SELECT * FROM publication");
    $sql->execute();
    
    $result = $sql->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='https://fonts.googleapis.com/css?familly=Holtwood+One+Sc' rel='stylesheet' type='text/css'>
        <title>Phone store</title>
    </head>
    <body>
            <!-- * ***** HEADER + NAVIGATION ***** -->
        <header class="header">
            <nav class="navigation">
                <h2 class="logo"><a href="#">Phone<br>$Store</p></a></h2>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Dashboard</a>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="sign_up.php"><button name="signup">Sign Up</button></a></li>
                    </ul>
            </nav>   
        </header>
        <!-- * ***** END HEADER + NAVIGATION ***** -->

        <div class="picture">
            <!-- l'image est ajoutE en CSS -->
        </div>
        <br>
        <br>
        <div class="blog">
            <h2>PUBLIC BLOG</h2>
            <br>
            <div class="line">
                <!-- Une petite ligne qui souligne le titre  -->
            </div>
        </div>
        <br>
        <div id="gallery">
            
            <?php foreach($result as $value): ?>
                <div class="gallery_1"><a href="#">
                    <img src="http://localhost/telecharger/<?php echo $value['image']; ?>" alt="">
                    <br>
                    <h4><?php echo $value['mark']; ?></h4>
                    <br>
                    <div class="price"><?php echo $value['price'] . '€'; ?></div>
                    <br>
                    <p><?php echo $value['comment']; ?></p>
                    <br>
                    <div class="date"><?php echo $value['date']; ?></div>
                </div></a>
            <?php endforeach; ?>

            <!-- <div class="gallery_2">
                <img src="images/packaging-service.jpg" alt="">
                <br>
                <h4>PACKAGING</h4>
                <br>
                <div class="price">400.18 €</div>
                <br>
                <p>It follows that whoever chooses<br> the most worthy of the present means to be at peace, or when he follows the greater bliss, he obtains great pleasures.</p>
                <br>
                <div class="date">04/12/2022</div>
            </div> -->
            
        </div>
    </body>
</html>

 
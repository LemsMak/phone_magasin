<?php
    include "database.php";


        if(isset($_POST['send']))
        {

            
            echo $name = $_POST['name'];
            echo $email = $_POST['email'];
            echo $password = $_POST['password'];
            echo $numberPhone = $_POST['numberPhone'];


            if(!empty($name) && !empty($email) && !empty($password) && !empty($numberPhone))
            {

                $sql = "INSERT INTO phone (name,email,password,number_phone) VALUES ('$name','$email','$password','$numberPhone')";
                $result = $conn->exec($sql);

                if($result)
                {
                    echo $success = "<p style='color:green'>Registration successfully</p>";

                    header("Location:login.php");
                    
                }else{
                    echo $success = "<p style='color:green'>Remplir tout le champ svp!</p>";
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="css/sign_up.css">
        <link href='https://fonts.googleapis.com/css?familly=Holtwood+One+Sc' rel='stylesheet' type='text/css'>
        <title>Phone store</title>
    </head>
    <body>
        <div id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h3>Create Account</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                     
                        <div class="contact">
                            <form method="POST">
                                <div class="row">
                                    <?php if(isset($success)){
                                        echo $success;
                                    }
                                    ?>
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Name" type="text" name="name" required>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Email" type="text" name="email" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Password" type="password" name="password" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Number Phone" type="text" name="numberPhone" required>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <button class="send" name="send">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                   
                </div>
            </div>
        </div>
    </body>
</html>
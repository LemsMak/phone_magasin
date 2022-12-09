<?php
    include "database.php";

    if(isset($_POST['send']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(isset($email) && isset($password))
        {
            $sql = $conn->prepare("SELECT * FROM phone");
            $sql->execute();

            $stmt = $sql->setFetchMode(PDO::FETCH_ASSOC);
            $result = $sql->fetchAll();

                echo "<pre>";
                print_r($result);
                echo "</pre>";

            if($email === $result[0]['email'] || $email === $result[1]['email'] || $email === $result[2]['email']) 
            {
                if($password === $result[0]['password'] || $password === $result[1]['password'] || $password === $result[2]['password'])
                {
                    $_SESSION[0]['email'] = $result[0]['email'];
                    $_SESSION[1]['email'] = $result[1]['email'];
                    $_SESSION[2]['email'] = $result[2]['email'];

                    header("Location:dashboard.php");
                }else{
                    echo "Password incorrect";
                }
            }else
            {
                echo "Email incorrect";
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
                        <h3>Login Account</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                     
                <div class="contact">
                    <form method="POST">
                        <div class="row">
                            <?php if(isset($success)){
                                 $success;
                            }
                            ?>
                                    
                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Email" type="text" name="email" required>
                            </div>

                            <div class="col-sm-12">
                                <input class="contactus" placeholder="Password" type="password" name="password" required>
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
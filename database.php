<?php
            // SE CONNECTER A LA DATABASE

    $servername = "localhost";
    $dbname = "electronic";
    $username = "root";
    $password = "";

            // UTILISATION DE LA METHODE PDO
    try{
            session_start();
            
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo " database Connected";
        }catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
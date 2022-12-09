<?php
    include "database.php";

    if(isset($_POST['send']))
    {
        $image = $_FILES['image']['name'];
        $imageTwo = $_FILES['image']['tmp_name'];
        $mark = $_POST['mark_phone'];
        $price = $_POST['price'];
        $comment = $_POST['comment'];
        $date = $_POST['publish_date'];
        $isSuccess = true;
        // $isUploadSuccess = true;

        // echo "<pre>";
        // print_r($image);
        // echo "<pre>";

        if(empty($image))
        {   
            $isSuccess = false;
        }elseif(empty($mark))
        {
            $isSuccess = false;
        }elseif(empty($price))
        {
            $isSuccess = false;
        }elseif(empty($comment))
        {
            $isSuccess = false;
        }elseif(empty($date))
        {
            $isSuccess = false;
        }

        if($isSuccess)
        {   
             $dossier = 'telecharger/';
             $destination = $dossier . $image;

                //move_uploaded_file(file, dest) 

            if(move_uploaded_file($imageTwo, $destination))
            {
                $sql = $conn->prepare("INSERT INTO publication (image,mark,price,comment,date) VALUES ('$image','$mark','$price','$comment','$date')");
                $result = $sql->execute();

                 echo "<p style='color:green'>Published</p>";
            }
            else{
                echo "<p style='color:red'>Error</p>";
            }
        }
    }

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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/sign_up.css">
    <link href='https://fonts.googleapis.com/css?familly=Holtwood+One+Sc' rel='stylesheet' type='text/css'>
    <title>Phone store</title>

                            <style>
                                    table {
                                    font-family: arial, sans-serif;
                                    border-collapse: collapse;
                                    width: 100%;
                                    }

                                    td, th {
                                    border: 1px solid #dddddd;
                                    text-align: left;
                                    padding: 8px;
                                    }

                                    tr:nth-child(even) {
                                    background-color: #dddddd;
                                    }

                                    h2{
                                        display: flex;
                                        justify-content: center;
                                        text-align: center;
                                    }
                            </style>
</head>
<body>
        <div id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titlepage">
                            <h3>Dashboard<br>Public Blog</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                     
                        <div class="contact">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                   
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Image" type="file" name="image" required>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Mark Phone" type="text" name="mark_phone" required>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Price" type="text" name="price" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Comment" type="text" name="comment" required>
                                    </div>

                                    <div class="col-sm-12">
                                        <input class="contactus" placeholder="Publish Date" type="date" name="publish_date" required>
                                    </div>
                                    
                                    <div class="col-sm-12">
                                        <button class="send" name="send">Post</button>
                                    </div>
                                </div>
                            </form> <br>
                                    <br>
                                    <br>
                                    <br>
                                    
                                    <h2>Dashboard Table</h2>

                            <table>
                                <tr>
                                    <th>Image - Name</th>
                                    <th>Mark - Phone</th>
                                    <th>Price</th>
                                    <th>Publish - Date</th>
                                    <th>Comment</th>
                                    <th>Actions</th>
                                </tr>

                                <?php
                                    foreach($result as $value)
                                    {   
                                        $id = $value['id'];
                                        $value['image'];
                                        $value['mark'];
                                        $value['price'];
                                        $value['date'];
                                        $value['comment'];

                                        echo "<tr>";
                                            echo "<td>" . $value['image'] . "</td>";
                                            echo "<td>" . $value['mark'] . "</td>";
                                            echo "<td>" . $value['price'] . "</td>";
                                            echo "<td>" . $value['date'] . "</td>";
                                            echo "<td>" . $value['comment'] . "</td>";
                                            echo "<td>" . '<a href="update.php?update=' . $id . '">' . "<button>" . "update" . "</button>" . "</a>" . "</td>";
                                            echo "<td>" . '<a href="delete.php?delete=' . $id . '">' . "<button>" . "delete" . "</button>" . "</a>" . "</td>";
                                        echo "</tr>";
                                    }
                                ?>
                        
                            </table>

                        </div>
                </div>
        </div>
</body>
</html>
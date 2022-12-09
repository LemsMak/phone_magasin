<?php
    include "database.php";

    $updateId = $_GET['update'];

    $sql = $conn->prepare("SELECT * FROM publication WHERE id=$updateId");
    $sql->execute();
    $result = $sql->fetchAll();

    // echo '<pre>';
    // print_r($result);

        // $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    if(isset($_POST['send']))
    {
        $image = $_FILES['image']['name'];
        $imageTwo = $_FILES['image']['tmp_name'];
        $mark = $_POST['mark_phone'];
        $price = $_POST['price'];
        $comment = $_POST['comment'];
        $date = $_POST['publish_date'];
        
        $query = $conn->prepare("UPDATE publication SET 
        id = $updateId, image = '$image', mark ='$mark', price = '$price', comment = '$comment', date = '$date'
         WHERE id = $updateId");

        $stmt = $query->execute();

        if($stmt)
        {
            header('Location:dashboard.php');
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
                            <h3>Dashboard<br>Public Blog</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                             
                    <div class="contact">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                           
                                <div class="col-sm-12">
                                    
                                    <input class="contactus" placeholder="Image" type="file" name="image" 
                                    value="http://localhost/telecharger/<?php echo $result [0]['image'] ?>">
                                    <div style="width: 200px;height: 200px;">
                                        <img style="width:100%;height:100%;object-fit:cover;" src="http://localhost/telecharger/<?php echo $result [0]['image'] ?>" alt="">
                                    </div>
                                </div>
                                
                                     
                                <div class="col-sm-12">
                                    <input class="contactus" placeholder="Mark Phone" type="text" name="mark_phone" 
                                    value="<?php echo $result [0]['mark'] ?>">
                                </div>
                                            
                                <div class="col-sm-12">
                                    <input class="contactus" placeholder="Price" type="text" name="price" 
                                    value="<?php echo $result [0]['price'] ?>">
                                </div>
        
                                <div class="col-sm-12">
                                    <input class="contactus" placeholder="Comment" type="text" name="comment" 
                                    value="<?php echo $result [0]['comment'] ?>">
                                </div>
        
                                <div class="col-sm-12">
                                    <input class="contactus" placeholder="Publish Date" type="date" name="publish_date" 
                                    value="<?php echo $result [0]['date'] ?>">
                                </div>
                                            
                                <div class="col-sm-12">
                                    <button class="send" name="send">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

<?php
    include "database.php";

    $deleteId = $_GET['delete'];

        //  $sql = "DELETE FROM MyGuests WHERE id=3";

    $sql = $conn->prepare("DELETE FROM publication WHERE id=$deleteId");
    $result = $sql->execute();

    if($result)
    {
        header('Location:dashboard.php');
    }
?>
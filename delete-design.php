<?php include_once('./inc/connection.php'); 
    $id = @$_GET['id'];
    $sql = "UPDATE `design_numbers` SET `delete`='1' WHERE `id`='$id'";
    $query = mysqli_query($conn, $sql);
    echo "<script>window.location = './design-numbers.php';</script>";
    exit();
?>
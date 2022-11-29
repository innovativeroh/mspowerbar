<?php include_once('./inc/connection.php'); 
    $id = @$_GET['id'];
    $sql = "UPDATE `dm_data` SET `delete`='1' WHERE `id`='$id'";
    $query = mysqli_query($conn, $sql);
    echo "<script>window.location = './dm.php';</script>";
    exit();
?>
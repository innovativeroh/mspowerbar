<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "mspowerbar";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName) or die;
date_default_timezone_set("Asia/Calcutta");
session_start();
if (isset($_SESSION['username'])) {
    $user = $_SESSION["username"];
    $sql = "SELECT * FROM `users` WHERE email='$user'";
    $query = mysqli_query($conn, $sql);
    while ($rows = mysqli_fetch_assoc($query)) {
        $global_id = $rows['id'];
        $global_name = $rows['name'];
        $global_email = $rows['email'];
        $global_user_role = $rows['role'];
    }
}
?>
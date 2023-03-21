<?php
include ('server/connection.php');

// mendapatkan data yang akan diupdate
$id = $_POST['user_id'];
$name = $_POST['user_name'];
$email = $_POST['user_email'];

// melakukan update pada database
$sql = "UPDATE users SET user_name= '$name', user_email= '$email' WHERE user_id=$id";
mysqli_query($conn, $sql);

header('location: welcome.php');
?>

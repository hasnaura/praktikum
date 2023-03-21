<?php

session_start();
include('server/connection.php');

if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $q = "SELECT * FROM users WHERE user_id LIKE '%$keyword%' or
        user_name LIKE '%$keyword%' or user_email LIKE '%$keyword%'";
} else {
    $q = "SELECT * FROM users";
}
$result = mysqli_query($conn, $q);

if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
}

if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['user_email']);
        header('location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>


<body>
    <div class="box">
        <div class="container mt-4">
            <form action="" method="POST">
                <input type="text" name="keyword" placeholder="Masukan Keyword">
                <button type="submit" class="btn btn-primary" name="cari">Cari!</button>
            </form>
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Hapus</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['user_id'] ?></td>
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['user_email'] ?></td>
                            <td>
                                <a href="actionDelete.php?user_id=<?php echo $row['user_id']; ?>" role="button" onclick="return confirm('Data ini akan di hapus?')">Hapus</a>
                            </td>
                            <td>
                                <a href="update-form.php?user_id=<?php echo $row['user_id']; ?>" role="button" onclick="return confirm('Anda yakin akan mengupdate data ini?')">Update</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-primary" href="welcome.php?logout=1" role="button">Log Out</a>
        </div>
    </div>
</body>

</html>
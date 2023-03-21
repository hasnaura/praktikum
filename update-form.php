<?php
include "server/connection.php";

$id = $_GET['user_id'];

$query = "SELECT * FROM users WHERE user_id= '$id' ";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>Update Form</title>
</head>

<body>
    <span>Update Form</span>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <form method="POST" action="actionUpdate.php">
            <table>
                <td><input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>"></td>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="user_name" value="<?php echo $row['user_name']; ?>"></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="user_email" value="<?php echo $row['user_email']; ?>"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-primary" href="welcome.php" role="button">Back</a>
        </form>
    <?php } ?>
</body>

</html>
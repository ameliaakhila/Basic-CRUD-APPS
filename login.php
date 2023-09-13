<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: admin.php");
    exit;
}

require 'function.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            // set session
            header("location:admin.php");
            exit;
        }
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="case">
        <h1 class="h1">Halaman Login</h1>

        <?php if (isset($error)): ?>
            <p style="background-color: black; color: red; font-style: italic; ">Username/ Password salah!</p>
        <?php endif; ?>

        <form action="" method="post">
            <ul>
                <li>
                    <label class="label" for="username">username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label class="label" for="password">password :</label>
                    <input type="password" name="password" id="password">
                </li>
                <br>
                <li>
                    <button type="submit" name="login">Login</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
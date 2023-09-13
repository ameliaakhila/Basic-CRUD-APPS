<?php

require 'function.php';

if (isset($_POST["register"])) {

    if (registration($_POST) > 0) {
        echo "
                <script>
                    alert('pengguna baru berhasil di tambahkan!');
                    document.location.href = 'login.php';
                </script>;
            ";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Regristrasi</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="case">
        <h1 class="h1">Halaman Regristrasi</h1>
        <form action="" method="post">
            <ul>
                <li>
                    <label class="label" for="username">username :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label class="label" for="password">password :</label>
                    <input type="text" name="password" id="password">
                </li>
                <li>
                    <label class="label" for="password2">konfirmasi password :</label>
                    <input type="text" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">Daftar!</button>
                </li>
            </ul>
        </form>
    </div>
</body>

</html>
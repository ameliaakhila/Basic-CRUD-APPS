<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: login.php");
    exit;
}

require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari di tekan
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <a id="logout" href="logout.php">logout</a>

    <h1>Data Mahasiswa</h1>
    <div class="yuk"><a href="tambah.php">Tambah data mahasiswa</a></div>
    <br>
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian."
            autocomplete="off">
        <button type="submit" name="cari">cari</button>
    </form>
    <br>
    <table border="10" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>NPM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jurusan</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row): ?>
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>
                    <button>
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                    </button>
                    <button>
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin nih?');">
                            Hapus</a>
                    </button>
                </td>
                <td><img class="img" src="img/<?= $row["gambar"]; ?>" alt="gambar"></td>
                <td>
                    <?= $row["npm"]; ?>
                </td>
                <td>
                    <?= $row["nama"]; ?>
                </td>
                <td>
                    <?= $row["email"]; ?>
                </td>
                <td>
                    <?= $row["jurusan"]; ?>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>
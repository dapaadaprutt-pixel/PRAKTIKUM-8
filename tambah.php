
<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = null;

    if (isset($_FILES['file_gambar']) && $_FILES['file_gambar']['error'] == 0) {
        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $destination = __DIR__ . '/gambar/' . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    $sql = "INSERT INTO data_barang
    (nama, kategori, harga_jual, harga_beli, stok, gambar)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssddis",
        $nama, $kategori, $harga_jual,
        $harga_beli, $stok, $gambar
    );

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php');
        exit;
    }

    echo "Gagal menambahkan data.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
</head>
<body>

<h1>Tambah Barang</h1>

<form method="post" action="tambah.php" enctype="multipart/form-data">

    <p>
        <label>Nama Barang</label><br>
        <input type="text" name="nama" required>
    </p>

    <p>
        <label>Kategori</label><br>
        <select name="kategori">
            <option value="Komputer">Komputer</option>
            <option value="Elektronik">Elektronik</option>
            <option value="Hand Phone">Hand Phone</option>
        </select>
    </p>

    <p>
        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual" required>
    </p>

    <p>
        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli" required>
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok" required>
    </p>

    <p>
        <label>File Gambar</label><br>
        <input type="file" name="file_gambar" accept="image/*">
    </p>

    <button type="submit" name="submit">Simpan</button>
    <a href="index.php">Kembali</a>

</form>

</body>
</html>

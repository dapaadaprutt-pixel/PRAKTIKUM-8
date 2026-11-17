
<?php
include_once 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID barang tidak ditemukan.");
}

$sql = "SELECT * FROM data_barang WHERE id_barang = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data barang tidak tersedia.");
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = $data['gambar'];

    if (isset($_FILES['file_gambar']) &&
        $_FILES['file_gambar']['error'] == 0) {

        $filename = str_replace(' ', '_', $_FILES['file_gambar']['name']);
        $destination = __DIR__ . '/gambar/' . $filename;

        if (move_uploaded_file($_FILES['file_gambar']['tmp_name'], $destination)) {
            $gambar = $filename;
        }
    }

    $sql = "UPDATE data_barang SET
            nama = ?,
            kategori = ?,
            harga_jual = ?,
            harga_beli = ?,
            stok = ?,
            gambar = ?
            WHERE id_barang = ?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param(
        $stmt,
        "ssddisi",
        $nama,
        $kategori,
        $harga_jual,
        $harga_beli,
        $stok,
        $gambar,
        $id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php");
        exit;
    }

    echo "Gagal mengubah data.";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Ubah Barang</title>
</head>
<body>

<h1>Ubah Barang</h1>

<form method="post" action="" enctype="multipart/form-data">

    <p>
        <label>Nama Barang</label><br>
        <input type="text" name="nama"
        value="<?= htmlspecialchars($data['nama']); ?>" required>
    </p>

    <p>
        <label>Kategori</label><br>
        <select name="kategori">
            <?php
            $kategori_list = ["Komputer", "Elektronik", "Hand Phone"];

            foreach ($kategori_list as $kategori):
            ?>
                <option value="<?= $kategori; ?>"
                <?= $data['kategori'] == $kategori ? 'selected' : ''; ?>>
                    <?= $kategori; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>

    <p>
        <label>Harga Jual</label><br>
        <input type="number" name="harga_jual"
        value="<?= $data['harga_jual']; ?>" required>
    </p>

    <p>
        <label>Harga Beli</label><br>
        <input type="number" name="harga_beli"
        value="<?= $data['harga_beli']; ?>" required>
    </p>

    <p>
        <label>Stok</label><br>
        <input type="number" name="stok"
        value="<?= $data['stok']; ?>" required>
    </p>

    <p>
        <label>File Gambar</label><br>
        <input type="file" name="file_gambar" accept="image/*">
    </p>

    <button type="submit" name="submit">Simpan Perubahan</button>
    <a href="index.php">Kembali</a>

</form>

</body>
</html>

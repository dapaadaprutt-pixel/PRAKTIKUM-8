
<?php
include_once 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID barang tidak ditemukan.");
}

$sql = "DELETE FROM data_barang WHERE id_barang = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: index.php");
    exit;
}

echo "Gagal menghapus data.";
?>

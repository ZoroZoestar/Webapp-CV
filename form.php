<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['ttl'] = $_POST['ttl'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];
    header('Location: cv.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card { transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; }
        .card:hover { transform: scale(1.05); box-shadow: 0 0 20px grey; }
    </style>
</head>
<body class="container mt-5">
    <h2 class="text-center" style="margin: 20px">Masukkan Data CV</h2>
    <form method="POST" class="card p-4 mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tempat, Tanggal Lahir</label>
            <input type="text" name="ttl" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Riwayat Pendidikan</label>
            <textarea name="pendidikan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100">Simpan & Lihat CV</button>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </form>
</body>
</html>

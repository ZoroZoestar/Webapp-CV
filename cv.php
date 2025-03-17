<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['nama'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CV</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card { transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; }
        .card:hover { transform: scale(1.05); box-shadow: 0 0 20px grey; }
        .profile-img { width: 150px; height: 150px; object-fit: cover; border-radius: 10px; display: block; margin: 0 auto 15px; }
    </style>
</head>
<body class="container mt-5">
    <h2 class="text-center" style="margin: 20px">Curriculum Vitae</h2>
    <div class="card p-4 mx-auto" style="max-width: 600px;">
        <?php if (isset($_SESSION['gambar'])): ?>
            <img src="<?php echo $_SESSION['gambar']; ?>" class="profile-img" alt="Foto Profil">
        <?php endif; ?>
        <p><strong>Nama:</strong> <?php echo $_SESSION['nama']; ?></p>
        <p><strong>Tempat, Tanggal Lahir:</strong> <?php echo $_SESSION['ttl']; ?></p>
        <p><strong>Riwayat Pendidikan:</strong> <?php echo nl2br($_SESSION['pendidikan']); ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
    </div>
</body>
</html>

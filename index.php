<?php
session_start();
if (isset($_SESSION['email'])) {
    header('Location: form.php');
    exit();
}
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $domain = substr(strrchr($email, "@"), 1);
    if ($password === $domain) {
        $_SESSION['email'] = $email;
        header('Location: form.php');
        exit();
    } else {
        $error = 'Email atau password salah!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .card { transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; }
        .card:hover { transform: scale(1.05); box-shadow: 0 0 20px grey; }
    </style>
</head>
<body class="container mt-5">
    <h2 class="text-center" style="margin: 20px">Login</h2>
    <?php if ($error) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <form method="POST" class="card p-4 mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</body>
</html>

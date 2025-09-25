<?php
require 'controller/processoLogin.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/bootstrap.css">
    <link rel="stylesheet" href="styles/style.css">
    <style>
        
    </style>
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="user_card">
        <div class="d-flex justify-content-center">
            <div class="brand_logo_container">
                <img src="img/Logo.jpeg" class="brand_logo" alt="Logo">
            </div>
        </div>
        <div class="d-flex justify-content-center form_container">
        <form method="post" class="w-100 px-3">
                <h2>Faça o seu Login:</h2><br>
                <?php if ($error): ?>
                    <div class="alert alert-danger p-1 text-center"><?= $error ?></div>
                <?php endif; ?>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-envelope" aria-hidden="true"></i></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="input-group mb-2">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                </div>
                
                <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" class="btn login_btn text-white">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/bootstrap.bundle.js"></script>
</body>
</html>

<?php
require '../config.php';

$id = $_GET['id'] ?? null;
if (!$id) { header("Location: index.php"); exit; }

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id_usuario = ?");
$stmt->execute([$id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) { header("Location: index.php"); exit; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    if (!empty($_POST['senha'])) {
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET nome=?, email=?, senha=? WHERE id_usuario=?";
        $pdo->prepare($sql)->execute([$nome, $email, $senha, $id]);
    } else {
        $sql = "UPDATE usuarios SET nome=?, email=? WHERE id_usuario=?";
        $pdo->prepare($sql)->execute([$nome, $email, $id]);
    }

    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h1>Editar Usuário</h1>
  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Nome</label>
      <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($usuario['nome']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($usuario['email']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Nova Senha (opcional)</label>
      <input type="password" name="senha" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="../index.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
</body>
</html>

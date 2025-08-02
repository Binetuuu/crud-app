<?php
include('config.php');
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Liste des Utilisateurs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f0f2f5;
      padding: 20px;
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h1 {
      margin-bottom: 20px;
    }
    .btn {
      margin-right: 5px;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center text-primary">Liste des utilisateurs</h1>
    <div class="text-end mb-3">
      <a href="create.php" class="btn btn-success">+ Ajouter un utilisateur</a>
    </div>
    <table class="table table-bordered table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['id']) ?></td>
          <td><?= htmlspecialchars($row['nom']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td>
            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>


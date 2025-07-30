<?php
include('config.php');

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>CRUD App</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Liste des utilisateurs</h1>
  <a href="create.php">Ajouter un utilisateur</a>
  <table border="1">
    <tr><th>ID</th><th>Nom</th><th>Email</th><th>Actions</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['nom'] ?></td>
      <td><?= $row['email'] ?></td>
      <td>
        <a href="update.php?id=<?= $row['id'] ?>">Modifier</a> |
        <a href="delete.php?id=<?= $row['id'] ?>">Supprimer</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>


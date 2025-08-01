<?php
include('config.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $conn->query("UPDATE users SET nom='$nom', email='$email' WHERE id=$id");
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Modifier l'utilisateur</title>
  <style>
    body {
      font-family: Arial;
      padding: 20px;
      background: #f9f9f9;
    }
    form {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      width: 300px;
    }
    input[type="text"], input[type="email"] {
      width: 100%;
      margin-bottom: 10px;
      padding: 8px;
    }
    button {
      padding: 8px 12px;
      background-color: #107bff;
      border: none;
      color: white;
      cursor: pointer;
      border-radius: 4px;
    }
    a {
      display: inline-block;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <h2>Modifier l'utilisateur</h2>
  <form method="POST">
    <input type="text" name="nom" value="<?= $user['nom'] ?>" required>
    <input type="email" name="email" value="<?= $user['email'] ?>" required>
    <button type="submit">Enregistrer</button>
  </form>
  <a href="index.php">← Retour</a>
</body>
</html>


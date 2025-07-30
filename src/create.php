<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nom = $_POST['nom'];
  $email = $_POST['email'];
  $conn->query("INSERT INTO users (nom, email) VALUES ('$nom', '$email')");
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ajouter un utilisateur</title>
  <style>
    body {
      font-family: Arial;
      padding: 20px;
      background: #f2f2f2;
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
      background-color: #28a745;
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
  <h2>Ajouter un utilisateur</h2>
  <form method="POST">
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit">Ajouter</button>
  </form>
  <a href="index.php">← Retour</a>
</body>
</html>


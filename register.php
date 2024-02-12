<?php
$pdo = require_once "./database.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        "username" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "email" => FILTER_SANITIZE_EMAIL
    ]);
    $username = $input["username"] ?? "";
    $email = $input["email"] ?? "";
    $password = $_POST["password"] ?? "";


    if (!$username || !$email || !$password) {
        $error = "ERROR";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
        $statement = $pdo->prepare('INSERT INTO user (id, username, email, password) VALUES (DEFAULT, :username, :email, :password)');
        $statement->bindValue(":username", $username);
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $hashedPassword);

        $statement->execute();

        header("Location: /login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Authentification</title>
</head>

<body>
    <div class="container">
        <nav>
            <a href="/index.php">Accueil</a>
            <a href="/register.php">Inscription</a>
            <a href="/login.php">Connexion</a>
            <a href="/profile.php">Profil</a>
            <a href="/logout.php">Deconnexion</a>
        </nav>

        <h1>Inscription</h1>

        <div class="div-form">
            <form action="/register.php" method="POST">
                <input type="text" placeholder="Votre nom" name="username">
                <input type="email" placeholder="Votre email" name="email">
                <input type="password" placeholder="Votre mot de passe" name="password">
                <button type="submit">Valider</button>
            </form>
        </div>

    </div>

</body>

</html>
<?php
$pdo = require_once "./database.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = filter_input_array(INPUT_POST, [
        "username" => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        "email" => FILTER_SANITIZE_EMAIL
    ]);
    $email = $input["email"] ?? "";
    $password = $_POST["password"] ?? "";


    if (!$email || !$password) {
        $error = "ERROR";
    } else {
        $statementUser = $pdo->prepare('SELECT * FROM user WHERE email=:email');
        $statementUser->bindValue(":email", $email);
        $statementUser->execute();
        $user = $statementUser->fetch();

        if (password_verify($password, $user["password"])) {
            echo "Login OK";
        } else {
            $error = "erreur mot de passe";
        }
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

        <h1>Connexion</h1>

        <div class="div-form">
            <form action="/login.php" method="POST">
                <input type="email" placeholder="Votre email" name="email">
                <input type="password" placeholder="Votre mot de passe" name="password">
                <button type="submit">Valider</button>
                <?php if ($error) : ?>
                    <h2><?= $error; ?></h2>
                <?php endif; ?>
            </form>
        </div>

    </div>

</body>

</html>
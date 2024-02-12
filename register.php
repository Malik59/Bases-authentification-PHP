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
                <input type="text" placeholder="Votre nom" name="name">
                <input type="email" placeholder="Votre email" name="email">
                <input type="password" placeholder="Votre mot de passe" name="password">
                <button type="submit">Valider</button>
            </form>
        </div>

    </div>

</body>

</html>
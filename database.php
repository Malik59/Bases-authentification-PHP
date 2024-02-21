<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=authentification", "root", "M@lik5959", [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch(PDOException $e) {
    echo $e->getMessage();
}

return $pdo;
<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=authentification", "root", "M@lik5959");
} catch(PDOException $e) {
    echo $e->getMessage();
}

return $pdo;
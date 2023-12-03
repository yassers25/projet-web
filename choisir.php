<?php
session_start();
$host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'evenement';

$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Echec de la connexion" . mysqli_connect_error());
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}
?>

<!-- Page avec des Boutons -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Actions sur l'Événement</title>
</head>

<body>
    <header>
        <h1>Actions sur l'Événement</h1>
    </header>

    <section class="event-actions">
        <h2>Sélectionnez une Action :</h2>
        <a href="add-event.php">Créer un Nouvel Événement</a>
        <a href="edit-event.php">Modifier cet Événement</a>
        <a href="delete-event.php">Supprimer cet Événement</a>
    </section>
    <br>
    <form action="logout.php" method="post">
        <input type="submit" value="Déconnexion">
      </form>

    <footer>
        <p>&copy; 2023 Your Event Website</p>
    </footer>
</body>

</html>

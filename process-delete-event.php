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

// Récupérer l'ID de l'événement à supprimer
$event_id_to_delete = isset($_POST['event_id']) ? $_POST['event_id'] : null;

// Si l'ID n'est pas défini, redirigez vers la page de suppression
if (!$event_id_to_delete) {
    header("Location: delete-event.php");
    exit();
}

// Supprimer l'événement de la base de données
$query = "DELETE FROM events WHERE TITRE = '$event_id_to_delete'";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "Événement supprimé avec succès.";
} else {
    echo "Erreur lors de la suppression de l'événement: " . mysqli_error($conn);
}

// Rediriger vers la page de suppression
header("Location: delete-event.php");
exit();
?>
Avec ces modifications, la page delete-event.php affichera les événements de l'utilisateur avec des boutons pour chaque événement, permettant ainsi à l'utilisateur de supprimer les événements individuellement.







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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modifier_event'])) {
    // Récupérer les données du formulaire
    $event_id = $_POST['event_id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $lieu = $_POST['lieu'];

    // Mettre à jour l'événement dans la base de données
    $query = "UPDATE events SET TITRE = '$titre', DESCRIPTION = '$description', DATE = '$date', LOCATION = '$lieu' WHERE TITRE = '$event_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Événement mis à jour avec succès.";
        // Rediriger vers la page de sélection ou une autre page après la mise à jour
        header("Location: select-event.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'événement: " . mysqli_error($conn);
    }
}
?>

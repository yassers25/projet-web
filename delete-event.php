<!-- Page pour Supprimer un Événement -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Supprimer un Événement</title>
    <style>
        /* Ajoutez votre style CSS ici */
    </style>
</head>

<body>
    <header>
        <h1>Supprimer un Événement</h1>
    </header>

    <section class="event-list">
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

        // Récupérer l'IDENTIFIANT de l'utilisateur connecté
        $identifiant = $_SESSION['identifiant'];

        // Requête SQL pour sélectionner les événements liés à l'IDENTIFIANT de l'utilisateur
        $query = "SELECT * FROM events WHERE IDENTIFIANT = '$identifiant'";
        $result = mysqli_query($conn, $query);

        // Affichage de la liste des événements avec des liens pour supprimer
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="event-card">';
            echo '<p class="event-title">' . $row['TITRE'] . '</p>';
            echo '<p>Date: ' . $row['DATE'] . '</p>';
            echo '<p>Lieu: ' . $row['LOCATION'] . '</p>';

            // Ajouter un bouton pour supprimer l'événement
            echo '<form action="process-delete-event.php" method="POST">';
            echo '<input type="hidden" name="event_id" value="' . $row['TITRE'] . '">';
            echo '<input type="submit" name="delete" value="Supprimer">';
            echo '</form>';

            // Ajoutez d'autres informations si nécessaire
            echo '</div>';
        }
        ?>
    </section>

    <footer>
        <p>&copy; 2023 Your Event Website</p>
    </footer>
</body>

</html>

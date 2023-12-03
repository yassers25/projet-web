<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Liste des Événements</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1em 0;
}

h1 {
    margin: 0;
}

.events-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.event {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
    padding: 15px;
    width: 300px; /* Ajustez la largeur de la carte selon vos besoins */
}

.event h2 {
    color: #333;
}

.event p {
    margin: 10px 0;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1em 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>

<body>
    <header>
        <h1>Liste des Événements</h1>
    </header>

    <section class="events-list">
        
        <?php
        session_start();
        $host='localhost';
        $db_user='root';
        $db_pass='';
        $db_name='evenement';
        
        $conn =mysqli_connect($host,$db_user,$db_pass,$db_name);
        
        if(!$conn){
            die("Echec de la connexion" .mysqli_connect_error());
        }
        // Récupération des événements depuis la base de données
        $query = "SELECT * FROM events ORDER BY date DESC";
        $result = mysqli_query($conn,$query);

        // Affichage de la liste des événements
        while ($row = mysqli_fetch_assoc($result)){
        ?>
            <div class="event">
                <h2><?php echo $row['TITRE']; ?></h2>
                <p>Description: <?php echo $row['DESCRIPTION']; ?></p>
                <p>Date: <?php echo $row['DATE']; ?></p>
                <p>Lieu: <?php echo $row['LOCATION']; ?></p>
            </div>
        <?php } ?>
    </section>

    <footer>
        <p>&copy; 2023 Your Event Website</p>
    </footer>
</body>

</html>

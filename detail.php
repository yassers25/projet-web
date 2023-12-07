<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Événements</title>
</head>

<body>
  <div>
    <h1>Registration Form</h1>
    <form action="#" method="post" class="form">
    <div class="register">
      <input type="submit" value="Register">
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Assuming you have a database connection
      $mysqli = new mysqli("localhost", "root", "", "ensa");
  
      if ($mysqli->connect_error) {
          die("Connection failed: " . $mysqli->connect_error);
      }
    $query = "SELECT TITRE, DESCRIPTION, DATE, LOCATION FROM event";
    $result = mysqli_query($mysqli, $query);
    // Parcourez les résultats de la requête et affichez les données
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div>';
        echo '<h2>' . $row['TITRE'] . '</h2>';
        echo '<p>' . $row['DESCRIPTION'] . '</p>';
        echo '<p>' . $row['DATE'] . '</p>';
        echo '<p>' . $row['LOCATION'] . '</p>';
        echo '</div>';
    }
    }
    ?>
    </form>
  </div>
</body>
</html>
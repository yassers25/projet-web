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
if($_SERVER["REQUEST_METHOD"]=="POST"){

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer l'identifiant de l'organisateur à partir de la session
$identifiant = $_SESSION['identifiant'];

// Récupérer les données du formulaire
$titre = $_POST['titre'];
$description = $_POST['description'];
$date = $_POST['date'];
$location = $_POST['location'];

// Insérer l'événement dans la base de données avec l'identifiant de l'organisateur
$query = "INSERT INTO events (TITRE, DESCRIPTION, DATE, LOCATION,IDENTIFIANT) 
                VALUES ('$titre', '$description', '$date', '$location ', '$identifiant')";
$result=mysqli_query($conn,$query);

    if($result){
        echo"Nouvel enregistrement céé avec succès";
    }
    else{
        echo"Erreur: " .$query . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
// Bouton de déconnexion
echo '<form action="logout.php" method="post">
        <input type="submit" value="Déconnexion">
      </form>';
      echo'<a href="choisir.php"><h5>cliquer ici, si vous souhaiter ajouter , modifier ou supprimer un evenement </h5></a>';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection
    $mysqli = new mysqli("localhost", "root", "", "projet");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Retrieve user input from the form
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $tele = $_POST['tele'];
    $naissance = $_POST['naissance'];
    $adress = $_POST['adress'];
    $gender = $_POST['gender'];

    // Construct the email address in the expected format
    $email = $prenom . '.' . $nom . '@uit.ac.ma';

    // Check if the user-submitted email matches the expected format
    if ($_POST['email'] !== $email) {
        echo "Error: Invalid email format. Email must be in the format 'prenom.nom@uit.ac.ma'.";
    } else {
        // Continue with your database insertion logic here
        // Make sure to hash and sanitize input before inserting into the database

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $mysqli->prepare("INSERT INTO inscription (nom, prenom, password, email, tele, naissance, adress, gender) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $nom, $prenom, $hashed_password, $email, $tele, $naissance, $adress, $gender);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $mysqli->close();
}
?>

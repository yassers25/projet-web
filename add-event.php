<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ajouter un Événement</title>
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
.event-form {
    max-width: 600px;
    margin: 2em auto;
    background-color: #fff;
    padding: 2em;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
form {
    display: grid;
    gap: 1em;
}
label {
    font-weight: bold;
}
input,textarea {
    width: 100%;
    padding: 0.5em;
    border: 1px solid #ccc;
    border-radius: 4px;
}
button {
    background-color: #333;
    color: #fff;
    padding: 0.7em;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
button:hover {
    background-color: #555;
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
a{
    text-align:center;
}
    </style>
</head>

<body>
    <header>
        <h1>Ajouter un Événement</h1>
    </header>
        <form action="process-add-event.php" method="post">
            <label for="title">Titre de l'Événement:</label>
            <input type="text" id="title" name="titre" required>

            <label for="description">Description de l'Événement:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="date">Date de l'Événement:</label>
            <input type="date" id="date" name="date" required>

            <label for="location">Lieu de l'Événement:</label>
            <input type="text" id="location" name="location" required>

            <button type="submit">Ajouter l'Événement</button>
        </form>
        <br>
        <a href="choisir.php"><h5>cliquer ici, si vous souhaiter ajouter , modifier ou supprimer un evenement </h5></a>
        

    <footer>
        <p>&copy; 2023 Your Event Website</p>
    </footer>
</body>

</html>

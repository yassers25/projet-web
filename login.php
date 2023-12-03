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
    $nom=$_POST['nom'];
    $password=$_POST['password'];

    $query="SELECT * FROM utilisateur WHERE NOM='$nom' ";
    $result=mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result)>0){
        $utilisateur=mysqli_fetch_assoc($result);

        if($password==$utilisateur['PASSWORD']){
            $_SESSION['identifiant']=$utilisateur['IDENTIFIANT'];
            $_SESSION['login']=$utilisateur['LOGIN'];
            header("Location:choisir.php");
            exit;
        }
        else{
            echo "Le mot de passe est incorrect.";
        }
    }
    else{
        echo "Le login n'existe pas";
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: #4683b4;
            color: white;
        }
        div label{
            display: inline-block;
            width:250px;
            margin: 6px;
        }
        </style>
</head>
<body>
    <form action="#" method="post">
        <fieldset>
            <div>
                <label for="nom">Login:</label>
                <input type="text" id="nom" name="nom" size="70"> 
            </div>
            
            <div>
                <label for="password">Mot de passe:</label>
                <input type="password" id="password"name="password" size="70">
            </div>
            <input type="submit" name="connexion" value="connexion">
</body>
</html>

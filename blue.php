<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bluecss.css">
</head>
<body>
    <header class="">
        <nav>
        <a href=""><img class="hi" src="img/cropped-ensak-logo.png"></a>
          <ul class="class">
           
            <li id="dropdown-item" ><a href="#" class="same">Catégories ▾</a>
            <ul class="dropdown">
              <?php
              $host='localhost';
              $user='root';
              $password='';
              $bdname='projetweb';
              $connect = mysqli_connect($host,$user,$password,$bdname);
              if(!$connect)
              {
                die ("echec de connection".mysqli_connect_error($connect));
              }
              $query = "SELECT label FROM categorie";
              $an=mysqli_query($connect,$query);
              while($row=mysqli_fetch_assoc($an) )
              {
                echo'<li ><a href="#">'.$row['label'].'</a></li>';
              }
              ?>
             </ul>
             </li>
              <li>
               <a href="" class="same">Événements</a>
                </li>
                <li>
                    <a href="" class="same">Commentaires</a>
                </li>
                <li>
                    <a href="" class="same">Inscription</a>
                </li>
              <li>
            
                   
                <li>
                    <a href="" class="login">LOGIN</a>
                </li>

          </ul>
        </nav>
        <div class="text">
            Découvrez nos événements :
        </div>
    <section class="section1">
       
        <div id="event1">
            
        </div>
        <div id="event2">
            
        </div>
    </section>
    <section>
        <p class="text">Découvrez nos clubs: </p>
        <div class="container">
            <div class="club">
                <img class="image" src="img/arsura-PhotoRoom.png" alt="Club arsura">
                <h3>Club Arsura</h3>
                <p>Le club Arsura de l'art embrasse la créativité sous toutes ses formes, unissant les passionnés de l'expression artistique au sein de notre communauté scolaire.</p>
            </div>

            <div class="club">
                <img class="image" src="img/anaruz.png" alt="Club Anaruz">
                <h3>Club Anaruz</h3>
                <p>
                    Le club Anaruz : Une source d'espoir pour tous.</p>
            </div>
            <div class="club">
                <img class="image" src="img/chess.png" alt="Club chess">
                <h3>Club De Chess</h3>
                <p>
                    
Le club d'échecs offre une passionnante exploration stratégique et intellectuelle du jeu royal.</p>
            </div>
            <div class="club">
                <img class="image" src="img/eic.png" alt="Club eic">
                <h3>Club EIC</h3>
                <p>
                    Le Club EIC d'informatique offre une communauté dynamique et passionnée, propice à l'apprentissage et à l'exploration des domaines informatiques.</p>
            </div>
            <div class="club">
                <img class="image" src="img/google.png" alt="Club green invest">
                <h3>Club De Google</h3>
                <p>Le club Google d'informatique offre une communauté dynamique pour les passionnés de technologie, favorisant l'apprentissage, la collaboration et l'innovation.</p>
            </div>
            <div class="club">
                <img class="image" src="img/meca.png" alt="Club green invest">
                <h3>Club Mecatronique</h3>
                <p>Le club de mécatronique allie la mécanique et l'électronique pour explorer l'innovation technologique.</p>
            </div>
            <div class="club">
                <img class="image" src="img/enactus.png" alt="Club enactus">
                <h3>Club Anaruz</h3>
                <p>
                    Enactus : Le club dédié à l'entrepreneuriat social et à l'innovation pour un impact positif.</p>
            </div>
            <div class="club">
                <img class="image" src="img/gdk.png" alt="Club gdk">
                <h3>Club Great Debaters</h3>
                <p>Les Great Debaters : Maîtres de l'art de la persuasion et des débats percutants.</p>
            </div>
            <div class="club">
                <img class="image" src="img/green.png" alt="Club green invest">
                <h3>Club Great Debaters</h3>
                <p>Club Green Invest : Promouvoir la durabilité à travers des initiatives éco-responsables et des investissements respectueux de l'environnement</p>
            </div>
            <div class="club">
                <img class="image" src="img/aaa.png" alt="Club green invest">
                <h3>Afaaq</h3>
                <p>Le Club Affaq de Charité œuvre pour la solidarité et l'impact social.</p>
            </div>
        </div>
    </section>
    <footer>
        <p>&copy; 2023 ENSAK. Tous droits réservés.</p>
        <p>Pour plus d'information visiter le lien suivant : <a class="fix" href = "https://ensa.uit.ac.ma/">ENSAK</a></p>
    </footer>
        
</body>
</html>
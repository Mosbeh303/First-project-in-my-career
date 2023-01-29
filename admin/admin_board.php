


<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>AFAAK - Professional training institute</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Modernizer for Portfolio -->
    <script src="js/modernizer.js"></script>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
.topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
}

#lienmodif
{
color: limegreen ;
}
#liensup
{
color: red ;
}
 #lienadd
 {
color: limegreen ;
 }

</style>

</head>
<body>
    
    <!-- LOADER -->
    <div id="preloader" style=" background: limegreen;">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div><!-- end loader -->
    <!-- END LOADER -->
    
    <div class="top-bar" id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="right-top">
                        <div class="social-box">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss-square" aria-hidden="true"></i></a></li>
                            <ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    
                </div>
            </div>
        </div>
    </div>
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../index.php">
                    <img src="images/logos/logo.png" width="60px" height="60px" alt="image"></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto">
                     </img>

                    <div class="topright">
                    <form action="../admin_login/admin_login/index.php">
                      <input type="submit" name="lo" value="Logout">
                    </form>  
                      
                    </div>


                        



                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="slider-area">
        <div class="slider-wrapper owl-carousel">
            <div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content-area">
                                <div class="slide-text">
                                    <h1 class="homepage-three-title">This is your  <span>Employee</span> List</h1>
    

                                 <h2>
<a href="employe_ajouter.php" id="lienadd">Add employee</a>
    <br>
   <center> 
    <table border="4" >
      <tr>
        <th>Full name</th>
        <th>Cin</th>
        <th>Tel</th>
        <th>Job</th>
    
        <th>&nbsp;</th>
      </tr>
      <?php
          
  

require_once "connexion.php";


// Notes :
// PDO::exec() - "Execute an SQL statement and return the number of affected rows"
// PDO::query() - "Executes an SQL statement, returning a result set as a PDOStatement object"


function recuperer()
{
  $lignes = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM employe";
  //echo $requette;
  $stmt = $cnx->prepare($requette);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  // récupérer toutes les lignes
  $lignes = $stmt->fetchAll();

/*
  // récupérer les lignes une à une
  while($ligne = $stmt->fetch()) {
    $lignes[] = $ligne;
  }
*/

  return $lignes;
}

function ajouter($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "INSERT INTO employe(nomprenom , cin , tel , poste) VALUES(:nomprenom , :cin , :tel , :poste)";
  $stmt = $cnx->prepare($requette);

 
  // préciser les valeurs des paramètres et exécuter
   $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);


  // on peut utiliser aussi bindParam au lieu de bindValue
  // si on veut que les valeurs que les valeurs des variables
  // soit intérpréter uniquement lors de l'exécution

  return $stmt->execute();
}

function supprimer($cin)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "DELETE FROM employe WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  return $stmt->execute();
}


function recuperer_une($cin)
{
  $ligne = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM employe WHERE cin = :cin";
  //echo $requette;

  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $ligne = $stmt->fetch();

  return $ligne;
}

function modifier($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "UPDATE employe
                SET nomprenom = :nomprenom, tel = :tel, poste = :poste
                WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
    $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);
    

  return $stmt->execute();
}







        $lignes = recuperer();

        if (count($lignes) == 0) {
            echo "<tr><td colspan='3'>0 résultat</td></tr>";
        } else {
          foreach ($lignes as $ligne)
          {
            echo "<tr>";
            echo "<td>" . $ligne["nomprenom"] . "</td>";
            echo "<td>" . $ligne["cin"] . "</td>";
            echo "<td>" . $ligne["tel"] . "</td>";
            echo "<td>" . $ligne["poste"] . "</td>";
            
            echo "<td>";
            echo "<a href='employe_modifier.php?cin=" . $ligne["cin"] . "' id='lienmodif'>Update</a> ";
            echo "<a href='employe_supprimer.php?cin=" . $ligne["cin"] . "' id='liensup'>Delete</a>";
            echo "</td>";
            echo "</tr>";
          }
        }

       ?>
    </table> 

</center>


</h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    


<div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content-area">
                                <div class="slide-text">
                                    <h1 class="homepage-three-title">This is your  <span>Students</span> List</h1>
                                    <h2>

    <br>
    <center>
    <table border="4">
      <tr>
        <th>Username</th>
        <th>E-mail</th>
       
        
        
      </tr>

<?php

require_once "connexion.php";


// Notes :
// PDO::exec() - "Execute an SQL statement and return the number of affected rows"
// PDO::query() - "Executes an SQL statement, returning a result set as a PDOStatement object"






function etudiant_recuperer()
{
  $lignes = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM etudiant";
  //echo $requette;
  $stmt = $cnx->prepare($requette);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  // récupérer toutes les lignes
  $lignes = $stmt->fetchAll();

/*
  // récupérer les lignes une à une
  while($ligne = $stmt->fetch()) {
    $lignes[] = $ligne;
  }
*/

  return $lignes;
}





        $lignes = etudiant_recuperer();

        if (count($lignes) == 0) {
            echo "<tr><td colspan='3'>0 résultat</td></tr>";
        } else {
          foreach ($lignes as $ligne)
          {
            echo "<tr>";
            echo "<td>" . $ligne["uname"] . "</td>";
            echo "<td>" . $ligne["email"] . "</td>";
            echo "<td>";
             echo "<a href='etudiant_supprimer.php?uname=" . $ligne["uname"] . "' id='liensup'>Delete</a>";
            echo "</td>";
      
            echo "</tr>";
          }
        }





?>



    </table>
</center>



 <br
</h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="slider-item text-center home-one-slider-otem slider-item-four slider-bg-one">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-content-area">
                                                               <div class="slide-text">
                                    <h1 class="homepage-three-title">This is your  <span>Teacher</span> List</h1>
                                    <h2>
<a href="prof_ajouter.php" id="lienadd">Add teacher</a>
    <br>
    <center>
    <table border="4">
      <tr>
        <th>CIN</th>
        <th>User name</th>
        <th>Phone number</th>
        <th>gender</th>
        <th>&nbsp;</th>
      </tr>
 <?php
          
  

require_once "connexion.php";


// Notes :
// PDO::exec() - "Execute an SQL statement and return the number of affected rows"
// PDO::query() - "Executes an SQL statement, returning a result set as a PDOStatement object"


function prof_recuperer()
{
  $lignes = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM prof";
  //echo $requette;
  $stmt = $cnx->prepare($requette);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  // récupérer toutes les lignes
  $lignes = $stmt->fetchAll();

/*
  // récupérer les lignes une à une
  while($ligne = $stmt->fetch()) {
    $lignes[] = $ligne;
  }
*/

  return $lignes;
}

function prof_ajouter($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "INSERT INTO prof(nomprenom , cin , tel , poste) VALUES(:nomprenom , :cin , :tel , :poste)";
  $stmt = $cnx->prepare($requette);

 
  // préciser les valeurs des paramètres et exécuter
   $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);


  // on peut utiliser aussi bindParam au lieu de bindValue
  // si on veut que les valeurs que les valeurs des variables
  // soit intérpréter uniquement lors de l'exécution

  return $stmt->execute();
}

function prof_supprimer($cin)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "DELETE FROM prof WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  return $stmt->execute();
}


function prof_recuperer_une($cin)
{
  $ligne = array();

  // se connecter à la base
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "SELECT * FROM prof WHERE cin = :cin";
  //echo $requette;

  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
  $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);

  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);

  $ligne = $stmt->fetch();

  return $ligne;
}

function prof_modifier($nomprenom,$cin,$tel,$poste)
{
  $cnx = se_connecter();

  // préparation et exécution de la requête
  $requette = "UPDATE prof
                SET nomprenom = :nomprenom, tel = :tel, poste = :poste
                WHERE cin = :cin";
  $stmt = $cnx->prepare($requette);

  // préciser les valeurs des paramètres et exécuter
    $stmt->bindValue(':nomprenom', $nomprenom, PDO::PARAM_STR);
    $stmt->bindValue(':cin', $cin, PDO::PARAM_INT);
      $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
        $stmt->bindValue(':poste', $poste, PDO::PARAM_STR);
    

  return $stmt->execute();
}







        $lignes = prof_recuperer();

        if (count($lignes) == 0) {
            echo "<tr><td colspan='3'>0 résultat</td></tr>";
        } else {
          foreach ($lignes as $ligne)
          {
            echo "<tr>";
            echo "<td>" . $ligne["nomprenom"] . "</td>";
            echo "<td>" . $ligne["cin"] . "</td>";
            echo "<td>" . $ligne["tel"] . "</td>";
            echo "<td>" . $ligne["poste"] . "</td>";
            
            echo "<td>";
            echo "<a href='prof_modifier.php?cin=" . $ligne["cin"] . "' id='lienmodif'>Update</a> ";
            echo "<a href='prof_supprimer.php?cin=" . $ligne["cin"] . "' id='liensup'>Delete</a>";
            echo "</td>";
            echo "</tr>";
          }
        }

       ?>
    </table> 

</center>


                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


 
    
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- ALL JS FILES -->
    <script src="js/all.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/custom.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="js/hoverdir.js"></script>    

</body>
</html>
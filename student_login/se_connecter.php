<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>



      
        <div id="zone_connexion">
            <h1>Account login :</h1>
          User name : <input type="text" id="uname" >
          <br>
          Email : <input type="text" id="email">
          <br>
          <input type="submit" value="Se connecter" onclick="seConnecter()">
          <br>
          <input type="submit" value="Back to home" onclick="redirect()">
          <br>
        </div>
        <div id="zone_deconnexion" style="display:none">
          <input type="submit" value="Se déconnecter" onclick="seDeconnecter()">
          <br>
        </div>
        <br>
        <div id="etat" style="color:red; font-size: 18px;"></div>
        <script language="javascript" type="text/javascript">
          function redirect(){
          window.location.href = "../index.php" ;
          }
          function seConnecter()
          {
            // récuprer la valeur saisie
            var uname = document.getElementById('uname').value;
            var email = document.getElementById('email').value;

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != '0')
                {
                  document.getElementById('etat').innerHTML = 'Vous êtes connecté maintenant !';
                  document.getElementById('zone_connexion').style.display = 'none';
                  document.getElementById('zone_deconnexion').style.display = '';
                  document.getElementById('zone_deconnexion').style.color = 'green';
                }
                else {
                  document.getElementById('etat').innerHTML = 'Utilisateur non authentifié !';
                  document.getElementById('zone_deconnexion').style.color = 'red';
                }
              }
            }

            var url = "utilisateur_se_connecter.php?uname=" + uname + "&email=" + email;
            xhr.open("GET", url, true);

            xhr.send();
          }

          function seDeconnecter()
          {
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                if (this.responseText == '1')
                {
                  document.getElementById('etat').innerHTML = 'Vous êtes déconnecté maintenant !';
                  document.getElementById('zone_connexion').style.display = '';
                  document.getElementById('zone_deconnexion').style.display = 'none';
                  document.getElementById('zone_deconnexion').style.color = 'red';
                }
                else {
                  document.getElementById('etat').innerHTML = 'Problème lors de la déconnexion !';
                  document.getElementById('zone_connexion').style.display = 'none';
                  document.getElementById('zone_deconnexion').style.display = '';
                  document.getElementById('zone_deconnexion').style.color = 'red';
                }
              }
            }

            var url = "utilisateur_se_deconnecter.php";
            xhr.open("GET", url, true);

            xhr.send();
          }
        </script>


  </body>
</html>

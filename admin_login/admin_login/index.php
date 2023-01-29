<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin_login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100"  id="zone_connexion">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" >
					<span class="login100-form-title">
						Sign In
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
						<input class="input100" type="text" name="identifiant" placeholder="Identifiant" id="identifiant">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="mot_de_passe" placeholder="Password" id="mot_de_passe">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							
						</span>

						<a href="#" class="txt2">
					
						</a>
					</div>

					<div class="container-login100-form-btn">
                        <br>
          <input type="button" value=" Login" onclick="seConnecter()" class="login100-form-btn">
          <br>
<br><br>
						
					</div>
					<div class="container-login100-form-btn">
                        <br>
          <input type="button" value="retour" onclick="window.location.href='../../index.php'" class="login100-form-btn">
          <br>

						
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							
						</span>

						<a href="#" class="txt3">
			
						</a>
					</div>
				</form>
			</div>

<div id="zone_deconnexion" style="display:none">
          <input type="button" value="Se déconnecter" onclick="seDeconnecter()" class="login100-form-btn">
          <br>
        </div>
<div class="txt2" id="etat" style="color:red; font-size: 18px;"></div>


		</div>
	</div>
	<script language="javascript" type="text/javascript">
          function seConnecter()
          {
            // récuprer la valeur saisie
            var identifiant = document.getElementById('identifiant').value;
            var motDePasse = document.getElementById('mot_de_passe').value;

            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != '0')
                {
                  document.getElementById('etat').innerHTML = 'Vous êtes connecté maintenant !';
                  document.getElementById('zone_connexion').style.display = 'none';
                  document.getElementById('zone_deconnexion').style.display = '';
                  document.getElementById('zone_deconnexion').style.color = 'green';
                  window.location="../../admin/admin_board.php";
                }
                else {
                  document.getElementById('etat').innerHTML = 'Utilisateur non authentifié !';
                  document.getElementById('zone_deconnexion').style.color = 'red';
                }
              }
            }

            var url = "utilisateur_se_connecter.php?identifiant=" + identifiant + "&mot_de_passe=" + motDePasse;
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

	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
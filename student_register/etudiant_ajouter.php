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

    <h1>Student Register</h1>
     <div >
        <form method="get" action="etudiant_ajouter_enregistrer.php">
          <label for="fname">User name</label> <input id="fname" name="uname" placeholder="User name.." type="text"  >
          <label for="fname">Email</label><input id="fname" name="email" placeholder=" Email.." type="text"  >
         
          
          <br>

          <input type="submit" value="Register">
         
        </form>
       </div>
       
  </body>
</html>

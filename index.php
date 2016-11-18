<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <div class="bod">
    <div class="Center">
      <h1 class="thin">Mini Panel v1</h1>
      <br />
      <form action="panelEscrow.php">
        <input type="text" style="text-align:center;" placeholder="Nom d'utilisateur">
          <input type="password" style="text-align:center;" placeholder="Mot de passe">
          <input type="password" style="text-align:center;" placeholder="SSK">
        <input type="submit" value="Se connecter">
      </form>
      <br />
    </div>
  </div>

  <div class="foot">
    <p style="font-size:11px;text-align:center;">Design & Code by Huston</p>
  </div>

  <script>
    // You can also require other files to run in this process
    require('./renderer.js')
  </script>
</html>

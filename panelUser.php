<?php include('config.php'); ?>

<?php 

if(isset($_GET['type']) && isset($_GET['id'])){
    $type = htmlspecialchars($_GET['type']);
    $id = htmlspecialchars($_GET['id']);
    
    if($type == "delete"){
        $sql = "DELETE FROM users WHERE id=" . $id;

        if ($conn->query($sql) === TRUE) {
            header('location:panelUser.php');
        } else {
            header('location:panelUser.php');
        }
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Hello World!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
    <body>
        <div class="bod">
            <div class="MenuLeft">
            <ul>
                <a href="panelEscrow.php">Gestion de l'Escrow</a>
                <a href="panelUser.php">Gestion des utilisateurs</a>
                <div class="bottom">
                    <p></p>
                </div>
                
            </ul>
            </div>
            <div class="MenuCenter">
                <?php 
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
                
                ?>
                <h1>Gestion des utilisateurs (<?php echo $result->num_rows; ?>)</h1>
                <p>Gestions de tous les utilisateurs dans la base de données.</p>
                <p>( EN COUR DE CONSTRUCTION )</p>
                <br /><br />
                 
                <?php 
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $data = json_decode($row['user_data']);
                        echo '<div class="commande">';
                        echo '<h1>'. str_replace('u00e9', 'é', $data->{'user_name'}) .'</h1>';
                        echo '<p>Type <b>'. $data->{'type_vendeur'} .'</b></p>';
                        echo '<p>Grade <b>'. $data->{'grade_vendeur'} .'</b></p>';
                        echo '<a href="#" class="button">Voir plus de details</a>&nbsp;';
                        echo '<a href="panelUser.php?type=delete&id='. $row['id'] .'" class="button">Supprimer</a>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Il n'y a aucune commande sous escrow.</p>";
                }
                $conn->close();
                ?>
                <!--
                <div class="commande">
                    <h1>Huston</h1><br />
                    <p>Type <b>Admin</b></p>
                    <p>Grade <b>Débutant</b></p><br />
                    
                </div>
                -->
                
            </div>
        </div>
    </body>
    <div class="foot2">
    <p style="font-size:11px;text-align:center;">Design & Code by Huston</p>
  </div>
  <script>
    // You can also require other files to run in this process
    require('./renderer.js')
  </script>
    
</html>


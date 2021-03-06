<?php include('config.php'); ?>

<?php 

if(isset($_GET['type']) && isset($_GET['id'])){
    $type = htmlspecialchars($_GET['type']);
    $id = htmlspecialchars($_GET['id']);
    
    if($type == "delete"){
        $sql = "DELETE FROM escrow WHERE id=" . $id;

        if ($conn->query($sql) === TRUE) {
            header('location:panelEscrow.php');
        } else {
            header('location:panelEscrow.php');
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
            </ul>
            </div>
            <div class="MenuCenter">
                <h1>Gestion de l'Escrow</h1>
                <p>Gestions de toutes les commandes sous escrow.</p>
                <br /><br />
                <?php 
                $sql = "SELECT * FROM escrow";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        $data = json_decode($row['data_escrow']);
                        echo '<div class="commande">';
                        echo '<h1>Commande N° '. $row['id'] .'</h1><br />';
                        echo '<p>id <b>'. $data->{'id'} .'</b></p>';
                        echo '<p>Acheteur <b>'. $data->{'emeteur'} .'</b></p>';
                        echo '<p>Vendeur <b>'. $data->{'recepteur'} .'</b></p><br />';
                        echo '<p>Uniter <b>'. $data->{'vente_uniter'} .'</b></p>';
                        echo '<p>Prix/u (€) <b>'. $data->{'prix_uniter'} .'</b></p>';
                        echo '<p>Prix/u (BTC) <b>'. $data->{'prix_uniter'} .'</b></p><br />';
                        echo '<p>Quantité <b>'. $data->{'quantiter'} .'</b></p>';
                        echo '<p>Total (€) <b>' . $data->{'quantiter'} * $data->{'prix_uniter'} . '</b></p>';
                        echo '<p>Total (BTC) <b>' . $data->{'quantiter'} * $data->{'prix_uniter'} . '</b></p>';
                        echo '<p>Status <b>'. $data->{'status'} .'</b></p><br />';
                        if($data->{'status'} == 'litige' || $data->{'status'} == 'en cours de traitement'){
                            echo '<a href="#" class="button">Reverser à l\'acheteur</a>&nbsp;';
                            echo '<a href="#" class="button">Reverser au vendeur</a>';
                        }else{
                            echo '<a href="panelEscrow.php?type=delete&id=' . $row['id'] . '" class="button">Supprimer</a>';
                        }
                        echo '</div>';
                    }
                } else {
                    echo "<p>Il n'y a aucune commande sous escrow.</p>";
                }
                $conn->close();
                ?>
                <!-- ## Le model en html ##
                     ##------------------##

                <div class="commande">
                    <h1>Commande N° 0</h1><br />
                    <p>Acheteur <b>Huston</b></p>
                    <p>Vendeur <b>Oliverwood</b></p><br />
                    
                    <p>Uniter <b>Gramme</b></p>
                    <p>Prix/u (€) <b>3.45</b></p>
                    <p>Prix/u (BTC) <b>0.1200</b></p><br />
                    
                    <p>Quantité <b>1</b></p>
                    <p>Total (€) <b>3.45</b></p>
                    <p>Total (BTC) <b>0.1200</b></p><br />
                    <p>Status <b>Litige</b></p><br />
                    
                    <a href="#" class="button">Reverser à l'acheteur</a>
                    <a href="#" class="button">Reverser au vendeur</a>
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


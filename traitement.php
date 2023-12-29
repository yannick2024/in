<?php
if(isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Vérification des champs et traitement du message
    if(!empty($nom) && !empty($email) && !empty($message)) {
        // Connexion à la base de données
        $servername = "localhost";
        $username = "votre_nom_d_utilisateur";
        $password = "votre_mot_de_passe";
        $dbname = "nom_de_votre_base_de_donnees";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Vérification de la connexion
        if ($conn->connect_error) {
            die("La connexion à la base de données a échoué: " . $conn->connect_error);
        }
        
        // Requête d'insertion du message
        $sql = "INSERT INTO messages (nom, email, message) VALUES ('$nom', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Votre message a été enregistré avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement du message: " . $conn->error;
        }
        
        // Fermeture de la connexion
        $conn->close();
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}
?>


<?php

require_once "../includes/db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $inscription_id = $_POST['inscription_id'];

    
    $raison = $_POST['raison'];
    $style = $_POST['style'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $anniversaire = $_POST['anniversaire'];
    $commentaires = $_POST['commentaires'];
    $rating = $_POST['rating'];

    
    $update_query = $bdd->prepare("UPDATE inscription SET 
        raison = :raison,
        style = :style, 
        nom = :nom, 
        prenom = :prenom,
        telephone = :telephone,
        email = :email,
        prenom = :prenom,
        anniversaire = :anniversaire, 
        commentaires = :commentaires,
        rating = :rating
        WHERE id = :inscription_id");

  
    $update_query->execute([
        ':raison' => $raison,
        ':style' => $style, 
        ':nom' => $nom, 
        ':telephone' => $telephone, 
        ':email' => $email,
        ':prenom' => $prenom,
        ':anniversaire' => $anniversaire,
        ':commentaires' => $commentaires,
        ':rating' => $rating,
        ':inscription_id' => $inscription_id
    ]);

    
    header("Location: index.php?sucess=updated");
    exit;
} else {
   
    echo "Méthode non autorisée.";
    exit;
}
?>
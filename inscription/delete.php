<?php 
require_once "../includes/db.php";
$query = $bdd->prepare("DELETE FROM inscription WHERE id=:id");
$query->execute([
    "id" => $_GET['id']
]); 
header("Location: /inscription/index.php?success=delete");
exit(); 
?>  
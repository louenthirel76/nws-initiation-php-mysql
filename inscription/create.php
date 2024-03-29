<h1>Create.php</h1>
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";

// echo $_POST["raison"]."<br>";
// echo $_POST["prenom"]."<br>";
// echo $_POST["nom"]."<br>";
// echo $_POST["telephone"]."<br>";
// echo $_POST["email"]."<br>";
// echo $_POST["anniversaire"]."<br>";
// echo $_POST["commentaires"]."<br>";


require_once "../includes/db.php"; 

$query = $bdd->prepare("
INSERT INTO inscription
SET
raison = :raison,
style = :style,
nom = :nom,
prenom = :prenom,
telephone = :telephone,
email = :email,
anniversaire = :anniversaire,
commentaires = :commentaires,
rating = :rating
");

$query->execute([
    "raison" => $_POST['raison'],
    "style" => $_POST['style'],
    "nom" => $_POST['nom'],
    "prenom" => $_POST['prenom'],
    "telephone" => $_POST['telephone'],
    "email" => $_POST['email'],
    "anniversaire" => $_POST['anniversaire'],
    "commentaires" => $_POST['commentaires'],
    "rating" => $_POST['rating'],
    ])


// echo $_POST['raison'] . "<br>" ;
// echo $_POST['firstname'] . "<br>" ;
// echo $_POST['firstname'] . "<br>" ;

?>

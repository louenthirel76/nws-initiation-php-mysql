<?php
require_once "../includes/db.php";

if(isset($_GET['id'])) {
    $inscription_id = $_GET['id'];

    $query = $bdd->prepare("SELECT * FROM inscription WHERE id = :id");
    $query->execute(array('id' => $inscription_id));
    $inscription = $query->fetch(PDO::FETCH_OBJ);

    if(!$inscription) {
        echo "Inscription non fini";
        exit;
    }
} else {
    echo "ID de l'inscription non spécifié.";
    exit;
}

include '../partials/header.php';
?>

<main class="container">
    
    <h1><?php echo $titre ?></h1>
    <h6> Salut !👋 Avant d'accéder à notre livre blanc, nous vous proposons de vous inscrire sur notre newsletter afin de ne pas manquer nos dernières nouveautés. </h6>
    <form action="create.php" method="POST">

        <label for="raison"> Avez-vous déjà acheté des produits en rapport avec le hardrock ? 💿 </label>
        <select name="raison" id="raison">
            <option value=""></option>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>

        <label for="style"> Quels autres styles de musique écoutez-vous ? 🎶 </label>
        <select name="style">
            <option value="" selected disabled>Choisissez une option</option>
            <option value="Pop">Pop 🎹</option>
            <option value="Rock">Rock 🎸</option>
            <option value="Electro">Electro ⚡</option>
            <option value="Techno">Techno 🎛️</option>
            <option value="Rap">Rap 🎤</option>
            <option value="Reggae">Reggae 🪕</option>
        </select>

        <label for="prenom"> Prénom 🤍 </label>
        <input type="text" id="prenom" name="prenom">

        <label for="nom"> Nom 🧡 </label>
        <input type="text" id="nom" name="nom">
        
        <label for="telephone"> Téléphone 📱 </label>
        <input type="text" id="telephone" name="telephone">
        
        <label for="email"> E-mail 📧 </label>
        <input type="text" id="email" name="email">

        <label for="anniversaire"> Date de naissance 📅 </label>
        <input type="date" id="anniversaire" name="anniversaire">

        <label for="commentaires"> Commentaires 🫣 </label>
        <textarea name="commentaires" id="commentaires"></textarea>

        <fieldset class="rating">
            <legend>Notez-nous sur 5 ⭐ :</legend>
            <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Excellent">⭐⭐⭐⭐⭐</label>
            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Très_bien">⭐⭐⭐⭐</label>
            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Bien">⭐⭐⭐</label>
            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Moyen">⭐⭐</label>
            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Nul">⭐</label>

    <br>
    <br>

    <button>Envoyer</button>
    </form>
</main>

<?php
require "../partials/footer.php"; 
?>
<?php include("functions.php") ?>
<?php include("BDD.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fringue-toi.com</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

    </body>
    
    </html>
  <?php include("header.php") ?>
  <div class="container mt-5 mb-5">


    <pre>

<?php
    // var_dump($articles);
    $prixTotal = 0;
    $quantity = array();
    $message_error = null;

    $articles = $bdd->query('SELECT * FROM products WHERE quantity !=0 ');
    // Pour mettre à jour le panier :
    if (isset($_POST['checkbox'])) { // Vérifie la valeur POST[Checkbox] de Catalogue
      $article = $_POST['checkbox'];// Affiche la valeur de POST[Checkbox] de Catalogue
    } else if (isset($_POST['checkboxList'])) {  // Vérifie la valeur de POST[CheckboxList] de Basket - méthode POST renvoie un tableau
      $article = $_POST['checkboxList']; // Affiche la valeur de POST[CheckboxList] de Basket
    } else {                                       
      $article = array();        // Si le panier est vide
      $message_error = "le panier est vide"; // Affiche le message d'erreur
    }


    // Pour supprimer un article :
    foreach ($article as $key => $panier) {
      if (isset($_POST['delete' . $key])) { //Exécuter seulement sur le bouton 'supprimer'
        unset($article[$key]);
        
        //Si la liste est vide ERREUR
        if (!$article) {
          $message_error = "le panier est vide";
        }
      }
    }

?>

<form action ="basket.php" method="POST"> <!-- Formulaire du panier -->
<?php
    $quantity = null;
    foreach ($article as $key => $panier) {
      
      if (isset($_POST['quantity'])) {// Boucle pour mettre à jour les quantités du panier
        $quantity[$key] = $_POST['quantity'][$key];// Si la quantité est mise à jour alors la quantité prend cette nouvelle valeur
        if ($quantity[$key] < 1) {
          $message_error = "Veuillez rentrer une quantitée positive";  // MAIS SI la quantité est inférieur à un, afficher un message d'erreur
        }
      } else {
        $quantity[$key] = 1; // Par défaut, la valeur de quantité est de 1
      }
      $articleSql = $bdd->query("SELECT * FROM products WHERE id=$key")->fetch(PDO::FETCH_ASSOC);
      // var_dump($key);
      // var_dump($articleSql);
        
        displayItem($articleSql['name'], $articleSql['price'], $articleSql['picture'],$key, $quantity[$key] );
        // displayItem($article[$key]['name'], $article[$key]['price'], $article[$key]['picture'], $key, $quantity[$key]); // Affiche la tableau des produits envoyés depuis Catalogue 
      // var_dump($article['name'][$key]);
      // <!--Calcule le prix total : la fonction récupère la quantity et le prix des articles et les multiplie --> 
        $prixTotal = $prixTotal + basketTotal($quantity[$key], $articleSql['price']);
?> 

    <button class="btn btn-primary" name="delete<?php echo $key ?>">Supprimer un article</button> <!-- Bouton pour supprimer un article -->
    <input type="hidden" name="checkboxList[<?php echo $key ?>]" value="<?php echo $key ?>"> <!-- Pour update le panier  (hidden : input pour pouvoir l'envoyer par formulaire mais on veut pas que ce soit visible pour les utilisateur) -->
  
<?php
  echo '<hr>';
}
?>

<?php
    function basketTotal($quantity, $price)
    { // Fonction pour calculer le prix total du panier
      return $quantity * $price;            // formule à retourner : valeur de quantity x valeur de price
    }

?>
  <input type="submit" value="Update" name="Update" class="btn btn-primary" /> <!-- Bouton pour mettre à jour le panier --> 
  <form action="index.php">
  <button  name="return" class="btn btn-primary"> Retour au catalogue</button>
</form>

<?php
// condition ternaire : comme un if : SI = message_error alors affiche le message d'erreur SINON affiche le total est
echo ($message_error ? $message_error :  'Le total est : ' . $prixTotal . '€<br>'); 


?>

</form>
</pre>

  </div>
  
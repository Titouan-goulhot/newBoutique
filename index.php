      <? include_once('header.php'); ?>
      <? include_once('BDD.php') ?>
      <?php include("functions.php") ?>
  <!DOCTYPE html>
  <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
                <title>Shopping Cart</title>
                <!-- Font Awsome -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
                <!--Boostrap CDN-->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

            </head>

  <body>


  </body>

  </html>
  <?php
  $articles = $bdd->query('SELECT * FROM products WHERE quantity !=0 ');
  ?>
  <?php



  global $articles;

  ?>
  <form action="basket.php" method="POST">
    <?php
  
    foreach ($articles as $key => $article) {

      displayItemCheckbox($article["name"], $article["price"], $article["picture"], $article["id"]); // affiche la fonction displayItemCheckbox (avec les checkbox)

    ?>

    <?php } ?>

    <input type="submit" value="Valider" name="Submit" class="btn btn-primary" />
  </form>

  </div>
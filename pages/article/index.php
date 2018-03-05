<?php
  $pdo = new PDO(Config::getDatabaseDSN());
  $stmt = $pdo->prepare("SELECT * FROM article");
  $stmt->execute();

  $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE HTML>
<html lang=fr>
  <head>
    <meta charset="UTF-8">
    <title>Article default</title>
  </head>
  <body>
    <?php foreach($articles as $article): ?>
       <article>
         <h3><?php echo $article['title']; ?></h3>
         <div><?php echo $article['description']; ?></div>
         <a href="<?php echo $article['link']; ?>">En savoir plus...</a>
       </article>
    <?php endforeach; ?>
  </body>
</html>
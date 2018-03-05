<?php
  $id = 0;
  if (!empty($_GET['id'])){
    $id = $_GET['id'];
  }

  $pdo = new PDO(Config::getDatabaseDSN());
  $stmt = $pdo->prepare("SELECT * FROM article WHERE id= :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $article = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE HTML>
<html lang=fr>
  <head>
    <meta charset="UTF-8">
    <title>Article default</title>
  </head>
  <body>
    <article>
      <h3><?php echo $article['title']; ?></h3>
      <div><?php echo $article['description']; ?></div>
      <a href="<?php echo $article['link']; ?>">En savoir plus...</a>
    </article>
  </body>
</html>
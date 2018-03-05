<?php

  if (isset ($_POST['submit'])) {
      
    $title = $_POST['title'];
    $desc = $_POST['desc'];

    $pdo = new PDO(Config::getDatabaseDSN());
    $stmt = $pdo->prepare("INSERT INTO article (title, desc) VALUES (:title, :desc)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':desc', $desc);
    $stmt->execute();
  
  }
  
?>


<form action="?page=article&action=create" method="post">
 <h3>Le Titre : <input type="text" name="title" /></h3>
 <p>Le contenu : <input type="text" name="desc" /></p>
 <p><input type="submit" name="submit" value="OK"></p>
</form>
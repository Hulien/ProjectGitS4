
    <?php
      include __DIR__.'/../config.php';
      $pdo = new PDO(Config::getDatabaseDSN());

      require_once __DIR__.'/../vendor/autoload.php';
      
      $lolRss = Zend\Feed\Reader\Reader::import('http://rss.slashdot.org/Slashdot/slashdot');

  $channel = array(
    'title'       => $lolRss->getTitle(),
    'link'        => $lolRss->getLink(),
    'description' => $lolRss->getDescription(),
    'items'       => array()
  );
  // Loop over each channel item/entry and store relevant data for each
  foreach ($lolRss as $item) {
    $title = $item->getTitle();
    $link = $item->getLink();
    $description = $item->getDescription();
    
    $stmt = $pdo->prepare("INSERT INTO article (title, link, description) VALUES(:title, :link, :description);");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':link', $link);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
  }
?>
<?php

require_once __DIR__.'/../../../app/config/dbHandler.php';
require_once __DIR__.'/../Entity/article.php';


class ArticleRepository {
  private $_db;

  public function __construct() {
    $this->_db = dbHandler::getDb();
  }
  
  public function findAll($pseudoID) {
    $results = $this->_db->prepare("SELECT item_id, item_title, item_category, item_created, item_content FROM item INNER JOIN user ON item_user = user_id WHERE user_pseudo = '$pseudoID' AND item_archive IS NULL");
    $results->execute();

    // Add bind param

    $articles_from_tables = $results->fetchAll();
    
    $articles = array();
    foreach ($articles_from_tables as $article) {
      $articles[] = new Article(
        $article['item_id'],
        $article['item_title'],
        $article['item_category'],
        $article['item_content'],
        $article['item_created'],
      );
    }

    return $articles;
  }

  public function deleteArticle($valueDelID,$valueDelDate) {
    // $results = $this->_db->prepare("UPDATE `item` SET `item_modified`= '$valueDelDate', `archive`= 'archive' WHERE `id` = '$valueDelID'");
    $results = $this->_db->prepare("UPDATE `item` SET `item_archive`= '1' WHERE `item_id` = '$valueDelID'");
    $results->execute();
  }

  // public function modifyArticle($valueMod,$champsModify,$champsValue,$dateMod) {
  //   $results = $this->_db->prepare("UPDATE `item` SET $champsModify = '$champsValue', `item_modified`= '$dateMod' WHERE `id` = '$valueMod'");
  //   $results->execute();
  // }

  public function newArticle($newItemTitle,$newItemCategory,$newItemContent,$newitemCreated,$newIserID) {
    $results = $this->_db->prepare("INSERT INTO `item`(`item_title`, `item_category`, `item_created`, `item_content`, `item_user`) VALUES ('$newItemTitle','$newItemCategory','$newitemCreated','$newItemContent','$newIserID')");
    $results->execute();
  }
}

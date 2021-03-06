<?php

// Start the session and get the pseudo
session_start();
if((isset($_GET['pseudo'])) && (isset($_GET['password']))) {
  $_SESSION['pseudo'] = $_GET['pseudo'];
  $_SESSION['password'] = hash('sha256',trim($_GET['password']));
} else if (isset($_GET['deconnexion'])) {
  // Destroy session
  session_destroy();
  unset($_SESSION['pseudo']);
  unset($_SESSION['password']);
}


// Integrate the listing of articles/users
require_once __DIR__.'/../src/BlogBundle/Repository/userRepository.php';
require_once __DIR__.'/../src/BlogBundle/Repository/articleRepository.php';


// Create a new object and request to select
$users = new UserRepository();
$stockUsers = $users->findAll();


// echo '</br>';
// echo 'SESSION pseudo ->';
// echo $_SESSION['pseudo'];
// echo '</br>';
// echo 'SESSION password ->';
// echo $_SESSION['password'];

// Initialisation
$identity = "Welcome ";
$co = "true";

// User's test
if ((isset($_SESSION['pseudo'])) && (isset($_SESSION['password']))) { 
  foreach($stockUsers as $user) {
    $actualPseudo = $user->getUserPseudo();
    $actualPassword = $user->getUserMdp();
    
    if(($actualPseudo === $_SESSION['pseudo']) && ($actualPassword === $_SESSION['password'])) {
      $userID = $user->getUserID();
      $identity = $identity.ucfirst($_SESSION['pseudo']);
      $co = "false";
    } 
  }
}


// Global controller
class MainController {

  private $path_of_views = "../src/BlogBundle/Resources/views";
  private $activeUser = 'SquidHack';

  public function listingAction() {

    $articles = (new ArticleRepository())->findAll($this->activeUser);

    $response = [
        'view' => $this->path_of_views."/listing.php",
        'articles' => $articles,
    ];

    return $response;

  }

  public function accueilAction() {

    $response = [
      'view' => $this->path_of_views."/accueil.php"
    ];

    return $response;
  }

  public function adminAction() {

    $articles = (new ArticleRepository())->findAll($this->activeUser);

    $response = [
      'view' => $this->path_of_views."/admin.php",
      'articles' => $articles
    ];

    return $response;
  }

  public function connexionAction() {

    $response = [
      'view' => $this->path_of_views."/connexion.php"
    ];

    return $response;
  }

  public function defaultAction() {

    $response = [
      'view' => $this->path_of_views."/404.php"
    ];

    return $response;
  }

  public function setUserActive($userActive) {
    $this->activeUser = $userActive;
  }

  public function newArticle($itemTitle,$itemCategory,$itemContent,$itemCreated,$userID) {
    $newArticle = (new ArticleRepository())->newArticle($itemTitle,$itemCategory,$itemContent,$itemCreated,$userID);
  }

  public function deleteArticle($valueDelID,$valueDelDate) {
    $newArticle = (new ArticleRepository())->deleteArticle($valueDelID,$valueDelDate);
  }

  // public function modifyArticle($valueMod,$champsModify,$champsValue,$dateMod) {
  //   $newArticle = (new ArticleRepository())->modifyArticle($valueMod,$champsModify,$champsValue,$dateMod);
  // }
}

// Instanciation of the object
$action = new MainController();


// Request's traitement for the article
require_once __DIR__.'/../src/BlogBundle/Repository/requestRepository.php';


// Switch on the data get in URL for the view
if ($co === "false") {
  $action->setUserActive($_SESSION['pseudo']);
  if ($_GET['page'] === 'admin') {
    $viewData = $action->adminAction();
  } else if ($_GET['page'] === 'listing') {
    $viewData = $action->listingAction();
  } else if ($_GET['page'] === 'accueil') {
    $viewData = $action->accueilAction();
  } else {
    $viewData = $action->defaultAction();    
  } 
} else {
  $viewData = $action->connexionAction();
}


// Render the view
  require_once $viewData['view'];
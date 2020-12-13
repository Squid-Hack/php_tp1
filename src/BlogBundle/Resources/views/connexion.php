<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/favicon.png" type="image/png">
    <title>Connexion</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/dyna.js" defer></script>
</head>
<body>
    <main class="connexion">
        <h1>Connexion</h1>
        <div class="interface-connexion">
            <form class="formConnexion" action="index.php" method="get">
                    <!-- <label for="">Pseudo</label> -->
                    <input type="text" name="pseudo" placeholder="Pseudo">
                    <!-- <label for="">Mot de passe</label> -->
                    <input type="password" name="password" placeholder="Password">
                    <input type="hidden" name="page" value="accueil">
                    <input type="submit" name="" id="" value="Send">
            </form>
            <button id="actionNew">New user</button>
            <form class="formNewUser" action="index.php" method="get">
                    <!-- <label for="">Nom</label> -->
                    <input type="text" name="newNom" placeholder="Last name">
                    <!-- <label for="">Prénom</label> -->
                    <input type="text" name="newPrenom" placeholder="First name">
                    <!-- <label for="">Pseudo</label> -->
                    <input type="text" name="newPseudo" placeholder="Pseudo">
                    <!-- <label for="">Mot de passe</label> -->
                    <input type="password" name="newMdp" placeholder="Password">
                    <input type="submit" value="Register">
            </form>
        </div>
    </main>
</body>
</html>
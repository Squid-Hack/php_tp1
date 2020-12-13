<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./image/favicon.png" type="image/png">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/dynaAdmin.js" defer></script>
</head>
<body>

    <!-- header -->
    <?php include('../src/BlogBundle/Resources/views/header.php'); ?>


    <!-- main -->
    <main class="admin">
        <h1>Management items</h1>
        <div class="all-management">
            <div class="newitem">
                <h3>Add a new item</h3>

                <form action="index.php" method="get">
                    <!-- <label for="">Title</label> -->
                    <input type="text" name="title" id="" placeholder="Title">
                    <!-- <label for="">Category</label> -->
                    <input type="text" name="category" placeholder="Category">
                    <!-- <label for="">Content</label> -->
                    <input type="text" name="content" placeholder="Content">
                    <input type="hidden" name="page" value="admin">
                    <input type="submit" value="Add">
                </form>
            </div>

            <div class="deleteitem">
                <h3>Delete a item</h3>
                <div class="selection">
                    <select name="" id="valueArticle">
                        <?php                    
                            foreach($viewData['articles'] as $article) {
                            $dataAdmin .= '<option value="'.$article->getID().'">'.$article->getTitle().'</option>';
                            }
                            echo $dataAdmin;
                        ?>
                    </select>
                    <!-- <div> -->
                    <form id="formDelArt" action="index.php" method="get">
                        <input type="hidden" name="valueDel" value="">
                        <input type="hidden" name="page" value="admin">
                        <input type="submit" value="Delete">
                    </form>
                        <!-- <button id="actionMod">Modifier</button>
                            <form id="formModArt" action="index.php" method="get">
                            <select name="champsModify">
                                <option value="title">Titre</option>
                                <option value="category">Categorie</option>
                                <option value="createdAt">Date de création</option>
                                <option value="content">Description</option>
                            </select>
                            <input type="text" name="champsValue">
                            <input type="hidden" name="valueMod" value="">
                            <input type="hidden" name="page" value="admin">
                            <input type="submit" value="Modifier form">
                        </form> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>

    </main>
</body>
</html>
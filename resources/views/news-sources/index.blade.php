<?php
        // require_once('../../scripts/news/newsManager.php');
        // require_once('../../scripts/categories/categoryManager.php');
        // require_once('../../scripts/utils/session/validateSession.php');

        // $newsSourceSelectedID = (isset($_GET['id'])) ? $_GET['id'] : null;

        // $newsSourceSelected = null;
        // $categories = getCategories();

        // if ($newsSourceSelectedID !== null) {
        //     $newsSourceSelected = getSourceByID($newsSourceSelectedID);
        // }

        // $userID = confirmLogin()['id'];

        // $newsSources = getSourcesByUser($userID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="../../style/all.css">
    <link rel="stylesheet" href="../../style/header.css">
    <link rel="stylesheet" href="../../style/footer.css">
    <link rel="stylesheet" href="../../style/body.css"> -->

    <title>News Sources</title>
</head>
<body>
    <header id="header-container-index" class="sticky">
        <nav id="main-menu"  role="navigation" class="navbar">
            <!-- <h1><a class="navbar-brand" href="myCover.php">My Cover</a></h1> -->
            <ul class="links">
                <!-- <li class="nav-item"><a class="nav-link" href="myCover.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="newsSources.php">News Sources</a></li>
                <li class="nav-item"><a class="nav-link" href="../../scripts/utils/session/logout.php">Logout</a></li> -->
            </ul>
        </nav>
    </header>

    <div class="main-content">
        <h2>News Sources Administration</h2>

        <table class="table">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Source Name</th>
                    <th>rss url</th>
                    <th>Category</th>
                </tr>
            </thead>

            <tbody>

                <?php 
                    // if ( !empty($newsSources)) {
                    //     foreach ($newsSources as $newsSource) :
                    //         echo '<tr>';

                    //             echo '<td>' . $newsSource['id'] . '</td>';
                    //             echo '<td>' . $newsSource['name'] . '</td>';
                    //             echo '<td>' . $newsSource['url'] . '</td>';
                    //             echo '<td>' . $newsSource['category'] . '</td>';

                    //             echo '<td><a href="newsSources.php?id=' . $newsSource['id'] . '">Edit</a> </td>';
                    //             echo '<td><a href="../../scripts/news/deleteNewsSource.php?id=' . $newsSource['id'] . '">Delete</a></td>';
                                
                    //         echo '</tr>';
                    //     endforeach; 
                    // }
                ?>
            </tbody>
        </table>


    <footer class="footer-content">
        <h3>Pamela Murillo Anchia</h3>
        <h4>Universidad Tecnica Nacional</h4>
    </footer>
</body>
</html>
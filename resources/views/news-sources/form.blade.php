<?php


$newsSourceSelected['name'] = 'random source name';
$newsSourceSelected['url'] = 'random source url';
$newsSourceSelected['categoryID'] = '1';

$categories = ['nacionales', 'deportes', 'entretenimiento'];


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
        <title>News Sources Administration</title>
    </head>
    <body>
        
            <?php 
                if (isset($id)) {

                    echo '<form action="' . route('source.edit') . '" method="POST" class="form-inline" role="form">';
                
                } else {
                    echo '<form action="' . route('source.create') . '" method="POST" class="form-inline" role="form">';
                }
            ?>
            
                @csrf
                @method('post')

                <div class="form-group">
                    <label class="label-form" for="name">News Source</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter news source name" <?php if( isset($id) ) { echo " value='".$newsSourceSelected['name'] ."'";} ?> required>
                
                </div>

                <div class="form-group">
                    <label class="label-form" for="url">RSS link</label>
                    <!-- <input type="text" class="form-control" name="rss" placeholder="Enter RSS link"  if($newsSourceSelectedID !== null) { echo " value='".$newsSourceSelected['url'] ."' ";} ?> required> -->
                </div>

                <div class="form-group">
                    <label for="categoryID">Category</label>
                    <select id="categoryID" class="form-control" name="fk_category_id" required>
                    <?php
                        foreach($categories as $category) {
                            $selected = ($category['id'] === $newsSourceSelected['categoryID']) ? 'selected' : '';
                            echo "<option value=\"{$category['id']}\" $selected>{$category['name']}</option>";
                        }
                    ?>
                    </select>
                </div>
                
                <input type="submit" class="btn btn-primary" value="Add News Source"></input>


            <?php 
                if (isset($id)) {

                    echo '<input type="submit" class="btn btn-primary" value="Edit News Source"></input>';
                    // echo '<a class="btn btn-warning" href="newsSources.php">Stop Editing</a>';
                
                } else {
                     echo '<input type="submit" class="btn btn-primary" value="Add News Source"></input>';
                }
            ?>

        </div>
    </body>
</html>
<?php
    $backgroundImage = "img/sea.jpg";
    
    if (isset($_GET['keyword']) && isset($_GET['category'])) {
        include 'api/pixabayAPI.php';
        if ($_GET['category'] != '') {
            $imageURLs = getImageURLs($_GET['category'], $_GET['layout']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        } elseif ($_GET['keyword'] != '') {
            $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
            $backgroundImage = $imageURLs[array_rand($imageURLs)];
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Image Carousel </title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage ?>');
                background-size: 100% 100%;
                background-attachment: fixed;
            }
        </style>
    </head>
    
    <body>
        
        <br /> <br />
        <form>
        
            <div id="layoutDiv">
                <input type="text" name="keyword" placeholder="keyword" value="<?=$_GET['keyword']?>"/>
                <?php
                    if (isset($_GET['layout']) && $_GET['layout'] == "horizontal" ) {
                        echo '<input type="radio" id="lhorizontal" name="layout" value="horizontal" checked="checked">';
                    } else {
                        echo '<input type="radio" id="lhorizontal" name="layout" value="horizontal">';
                    }
                ?>
                <label for="Horizontal"></label><label for="lhorizontal"> Horizontal </label>
                <?php
                    if (isset($_GET['layout']) && $_GET['layout'] == "vertical" ) {
                        echo '<input type="radio" id="lvertical" name="layout" value="vertical" checked="checked">';
                    } else {
                        echo '<input type="radio" id="lvertical" name="layout" value="vertical">';
                    }
                ?>
                <label for="Vertical"></label><label for="lvertical"> Vertical </label>
            </div>
            
            <br />
            
            <select name="category">
                    <option value=""> - Select One - </option>
                    <option value="ocean">Sea</option>
                    <option value="forest">Forest</option>
                    <option value="mountain">Mountain</option>
                    <option value="snow">Snow</option>
            </select>
            
            <br /> <br />
            
            <input type="submit" value="Search"/>
            
            <br /> <br />
        
        </form>
    
        <?php
            if (!isset($imageURLs)) {
                echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com </h2>";
            } else {
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)? "class='active'" : "";
                        echo "></li>";
                    }
                ?>
            </ol>
            
            <div class="carousel-inner" role="listbox">
                <?php
                    for ($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0, count($imageURLs));
                        } 
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="carousel-item ';
                        echo ($i == 0) ? "active":"";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            
            <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            
        </div>
        
        <?php
            }
        ?>
    </body>
</html>
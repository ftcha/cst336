<?php
    include 'inc/header.php';
    
    function getPictures() {
        
        include 'dbConnection.php';
        $conn = getDatabaseConnection();
        
        $sql = "select pictureURL from pets";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        return $records;
    }
    
    $pictures = getPictures();
    

?>

    <!-- add Carousel component -->
    
    <div id="petCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators Here -->
        <ol class="carousel-indicators">
            <?php
                for ($i=0; $i < sizeof($pictures); $i++) {
                    echo "<li data-target='#petCarousel' data-slide-to='$i'";
                    echo ($i == 0)? "class='active'" : "";
                    echo "></li>";
                }
            ?>
        </ol>
        
        <div class="carousel-inner" role="listbox">
            <?php
                for ($i=0; $i < sizeof($pictures); $i++) {
                    $petPicture = $pictures[$i]['pictureURL'];
                    echo '<div class="carousel-item ';
                    echo ($i == 0) ? "active":"";
                    echo '">';
                    echo "<img src='img/" . $petPicture . "'>";
                    echo '</div>';
                }
            ?>
        </div>
        
        <a class="carousel-control-prev" href="#petCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#petCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </a>
        
    </div>

    <br /><br />
    <a class="btn btn-outline-primary" href="pets.php" role="button"> Adopt Now! </a>
    <br /><br />
    <hr>



<?php
    include 'inc/footer.php';
?>
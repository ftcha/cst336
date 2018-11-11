<?php

    if (isset($_GET['option'])) {
        $imgArray = Array();
        $imgArray = Array(
            "img/Earth.jpg",  
            "img/Fire.jpg",
            "img/Metal.jpg",
            "img/Water.jpg",
            "img/Wood.jpg"
        );
        shuffle($imgArray);
        
        for($i=0; $i<5; $i++) {
            $_GET["pic$i"] = substr($imgArray[$i], 4, -4);
        }
    } else {
        if (isset($_GET['pic0']) && isset($_GET['pic1']) && isset($_GET['pic2']) && isset($_GET['pic3']) && isset($_GET['pic4'])) {
            if ($_GET['pic0'] != '' && $_GET['pic1'] != '' && $_GET['pic2'] != '' && $_GET['pic3'] != '' && $_GET['pic4'] != '') {
                    $imgArray = Array();
                   
                    for($i=0; $i<5; $i++) {
                        $imgArray[$i] = "img/" . $_GET["pic$i"] . ".jpg";
                    }
            } else {
                $error = true;
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Homework 3 </title>
        <meta charset="utf-8">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
       
        <style>
            @import url("css/styles.css");

        </style>
    </head>
    
    <body>
        <header> 
            <h1> Elements Collage </h1>
        </header>
        
        <br /><br />
        
        <form>
            <div id="div1">
                <table>
                    <tr>
                        <th> Image Position </th>
                        <th> Element Image </th>
                    </tr>
                    <tr>
                        <td>
                            Top Left
                        </td>
                        <td>
                            <select name="pic0">
                                <?php
                                    if ($_GET['pic0'] != "") {
                                        echo '<option value="'.$_GET['pic0'].'">'.$_GET['pic0'].'</option>';
                                    } else {
                                        echo '<option value=""> - Select One - </option>';
                                    }
                                ?>
                                <option value="Earth">Earth</option>
                                <option value="Water">Water</option>
                                <option value="Fire">Fire</option>
                                <option value="Wood">Wood</option>
                                <option value="Metal">Metal</option>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            Top Right
                        </td>
                        <td>
                            <select name="pic1">
                                <?php
                                    if ($_GET['pic1'] != "") {
                                        echo '<option value="'.$_GET['pic1'].'">'.$_GET['pic1'].'</option>';
                                    } else {
                                        echo '<option value=""> - Select One - </option>';
                                    }
                                ?>
                                <option value="Earth">Earth</option>
                                <option value="Water">Water</option>
                                <option value="Fire">Fire</option>
                                <option value="Wood">Wood</option>
                                <option value="Metal">Metal</option>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            Bottom Left
                        </td>
                        <td>
                            <select name="pic2">
                                <?php
                                    if ($_GET['pic2'] != "") {
                                        echo '<option value="'.$_GET['pic2'].'">'.$_GET['pic2'].'</option>';
                                    } else {
                                        echo '<option value=""> - Select One - </option>';
                                    }
                                ?>
                                <option value="Earth">Earth</option>
                                <option value="Water">Water</option>
                                <option value="Fire">Fire</option>
                                <option value="Wood">Wood</option>
                                <option value="Metal">Metal</option>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            Bottom Right
                        </td>
                        <td>
                            <select name="pic3">
                                <?php
                                    if ($_GET['pic3'] != "") {
                                        echo '<option value="'.$_GET['pic3'].'">'.$_GET['pic3'].'</option>';
                                    } else {
                                        echo '<option value=""> - Select One - </option>';
                                    }
                                ?>
                                <option value="Earth">Earth</option>
                                <option value="Water">Water</option>
                                <option value="Fire">Fire</option>
                                <option value="Wood">Wood</option>
                                <option value="Metal">Metal</option>
                            </select>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            Center
                        </td>
                        <td>
                            <select name="pic4">
                                <?php
                                    if ($_GET['pic4'] != "") {
                                        echo '<option value="'.$_GET['pic4'].'">'.$_GET['pic4'].'</option>';
                                    } else {
                                        echo '<option value=""> - Select One - </option>';
                                    }
                                ?>
                                <option value="Earth">Earth</option>
                                <option value="Water">Water</option>
                                <option value="Fire">Fire</option>
                                <option value="Wood">Wood</option>
                                <option value="Metal">Metal</option>
                            </select>
                         </td>
                    </tr>
                </table>
            </div>
            
            
            <div id='div2'>
        
                Collage Title:<br>
                <input type="text" name="collageTitle" value="<?=$_GET['collageTitle']?>"/>
                
                <br />
                
                <?php
                    if (isset($_GET['option']) && $_GET['option'] == "random" ) {
                        echo '<input type="checkbox" id="random" name="option" value="random" checked="checked">';
                    } else {
                        echo '<input type="checkbox" id="random" name="option" value="random">';
                    }
                ?>
                
                
                
                <label for="Random"></label><label for="random"> Random </label>
                
                
                <br />
                
                <input type="submit" id="submit" value="Submit"/>
                
            </div>
        
        </form>
        
        
        <?php
            if (empty($imgArray)) {
                echo '<div id="error">';
        
                echo '<br />';
            
                echo 'Please five element images or check random.';
        
                echo '<br /> <br />';
        
                echo '</div>';
            } else {
                echo '<div id="nameOfImage">';
            
                echo '<span id="collageTitle">' . $_GET['collageTitle'] . '</span>';
        
                echo '<br />';
        
                echo '</div>';
                
                
                echo '<div id="imageContainer">';
                for($i=0; $i<5; $i++) {
                    $imgId = "img$i";
                    echo '<img src="' . $imgArray[$i] . '" id="' . $imgId .'"/>';
                }
                echo '</div>';
            }
	    ?>
        
        <footer>
            <hr>
              CST336 2018&copy; Tcha <br />
              <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
              
              <img src="img/csumb_logo.png" alt="csumb logo" />
            
        </footer>
    </body>
</html>
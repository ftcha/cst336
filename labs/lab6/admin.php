<?php

    session_start();
    
    include 'dbConnection.php';
        
    $conn = getDatabaseConnection();
    
    if (!isset($_SESSION['adminName'])) {
        header("Location:login.php");
    }
    
    function displayAllProducts() {
        
        global $conn;
        
        $sql = "SELECT *
                FROM om_product
                ORDER BY productID";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $records;
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

        <h1> Admin Main Page </h1>
        
        <h3> Welecome <?=$_SESSION['adminName']?>!</h3>
        
        <form action="addProduct.php">
            <input type="submit" class="btn btn-secondary" id="beginning" name="addproduct" value="Add Product"/>
        </form><br />
        
        <form action="logout.php">
            <input type="submit" class='btn btn-secondary' id="beginning" value="Logout"/>
        </form><br/>
        
            <?php
                $records = displayAllProducts();
                echo "<table class='table table-hover'>";
                echo "<thead>
                        <tr>
                            <th scope='col'>ID</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Description</th>
                            <th scope='col'>Price</th>
                            <th scope='col'>Update</th>
                            <th scope='col'>Remove</th>
                        </tr>
                       </thead>";
                echo "<tbody>";
                
                foreach ($records as $record) {
                    echo "<tr>";
                    echo "<td>".$record['productId']."</td>";
                    echo "<td>".$record['productName']."</td>";
                    echo "<td>".$record['productDescription']."</td>";
                    echo "<td>$".$record['price']."</td>";
                    echo "<td><a class='btn btn-primary' href='updateProduct.php?productId=".$record['productId']."'>Update</a></td>";
                    
                    echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                    echo "<input type='hidden' name='productId' value= '".$record['productId']."' />";
                    echo "<td><input type='submit' class='btn btn-danger' value='Remove'></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table";
            ?>

    </body>
</html>
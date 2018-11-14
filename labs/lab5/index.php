<?php

include 'dbConnection.php';
    
$conn = getDatabaseConnection();

function displayCategories(){
    global $conn;
    
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($records as $record){
        echo "<option value='".$record["catId"]."'>" . $record["catName"] . "</option>";
    }
}

function displaySearchResults() {
    global $conn;
    
    if (isset($_GET['searchForm'])) {
        echo "<span id='found'> Products Found: </span><br/><br/>";
        
        $namedParameters = array();
        $sql = "SELECT * FROM om_product WHERE 1";
        
        if (!empty($_GET['product'])){
            $sql .= " AND productName LIKE :productName OR productDescription LIKE :productName";
            $namedParameters[":productName"] = "%" . $_GET["product"] . "%";
        }
        
        if (!empty($_GET["category"])){
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET["category"];
        }
        
        if (!empty($_GET["priceFrom"])){
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET["priceFrom"];
        }
        
        if (!empty($_GET['priceTo'])){
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET["priceTo"];
        }
        
        if(isset($_GET["orderBy"])){
            if($_GET["orderBy"] == "price"){
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table>";
        echo "<tr>";
        echo "<th> Name </th>";
        echo "<th> Description </th>";
        echo "<th> Price </th>";
        echo "<th> History </th>";
        echo "</tr>";
        
        foreach ($records as $record) {
            echo "<tr>";
            echo "<td>". $record["productName"] ."</td>";
            echo "<td>". $record["productDescription"] ."</td>";
            echo "<td> $". $record["price"] ."</td>";
            echo "<td> <a href=\"purchaseHistory.php?productId=".$record["productId"]."\"> History </a> </td>";
            echo "</tr>";
        } 
        
        echo "</table>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <div>
            <header> OtterMart Product Search </header>
            
            <hr id="afterHeader">
            
            <form>
                Product: <input type="text" name="product" />
                <br>
                Category:
                    <select name="category">
                        <option value="">Select one</option>
                        <?=displayCategories()?>
                    </select>
                <br>
                Price: From <input type="text" name="priceFrom" size="7"/>
                       To <input type="text" name="priceTo" size="7"/>
                <br>
                Order result by:
                <br>
                
                <input type="radio" name="orderBy" value="price"/> Price <br>
                <input type="radio" name="orderBy" value="name"/> Name 
                
                <br><br>
                <input type="submit" id="search" value="Search" name="searchForm" />
                
            </form>
            
            <br />
        
        </div>
        
        <hr>
        <?=displaySearchResults()?>
        
        <footer>
            <hr>
              CST336 2018&copy; Tcha <br />
              <strong>Disclaimer:</strong> The information in this webpage is fictitous. <br />
              
              <img src="img/csumb_logo.png" alt="csumb logo" />
            
        </footer>
    
    </body>
</html>
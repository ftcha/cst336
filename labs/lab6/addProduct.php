<?php 

    session_start();
    include 'dbConnection.php';
        
    $conn = getDatabaseConnection();

    
    function getCategories() {
        
        global $conn;
        
        $sql = "SELECT catId, catName 
                FROM om_category 
                ORDER BY catName";
        
        $statement=$conn->prepare($sql);
        $statement->execute();
        $records=$statement->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo "<option value='" . $record['catId'] . "'>" . $record['catName'] . "</option>";
        }
    }
    
    if (isset($_GET['submitProduct'])) {
        $productName=$_GET['productName'];
        $productDescription=$_GET['description'];
        $productImage=$_GET['productImage'];
        $price=$_GET['price'];
        $catId=$_GET['catId'];
        
        $sql = "INSERT INTO om_product
              ( productName, productDescription, productImage, price, catId)
              VALUES ( :productName, :productDescription, :productImage, :price, :catId)";
              
        $np = array();
        $np[':productName'] = $productName;
        $np[':productDescription'] = $productDescription;
        $np[':productImage'] = $productImage;
        $np[':price'] = $price;
        $np[':catId'] = $catId;
        
        $statement = $conn->prepare($sql);
        $statement->execute($np);
        
    }
?>

<!DOCTYPE html>
<HTML lang='en'>
    <head>
        <title> Add Product </title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <form>
            <strong>Product Name</strong> <input type="text" class="form-control" name="productName"><br />
            <strong>Description</strong> <textarea name="description" class="form-control" cols="50" rows="4"></textarea><br />
            <strong>Price</strong> <input type="text" class="form-control" name="price"><br />
            <strong>Category</strong> <select name="catId" class="form-control">
                <option value="">Select One</option>
                <?php getCategories();?>
            </select><br />
            <strong>Set Image URL</strong> <input type="text" name="productImage" class="form-control"><br />
            <input type="submit" name="submitProduct" class='btn btn-primary' value="Add Product">
        </form>

    </body>
</HTML>
<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


<br><br>
<h2 class="items-title">Add New Product</h2>
<br>

<?php
$message = "";
if (isset($_POST['create_product'])) {
    //getting and escaping the inputs form the form
    $modal = escape($_POST['modal']);
    $brand = escape($_POST['brand']);
    $categ = escape($_POST['categ']);
    $price = escape($_POST['price']);
    $featured = escape($_POST['featured']);
    $description = escape($_POST['description']);

    $product_image = $_FILES['image']['name'];
    $product_image_temp = $_FILES['image']['tmp_name'];
    //check for existence
    if (!file_exists($product_image)) {
        //Uploading image
        move_uploaded_file($product_image_temp, "../img/$product_image");
    }
    $product_image = "img/".escape($product_image);
    //insert query
    $query =
        "INSERT INTO products (modal, brand, categ, price, image, description, featured) VALUES 
('{$modal}', '{$brand}', '{$categ}', {$price}, '{$product_image}', '{$description}', '{$featured}');";

    $insert_query = mysqli_query($connection, $query);
    confirmQuery($insert_query);
    $message = "<h4 style='background: rgba(0, 250, 0, 0.5);padding= 1rem; text-align: center; margin: 0 auto; max-width: 350px;'>Product was added.</h4>";
}

echo $message;
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Model</label>
        <input type="text" class="form-control" name="modal" placeholder="Model" required>
    </div>

    <div class="form-group">
        <label for="brand">Brand</label>
        <select name="brand" id="brand" class="form-control">
            <option value="asus">ASUS</option>
            <option value="lenovo">LENOVO</option>
            <option value="msi">MSI</option>
            <option value="apple">APPLE</option>
            <option value="hp">HP</option>
        </select>
    </div>
    <div class="form-group">
        <label for="categ">Category</label>
        <select name="categ" id="categ" class="form-control">
            <option value="student">Student</option>
            <option value="home">Home</option>
            <option value="multimedia">Multimedia</option>
            <option value="business">Business</option>
            <option value="gaming">Gaming</option>
        </select>
    </div>


    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" placeholder="CAD$" step="any" max="15000" min="0" required>
    </div>

    <div class="form-group">
        <label for="featured-p">Featured</label>
        <select name="featured" id="featured-p" class="form-control">
            <option value="false">No</option>
            <option value="true">Yes</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <input class="form-control" type="file" name="image">
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_product" value="Add Product">
    </div>


</form>


<!-- footer -->
<?php include "includes/footer.php" ?>
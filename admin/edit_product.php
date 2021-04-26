<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


<br><br>
<h2 class="items-title">Edit Product</h2>
<br>

<?php

if (isset($_GET['p_id'])) {
    $id = $_GET['p_id'];

    $query = "SELECT * FROM products WHERE id = $id;";

    $select_query = mysqli_query($connection, $query);
    confirmQuery($select_query);
    if (mysqli_num_rows($select_query) < 1) {
        redirect('./');
    }
    //getting product from database
    while ($row = mysqli_fetch_assoc($select_query)) {
        $modal = $row['modal'];
        $brand = $row['brand'];
        $categ = $row['categ'];
        $price = $row['price'];
        $image = $row['image'];
        $featured = $row['featured'];
        $description = $row['description'];
    }


    if (isset($_POST['update_product'])) {

        //getting and escaping the inputs form the form
        $modal = escape($_POST['modal']);
        $brand = escape($_POST['brand']);
        $categ = escape($_POST['categ']);
        $price = escape($_POST['price']);
        $featured = escape($_POST['featured']);
        $description = escape($_POST['description']);

        $product_image = $_FILES['image']['name'];
        $product_image_temp = $_FILES['image']['tmp_name'];

        if (empty($product_image)) {
            $product_image = $image;
        } else {
            //check for existence
            if (!file_exists($product_image)) {
                //Uploading image
                move_uploaded_file($product_image_temp, "../img/$product_image");
            }
            $product_image = "img/" . escape($product_image);
        }


        $query =
            "UPDATE products SET modal='{$modal}' , brand= '{$brand}', categ= '{$categ}', price= {$price} , image= '{$product_image}', description='{$description}' , featured= '{$featured}' WHERE id = $id;";

        $update_query = mysqli_query($connection, $query);
        confirmQuery($update_query);
        redirect('./');
    }
} else {
    redirect('./');
}

?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Model</label>
        <input type="text" class="form-control" name="modal" placeholder="Model" value="<?php echo $modal ?>" required>
    </div>

    <div class="form-group">
        <label for="brand">Brand</label>
        <select name="brand" id="brand" class="form-control">
            <option value="asus" <?php if ($brand == 'asus') echo 'selected'; ?>>ASUS</option>
            <option value="lenovo" <?php if ($brand == 'lenovo') echo 'selected'; ?>>LENOVO</option>
            <option value="msi" <?php if ($brand == 'msi') echo 'selected'; ?>>MSI</option>
            <option value="apple" <?php if ($brand == 'apple') echo 'selected'; ?>>APPLE</option>
            <option value="hp" <?php if ($brand == 'hp') echo 'selected'; ?>>HP</option>
        </select>
    </div>
    <div class="form-group">
        <label for="categ">Category</label>
        <select name="categ" id="categ" class="form-control">
            <option value="student" <?php if ($categ == 'student') echo 'selected'; ?>>Student</option>
            <option value="home" <?php if ($categ == 'home') echo 'selected'; ?>>Home</option>
            <option value="multimedia" <?php if ($categ == 'multimedia') echo 'selected'; ?>>Multimedia</option>
            <option value="business" <?php if ($categ == 'business') echo 'selected'; ?>>Business</option>
            <option value="gaming" <?php if ($categ == 'gaming') echo 'selected'; ?>>Gaming</option>
        </select>
    </div>


    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" name="price" placeholder="CAD$" step="any" max="15000" min="0" value="<?php echo $price ?>" required>
    </div>

    <div class="form-group">
        <label for="featured-p">Featured</label>
        <select name="featured" id="featured-p" class="form-control">
            <option value="false" <?php if ($featured == 'false') echo 'selected'; ?>>No</option>
            <option value="true" <?php if ($featured == 'true') echo 'selected'; ?>>Yes</option>
        </select>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <img src='../<?php echo $image ?>' alt="product image">
        <input class="form-control" type="file" name="image">
    </div>


    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required><?php echo $description ?></textarea>
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_product" value="Update Product">
    </div>


</form>


<!-- footer -->
<?php include "includes/footer.php" ?>
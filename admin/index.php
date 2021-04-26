<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


<br><br>
<h2 class="items-title">Product List</h2>
<br>
<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Vendor</th>
            <th>Category</th>
            <th>price</th>
            <th>rating</th>
            <th>image</th>
            <th>featured</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        // getting all products
        $query = "SELECT id,modal,brand, categ, price, image, featured,
(SELECT ROUND(AVG(comment_rating),1) FROM comments WHERE id = comment_product_id) as rating
from products;";

        $select_query = mysqli_query($connection, $query);
        confirmQuery($select_query);
        //looping through the result of query
        while ($row = mysqli_fetch_assoc($select_query)) {
            //displaying each item
            $id = $row['id'];
            $modal = $row['modal'];
            $brand = $row['brand'];
            $categ = $row['categ'];
            $price = $row['price'];
            $rating = $row['rating'];
            $image = $row['image'];
            $featured = $row['featured'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$modal}</td>";
            echo "<td>{$brand}</td>";
            echo "<td>{$categ}</td>";
            echo "<td>$$price</td>";
            echo "<td>";
            echoRating($rating);
            echo "</td>";
            echo "<td><img src='../{$image}'alt='product image'></td>";
            echo "<td>{$featured}</td>";
            echo "<td><a class='btn btn-info' href=\"edit_product.php?p_id={$id}\">Edit</a></td>";
            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href=\"?delete_p={$id}\">Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <?php deleteProduct(); 
        ?>
    </tbody>
</table>
<br><br>




<!-- footer -->
<?php include "includes/footer.php" ?>
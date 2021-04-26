<?php include "includes/header.php" ?>
<?php include "includes/navigation.php" ?>


<br><br>
<h2 class="items-title">Product List</h2>
<br>
<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product title</th>
            <th>Author</th>
            <th>Email</th>
            <th>Date</th>
            <th>Rating</th>
            <th>Content</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        //show all comments
        $query = "SELECT comment_id,comment_author, comment_email, comment_date, comment_rating, comment_content, 
        (SELECT concat(brand, ', ',modal) from products where id = comment_product_id) as product_title
        from comments";

        $select_query = mysqli_query($connection, $query);
        confirmQuery($select_query);
        while ($row = mysqli_fetch_assoc($select_query)) {
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $product_title = strtoupper($row['product_title']);
            $comment_email = $row['comment_email'];
            $comment_date = $row['comment_date'];
            $comment_rating = $row['comment_rating'];
            $comment_content = $row['comment_content'];
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$product_title}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_date}</td>";
            echo "<td>";
            echoRating($comment_rating);
            echo "</td>";
            echo "<td style='max-width: 300px;'>{$comment_content}</td>";
            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete?');\" href=\"?delete_c={$comment_id}\">Delete</a></td>";
            echo "</tr>";
        }
        ?>

        <?php deleteComment(); ?>
    </tbody>
</table>
<br><br>




<!-- footer -->
<?php include "includes/footer.php" ?>
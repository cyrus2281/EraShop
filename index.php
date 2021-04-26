<?php include "includes/header.php" ?>

<title>Era Shop || Online Retail Shop</title>
</head>

<body>
    <!-- preloader -->
    <?php include "includes/preloader.php" ?>
    <!-- cart -->
    <?php include "includes/cart.php" ?>
    <!-- header, nav, banner, and skills -->
    <?php include "includes/navigation.php" ?>
    <!-- featured -->
    <?php include "includes/featured.php" ?>



    <!-- Items product-->
    <section class="items" id="items-section">
        <div class="items-center">
            <h2 class="items-title">Our Products</h2>
            <div class="items-container load-content">
                <!-- single item -->
                <?php
                //counting all items
                $query = "SELECT id from products;";
                $count_query = mysqli_query($connection, $query);
                confirmQuery($count_query);
                $count = mysqli_num_rows($count_query);
                // $count=20;
                //calculate items per page
                $item_per_page = 9;
                $number_page = ceil($count / $item_per_page);
                if (isset($_GET['page'])) {
                    try {
                        $current_page = $_GET['page'] - 1;
                    } catch (\Throwable $th) {
                        $current_page = 0;
                    }
                } else {
                    $current_page = 0;
                }
                $start_post_number = $current_page * $item_per_page;


                //getting all featured items
                $select_query = mysqli_query($connection, "SELECT id,modal,brand, categ, price, image, featured,
(SELECT ROUND(AVG(comment_rating),1) FROM comments WHERE id = comment_product_id) as rating
from products ORDER BY id DESC LIMIT $start_post_number,$item_per_page;");
                confirmQuery($select_query);
                //looping through the result of query
                while ($row = mysqli_fetch_assoc($select_query)) {
                    //displaying each item
                ?>
                    <div class="<?php echo "item t " . $row['brand'] . " " . $row['categ'] ?>" data-price="<?php echo $row['price'] ?>" data-rating="<?php echo ($row['rating'] < 1) ? 0 : $row['rating'] ?>" data-id="<?php echo $row['id'] ?>">
                        <a href="./product?p_id=<?php echo $row['id'] ?>" class="item-img-container">
                            <img src="<?php echo $row['image'] ?>" class="item-img" alt="product item image" />
                        </a>
                        <div class="item-info">
                            <h2 class="item-title"><a href="./product?p_id=<?php echo $row['id'] ?>"><?php echo $row['modal'] ?></a></h2>
                            <h3 class="item-subtitle"><?php echo $row['brand'] ?></h3>
                            <h4 class="item-subtext"><?php echo $row['categ'] ?></h4>
                        </div>
                        <div class="item-extra">
                            <div class="item-stars">
                                <?php echoRating($row['rating']); ?>
                            </div>
                            <span class="item-price">$<?php echo $row['price'] ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- pager -->
            <ul class="pager">
                <?php
                for ($i = 1; $i <= $number_page; $i++) {
                    if ($i == $current_page + 1) {
                        echo "<li><a class='current-page' href='?page={$i}'>$i</a></li>";
                    } else {
                        echo "<li><a href='?page={$i}'>$i</a></li>";
                    }
                }

                ?><li></li>
            </ul>
        </div>
    </section>
    <!-- end of items products -->

    <!-- index js -->
    <!-- <script src="js/index.js"></script> -->
    <!-- footer -->
    <?php include "includes/footer.php" ?>
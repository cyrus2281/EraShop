    <!-- slides -->
    <section class="slides" id="slides">
        <h3 class="slides-title">Featured Products</h3>
        <div class="slides-center owl-carousel owl-theme">
        <!-- <div class="slides-center"> -->
            <!-- single featured item -->
            <?php
            //getting all featured items
            $select_query = mysqli_query($connection, "SELECT * FROM products where featured = 'true';");
            confirmQuery($select_query);

            while ($row = mysqli_fetch_assoc($select_query)) {
            ?>
                <!-- single featured item -->
                <article class="featured-item">
                    <h3 class="featured-header"><?php echo $row["brand"] ?></h3>
                    <h4 class="featured-subtitle"><?php echo $row["modal"] ?></h4>
                    <div class="featured-container">
                        <img src="<?php echo $row["image"] ?>" class="featured-picture" alt="featured product" />
                        <a href="./product?p_id=<?php echo $row["id"] ?>" class="featured-icon">
                            <i class="fas fa-eye"></i>
                        </a>
                    </div>
                </article>
                <!-- end of single featured item -->
            <?php } ?>
        </div>
    </section>
    <!-- end of slides -->
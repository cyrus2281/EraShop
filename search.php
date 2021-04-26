<?php include "includes/header.php" ?>
<title>Era Shop || Search</title>
<!-- search css -->
<link rel="stylesheet" href="css/search.css" />
</head>

<body>
  <!-- preloader -->
  <?php include "includes/preloader.php" ?>
  <!-- cart -->
  <?php include "includes/cart.php" ?>
  <!-- header, nav, banner, and skills -->
  <?php include "includes/navigation.php" ?>





  <!-- Items product -->
  <section class="items" id="items-section">
    <div class="items-center">
      <h2 class="items-title">Search Result</h2>
      <div class="search-loading">
        <img src="img/preloader.gif" alt="loading">
      </div>
      <div class="items-container load-content">
        <!-- items -->
        <?php
        //check for get value
        if (isset($_GET['searched'])) {
          $searched = escape($_GET['searched']);
          //getting items with including key words

          $select_query = mysqli_query($connection, "SELECT id,modal,brand, categ, price, image, featured,
(SELECT ROUND(AVG(comment_rating),1) FROM comments WHERE id = comment_product_id) as rating
from products WHERE modal LIKE '%$searched%' OR brand LIKE '%$searched%' OR categ LIKE '%$searched%';");
          confirmQuery($select_query);
          //confirming the result
          if (mysqli_num_rows($select_query) < 1) {
            echo '<div class="no-item-search">no item found</div>';
          } else {
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
        <?php }
          }
        } else {
          redirect("./");
        } ?>
      </div>
    </div>
  </section>
  <!-- end of item products -->




  <!-- search js -->
  <script src="js/search.js"></script>
  <!-- filter and sort js -->
  <script src="js/filterSort.js"></script>
  <!-- footer -->
  <?php include "includes/footer.php" ?>
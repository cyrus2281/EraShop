<?php include "includes/header.php" ?>

<title>Era Shop || Categories</title>
<!-- selector css -->
<link rel="stylesheet" href="css/selector-filter.css" />
</head>

<body>
  <!-- preloader -->
  <?php include "includes/preloader.php" ?>
  <!-- cart -->
  <?php include "includes/cart.php" ?>
  <!-- header, nav, banner, and skills -->
  <?php include "includes/navigation.php" ?>




  <!-- Items -->
  <section class="items" id="items-section">
    <div class="items-center">
      <!-- items -->
      <?php
      //check for get value
      if (isset($_GET['categ'])) {
        $categ = escape($_GET['categ']);
      ?>
        <h2 class="items-title" id="categ-title"><?php echo $categ; ?></h2>
        <div class="items-container load-content">
          <?php
          //getting items with specified category

          $select_query = mysqli_query($connection, "SELECT id,modal,brand, categ, price, image, featured,
(SELECT ROUND(AVG(comment_rating),1) FROM comments WHERE id = comment_product_id) as rating
from products WHERE categ='$categ';");
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
        <?php }
        } else {
          redirect("./");
        } ?>
        </div>
    </div>
    <div class="no-item-search"></div>
  </section>
  <!-- end of item products -->





  <!-- filter and sort js -->
  <script src="js/filterSort.js"></script>

  <!-- footer -->
  <?php include "includes/footer.php" ?>
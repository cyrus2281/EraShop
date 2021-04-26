<?php include "includes/header.php" ?>

<title>Era Shop || Product Item</title>
<!-- product css -->
<link rel="stylesheet" href="css/product.css" />
</head>

<body>
  <!-- preloader -->
  <?php include "includes/preloader.php"
  ?>
  <!-- cart -->
  <?php include "includes/cart.php" ?>
  <!-- header, nav, banner, and skills -->
  <?php include "includes/navigation.php" ?>


  <!-- items -->
  <?php
  // check for product id
  if (isset($_GET['p_id'])) {
    $p_id = escape($_GET['p_id']);
    //getting all items
    $select_query = mysqli_query($connection, "SELECT id,modal,brand, categ, price, image, featured, description,
(SELECT ROUND(AVG(comment_rating),1) FROM comments WHERE id = comment_product_id) as rating
from products WHERE id = $p_id;");
    confirmQuery($select_query);
    //check if the result is less than 1 and redirect
    if(mysqli_num_rows($select_query) < 1){
      redirect("./");
    }
    //looping through the result of query
    while ($row = mysqli_fetch_assoc($select_query)) {
      //displaying product
  ?>
      <!-- product section -->
      <section class="product-section">
        <div class="product-center">
          <div class="product-container">
            <h2 class="product-title"><?php echo "{$row['brand']} {$row['modal']}";  ?></h2>
            <!-- <div class="product-img-container owl-carousel owl-theme"> -->
            <div class="product-img-container">
              <div class="product-picture">
                <img src="<?php echo $row['image'] ?>" class="product-img" alt="product-image" />
              </div>
            </div>
            <div class="product-information">
              <div class="product-info">
                <h3 class="product-info-header">
                  Model: <span id="product-model" data-id="<?php echo $row['id'] ?>" data-price="<?php echo $row['price'] ?>"><?php echo $row['modal'] ?></span>
                </h3>
                <h3 class="product-info-subheader">
                  Brand: <span id="product-brand"><?php echo $row['brand'] ?></span>
                </h3>
                <h3 class="product-info-underheader">
                  category: <span id="product-categ"><?php echo $row['categ'] ?></span>
                </h3>
              </div>
              <div class="product-detail">
                <p class="prodcut-description">
                  <?php echo $row['description'] ?>
                </p>
                <div class="product-extra">
                  <div class="product-stars">
                    <?php echoRating($row['rating']); ?>
                  </div>
                  <span class="item-price">$<?php echo $row['price'] ?></span>
                </div>
              </div>
            </div>
          </div>
          <!-- form -->
          <div class="product-form-container">
            <form class="product-form">
              <label for="product-storage" class="product-form-label">Internal Storage:</label>
              <select name="product-storage" id="product-storage" class="product-form-inputs">
                <option value="512GB">512GB</option>
                <option value="1TB">1TB</option>
                <option value="2TB">2TB</option>
              </select>
              <label for="product-ram" class="product-form-label">Ram:</label>
              <select name="product-ram" id="product-ram" class="product-form-inputs">
                <option value="8GB">8GB</option>
                <option value="16GB">16GB</option>
                <option value="32GB">32GB</option>
              </select>
              <label for="product-quantity" class="product-form-label">Quantity:</label>
              <input type="number" name="product-quantity" id="product-quantity" value="1" class="product-form-inputs" min="1" />
              <button type="submit" class="product-form-cart" id="submit-cart">
                <i class="fas fa-cart-plus addToCartIcon"></i>$
                <span id="product-total"><?php echo $row['price'] ?></span>
              </button>
            </form>
          </div>
          <!-- feedback -->
          <div class="feedback"></div>
        </div>
      </section>
  <?php }
  } else {
    redirect("./");
  } ?>
  <!-- end of product section -->


  <!-- Comments Form -->
  <?php
  //check for comment
  if (isset($_POST['create_comment'])) {
    $id = escape($_GET['p_id']);
    //get data from form
    $author =  escape($_POST['comment_author']);
    $email = escape($_POST['comment_email']);
    $content =  escape($_POST['comment_content']);
    $rating =  $_POST['comment_rating'];

    if (!(empty($author) && empty($email) && empty($content))) {
      //add comment
      $query = "INSERT INTO comments (`comment_product_id`, `comment_author`, `comment_email`, `comment_content`, `comment_date`, `comment_rating`) VALUES ('$id', '{$author}', '{$email}', '{$content}', now(), {$rating});";

      $insert_comment_query = mysqli_query($connection, $query);
      confirmQuery($insert_comment_query);
      //refresh page
      redirect("./product?p_id=$id");
    } else {
      //give error
      echo "<p style=\"background-color: rgb(255, 0, 0,0.5); padding: 1rem;\">Fields can not be empty</p>";
    }
  }
  ?>

  <div class="well">
    <h4 class="well-title">Leave a Comment:</h4>
    <form action="" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Name" name="comment_author" required></input>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" placeholder="Email" name="comment_email" required></input>
      </div>
      <div class="form-group">
        <i class="fas fa-star item-star pointer rate-1" data-rate="1"></i>
        <i class="fas fa-star item-star pointer rate-2" data-rate="2"></i>
        <i class="fas fa-star item-star pointer rate-3" data-rate="3"></i>
        <i class="fas fa-star item-star pointer rate-4" data-rate="4"></i>
        <i class="fas fa-star item-star pointer rate-5" data-rate="5"></i>
        <input type="hidden" name="comment_rating" id="comment-rating" value="5"></input>
      </div>
      <div class="form-group">
        <textarea class="form-control" name="comment_content" rows="5" placeholder="Comment" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
    </form>
  </div>

  <hr>


  <!-- Posted Comments -->

  <?php
  //getting all comments
  $id = escape($_GET['p_id']);
  $query = "SELECT * from comments WHERE comment_product_id = {$id} ORDER BY comment_id DESC";

  $select_comments_query = mysqli_query($connection, $query);
  confirmQuery($select_comments_query);
  //looping through the result of query
  while ($row = mysqli_fetch_assoc($select_comments_query)) {
    //displaying each comment
    $comment_date = $row['comment_date'];
    $comment_content = $row['comment_content'];
    $comment_author = $row['comment_author'];
    $comment_rating = $row['comment_rating'];

  ?>
    <!-- Comment -->
    <div class="media">
      <div class="media-object">
        <i class="fas fa-comment "></i>
      </div>
      <div class="media-body">
        <h4 class="media-heading"><?php echo $comment_author; ?>
        </h4>
        <div>
          <?php
          for ($i = 0; $i < 5; $i++) {
            if ($i < $row['comment_rating']) {
              echo '<i class="fas fa-star item-star"></i>';
            } else {
              echo '<i class="far fa-star item-star"></i>';
            }
          }
          ?>
          <small><?php echo "$comment_date"; ?></small>
        </div>
        <?php echo trim($comment_content);
        ?>
      </div>
    </div>
  <?php
  }
  ?>



  <!-- product js -->
  <script src="js/product.js"></script>
  <!-- footer -->
  <?php include "includes/footer.php" ?>
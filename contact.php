<?php include "includes/header.php" ?>

<title>Era Shop || Contact Us</title>
<!-- contact css -->
<link rel="stylesheet" href="css/contact.css" />
</head>

<body>
  <!-- preloader -->
  <?php include "includes/preloader.php" ?>
  <!-- cart -->
  <?php include "includes/cart.php" ?>
  <!-- header, nav, banner, and skills -->
  <?php include "includes/navigation.php" ?>




  <!-- contact -->
  <section class="contact">
    <div class="section-center clearfix">
      <!-- contact info -->
      <article class="contact-info">
        <!-- contact item -->
        <div class="contact-item">
          <h3 class="contact-title">
            <span class="contact-icon"><i class="fas fa-location-arrow"></i></span>address
          </h3>
          <p class="contact-text">523 somewhere, Ottawa, On K1C-A2B</p>
        </div>
        <!-- end of contact item -->
        <!-- contact item -->
        <div class="contact-item">
          <h3 class="contact-title">
            <span class="contact-icon"><i class="fas fa-envelope"></i></span>email
          </h3>
          <p class="contact-text">some-email@mail.com</p>
        </div>
        <!-- end of contact item -->
        <!-- contact item -->
        <div class="contact-item">
          <h3 class="contact-title">
            <span class="contact-icon"><i class="fas fa-phone"></i></span>phone
          </h3>
          <p class="contact-text">+1(613)123-4567</p>
        </div>
        <!-- end of contact item -->
      </article>
      <!-- contact form -->
      <article class="contact-form">
        <form class="form-group" action="formspree.com" method="POST">
          <input type="text" name="name" placeholder="name" class="form-control" />
          <input type="email" name="email" placeholder="email" class="form-control" />
          <textarea name="message" rows="3" class="form-control" placeholder="message"></textarea>
          <button type="submit" class="btn-contact">send</button>
        </form>
      </article>
    </div>
  </section>
  <!-- end of contact -->

  <!-- footer -->
  <?php include "includes/footer.php" ?>

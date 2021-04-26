  <!-- header -->
  <header id="home">
      <!-- navbar  -->
      <nav class="navbar">
          <div class="nav-center">
              <!-- nav header -->
              <div class="nav-header">
                  <a href="./">
                      <img src="./img/era-shop-logo.png" class="nav-logo" alt="era shop logo" />
                  </a>
              </div>
              <!-- end of navber header -->
              <!-- nav  icons -->
              <div class="nav-icons">
                  <div class="shopping-cart-container">
                      <a class="nav-icon" id="shopping-cart"><i class="fas fa-shopping-cart"></i></a>
                      <span class="shopping-cart-amount">0</span>
                  </div>
                  <?php if (isAdmin()) : ?>
                      <a href="./includes/logout.php" class="nav-icon" id="profile"><i class="fas fa-sign-out-alt"></i><span id="login">logout</span></a>
                  <?php else : ?>
                      <a href="./login" class="nav-icon" id="profile"><i class="far fa-user-circle"></i><span id="login">login</span></a>
                  <?php endif; ?>
                  <button type="button" class="nav-toggle" id="nav-toggle" aria-label="nav toggler">
                      <i class="fas fa-bars"></i>
                  </button>
              </div>
              <!-- navbar links -->
              <div class="nav-links" id="nav-links">
                  <a href="./" class="nav-link">home</a>
                  <a class="nav-link categ-btn">categories</a>
                  <a href="./vendors" class="nav-link">vendors</a>
                  <a href="./about" class="nav-link">about us</a>
                  <a href="./contact" class="nav-link">contact us</a>
                  <?php if (isAdmin()) : ?>
                      <a href="./admin" class="nav-link">Admin</a>
                  <?php endif; ?>
              </div>
              <!-- end of navbar links -->
          </div>
          <!-- nav category links -->
          <div class="side-nav-links-container">
              <ul class="side-nav-links" id="side-nav-links">
                  <li>
                      <a href="./categories?categ=student" class="categ-btn"><span><i class="fas fa-graduation-cap"></i></span>Student</a>
                  </li>
                  <li>
                      <a href="./categories?categ=home" class="categ-btn"><span><i class="fas fa-home"></i></span>Home</a>
                  </li>
                  <li>
                      <a href="./categories?categ=multimedia" class="categ-btn"><span><i class="fas fa-cubes"></i></span>Multimedia</a>
                  </li>
                  <li>
                      <a href="./categories?categ=business" class="categ-btn"><span><i class="fas fa-briefcase"></i></span>Business</a>
                  </li>
                  <li>
                      <a href="./categories?categ=gaming" class="categ-btn"><span><i class="fas fa-gamepad"></i></span>Gaming</a>
                  </li>
              </ul>
          </div>
          <!-- navbar seach -->
          <div class="nav-search">
              <div class="search-bar">
                  <form class="search-form" action="./search">
                      <label for="searched" class="search-label">Search</label>
                      <input type="search" class="search-panel" id="searched" placeholder="type here..." name="searched" />
                      <button type="submit" class="search-icon" id="search-submit">
                          <i class="fas fa-search"></i>
                      </button>
                  </form>
                  <button class="search-filter search-extra">
                      <i class="fas fa-filter"></i>
                  </button>
                  <button class="search-sort search-extra">
                      <i class="fas fa-sort"></i>
                  </button>
              </div>
          </div>
          <!-- filter buttons -->
          <div class="filter-container">
              <div class="filter-toggle">
                  <form>
                      <h4 class="filter-title">Filter</h4>
                      <span id="filter-price">
                          <label for="filter-price-range-min" class="filter-label">Price From</label>
                          <input type="number" id="filter-price-range-min" name="price-min" min="350" max="15000" step="50" class="filter-range" value="350" />
                          <label for="filter-price-range-max">To</label>
                          <input type="number" id="filter-price-range-max" name="price-max" min="350" max="15000" step="50" class="filter-range" value="15000" />
                          <label>$CAD</label>
                      </span>
                      <span id="price-rating">
                          <label for="filter-rating-range-min" class="filter-label">Rating From</label>
                          <input type="number" id="filter-rating-range-min" min="0" max="4" step="1" name="sort-min" class="filter-range" value="0" />
                          <label for="filter-rating-range-max">To</label>
                          <input type="number" id="filter-rating-range-max" min="1" max="5" step="1" name="sort-max" class="filter-range" value="5" />
                          <label>Stars</label>
                      </span>
                      <button type="submit" class="filter-btn">Go!</button>
                  </form>
              </div>
          </div>
          <!-- sort buttons -->
          <div class="sort-container">
              <div class="sort-toggle">
                  <h4 class="sort-title">Sort By</h4>
                  <span>
                      <button id="sort-price-low" data-sort="pl" class="sort-btn sort-clicked">
                          Price: Low to High
                      </button>
                  </span>
                  <span>
                      <button id="sort-price-high" data-sort="ph" class="sort-btn sort-clicked">
                          Price: High to Low
                      </button>
                  </span>
                  <span>
                      <button id="sort-rate-low" data-sort="rl" class="sort-btn sort-clicked">
                          Rating: Low to High
                      </button>
                  </span>
                  <span>
                      <button id="sort-rate-high" data-sort="rh" class="sort-btn sort-clicked">
                          Rating: High to Low
                      </button>
                  </span>
              </div>
          </div>
          <!-- end of navbar seach -->
      </nav>
      <!-- end of navbar  -->
      <!-- hero component -->
      <div class="hero">
          <div class="hero-banner">
              <h1 class="hero-title">Think Smart</h1>
              <p class="hero-text">All the best for a whole lot less</p>
              <a href="./#items-section" class="btn-white">Start Shopping</a>
          </div>
      </div>
      <!-- end of hero component -->
  </header>
  <!-- end of header -->

  <!-- skills -->
  <section id="skills" class="skills">
      <div class="skills-container">
          <!-- single skill item -->
          <article class="skill-item">
              <i class="fas fa-smile-beam skill-icon"></i>
              <h2>best services</h2>
              <p>
                  The best customer services. customers' satisfaction is our first
                  priority
              </p>
          </article>
          <!-- end of single skill item -->
          <!-- single skill item -->
          <article class="skill-item skill-item-white">
              <i class="fas fa-shipping-fast skill-icon"></i>
              <h2>fast shipping</h2>
              <p>Fast Express shipping to allover Canada in only few days</p>
          </article>
          <!-- end of single skill item -->
          <!-- single skill item -->
          <article class="skill-item">
              <i class="fas fa-plus skill-icon"></i>
              <h2>high quality</h2>
              <p>The newest and highest quality computers in the technology era</p>
          </article>
          <!-- end of single skill item -->
      </div>
  </section>
  <!-- end of skills -->
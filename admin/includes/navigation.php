<!-- header -->
<header id="home">
    <!-- navbar  -->
    <nav class="navbar">
        <div class="nav-center">
            <!-- nav header -->
            <div class="nav-header">
                <a href="../">
                    <img src="../img/era-shop-logo.png" class="nav-logo" alt="era shop logo" />
                </a>
            </div>
            <!-- end of navber header -->
            <!-- nav  icons -->
            <div class="nav-icons">
                <a href="../includes/logout.php" class="nav-icon" id="profile"><i class="fas fa-sign-out-alt"></i><span id="login"> log out</span></a>
                <button type="button" class="nav-toggle" id="nav-toggle" aria-label="nav toggler">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <!-- navbar links -->
            <div class="nav-links" id="nav-links">
                <a href="../" class="nav-link">home</a>
                <a href="./" class="nav-link">all products</a>
                <a href="./add_product.php" class="nav-link">add item</a>
                <a href="./comments.php" class="nav-link">comments</a>
            </div>
            <!-- end of navbar links -->
        </div>

        <!-- navbar seach -->
        <div class="nav-search">
            <div class="search-bar">
                <form class="search-form" action="../search">
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

        <!-- end of navbar seach -->
    </nav>
    <!-- end of navbar  -->
</header>
<header>
        <div id="navabar-1">    
            <a href="index.php">
                <img src="./assests/img/airjordan.png" class="logo" alt="loi">
            </a>
            <div id="links">
                <a href="">Help |</a>
                <a href="https://www.facebook.com/khanhungzy/">Join Us |</a>
                <?php
                    if(isset($_SESSION['name'])){
                        echo "<a href='logout.php'>Log Out</a>";
                    } else {
                        echo "<a href='login.php'>Login</a>";
                    }
                ?>
                <!-- </p> -->
            </div>
        </div>
        <nav>
          <div class="container">
            <div>
                <a href="index.php">
                    <img src="./assests/img/nikee.jpg" alt="logo" class="logo" />
                </a>
                <div class="menu">
                <ul>
                  <li><a href="index.php">New Releases</a></li>
                  <li><a href="men.php">Men</a></li>
                  <li><a href="women.php">Women</a></li>
                  <li><a href="kids.php">Kids</a></li>
                </ul>
                <form>
                  <div class="search-icon">
                    <i class="fas fa-search"></i>
                  </div>
                  <input style="border:1px solid black; border-radius:10px" type="text" value="<?php echo $_GET['search'] ?? ""; ?>" name="search" id="" class="search" placeholder="Search..."/>
                  <a href="cart.php" >
                    <button type="button" class="nav-btn">
                      <i class="fas fa-cart-plus"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0?></i>
                    </button>
                  </a>
                </form>
              </div>
            </div>
            <div class="menu-btn">
              <i class="fas fa-bars"></i>
            </div>
          </div>
        </nav>
        <div id="navbar-3" >
            <h4>Free Delivery</h4>
            <h6>Shop All Our New Markdowns</h6>
        </div>
</header>


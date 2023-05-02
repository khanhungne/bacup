<?php
    include "data.php"; // luôn include filee keét nối
    session_start();

    global $conn;
    $error = '';
    $searchTitle = '';
    $products = [];
    // query - lấy 3 sản phẩm mới nhất
    $queryString = $_SERVER['QUERY_STRING']; // a=1&b=2
    $queries = explode('&',$queryString); // ['a=1', 'b=2']
    foreach($queries as $que) {
        // 'a=1'
        $q = explode('=', $que); // ['a','1']
        if($q[0] == 'search') {
            $searchTitle = $q[1];
        }
    }

    $result = mysqli_query($conn, "SELECT * from tb_products  where title like '%".$searchTitle."%'  ORDER BY id desc limit 4");
  
    if(mysqli_num_rows($result) > 0){
        // gắn vào biến
        $products = mysqli_fetch_all($result);
    }
?>

<header>
        <div id="navabar-1 class-a">    
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
                <form action="index.php">
                  <div class="search-icon">
                    <i class="fas fa-search"></i>
                  </div>
                  <input type="text" value="<?php echo $searchTitle; ?>" name="search" id="" class="search" placeholder="Search..."/>
                  <button class="nav-btn">
                    <i class="fas fa-cart-plus"></i>
                  </button>
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


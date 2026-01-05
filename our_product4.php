<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/logo-icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seneth Healing Foods</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    
    <?php require('inc/links.php'); ?>
    <style>
    
        .section-title-our-product p {
          color: var(--heading-color);
          margin: 10px 0 0 0;
          font-size: 40px;
          font-weight: 600;
          font-family: var(--default-font);
        }
        
        /* Media query for screen width less than 576px */
        @media (max-width: 575.98px) {
          .section-title-our-product p {
            font-size: 30px !important;
          }
        }
        
        .products{
            background-size: cover;
            background-attachment: fixed; /* Keeps the background fixed during scroll */
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .product-img {
            max-height: 100%;
            width: 100%;
            object-fit: contain;
            padding: 5px;
        }
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0);
            border:none;
            transition: transform 0.5s;
            background-color:#f9faf8;
        }
        .card:hover {
            transform: scale(1.01);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
        }
        .text-start {
            text-align: left !important;
        }
        .card-footer h4 {
            font-size: 1.3rem;
            margin-right: 15px;
            color:#000000;
            font-weight:bold;
            font-family: Arial, Helvetica, sans-serif;
        }
        .card-footer{
            background-color:  #A3C1AD;
            border:none;
        }
        .btn-link {
            text-decoration: none;
            color: #ffa500;
        }
        .btn-link:hover {
            color: #ff8c00;
        }
        .item-torn {
            position: relative;
            bottom: -2px;
            padding: 10px 0; 
            background-color:  #A3C1AD; /* Turquoise background */
            clip-path: polygon(
                0 14px, 6% 13px, 10% 14px, 17% 12px, 22% 14px, 
                26% 11px, 30% 10px, 35% 11px, 38% 13px, 40% 11px, 
                44% 9px, 48% 12px, 53% 10px, 57% 7px, 62% 6px, 
                65% 7px, 69% 9px, 73% 9px, 79% 7px, 83% 9px, 
                85% 5px, 87% 8px, 90% 6px, 94% 4px, 97% 3px, 
                100% 0, 100% 100%, 0 100%
            );
        }
    </style>
</head>

<body class="index-page">

    <?php require('inc/header.php'); ?>
    
    <header id="header" class="header sticky-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="assets/img/logo.png" alt="">
            </a>
           
            
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" >HOME<br></a></li>
                    <li><a href="about.php" >ABOUT US</a></li>
                    <li class="dropdown"><a style="cursor: pointer;" class="active"><span>OUR PRODUCTS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li class="dropdown"><a href="our_product1.php"><span>Vegan Plant-Based Ready Meals</span></a></li>
                            <li class="dropdown"><a href="our_product2.php"><span>High-Fiber Plant-Based Vegan Meat Alternatives <br>(including jackfruit-based products)</span></a></li>
                            <li class="dropdown"><a href="our_product3.php"><span>Vegan Egg Substitutes</span></a></li>
                            <li class="dropdown"><a href="our_product4.php"><span>Vegan Accompaniments, Condiments, and Desserts</span></a></li>
                            <li class="dropdown"><a href="our_product5.php"><span>Plant-Based Beverages and Milk Supplements</span></a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>
    
  
    <section id="products" class="products section" style="background-image: url(assets/image/back1.jpeg);">
    <div class="container section-title section-title-our-product">
        <h2>Our Products<br></h2>
        <p><span>Vegan Accompaniments,</span> <span class="description-title">Condiments, and Desserts</span></p>
    </div>

    <div class="container">
        <div class="row d-flex">
            <?php
            include('connection/connection.php'); 
            $sql = "SELECT id, name, image,description FROM vegan_accompaniments";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='main-card col-sm-12 col-md-6 col-lg-4 col-xl-3 mb-5  d-flex'>";
                    echo "<a href='our_product_description4.php?id=" . $row['id'] . "&category=veganaccompaniments'>";
                    echo "<div class='card d-flex flex-column align-items-center p-0 w-100 mx-2' style='border-radius: 15px;  height: 100%;'>";
                    
                    // Product image centered vertically
                    echo "<div class='image-container d-flex align-items-center justify-content-center' style='height: 250px;'>";
                    echo "<img src='project/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='product-img mb-4 px-2'/>";
                    echo "</div>";

                    // Product name on one line, "Read More" on another line
                    echo "<div class=' p-auto w-100 pb-3 h-100 text-left rounded-bottom-4'>";
                    echo "<div class='item-torn w-100 m-0 '></div>";
                    echo "<div class='card-footer p-auto w-100 pb-0 h-100 rounded-bottom-4'>";
                    echo "<h4 class='text-center mb-3'>" . htmlspecialchars($row['name']) . "</h4>";
                    echo "<div class='text-center'>";  // Add a wrapper div with text-center
                        echo "<a class='fw-bold px-2' style='color: #ffffff; font-family: Arial, Helvetica, sans-serif;'>". htmlspecialchars($row['description']) ."</a>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";

                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>No products found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</section>
    
    <?php require('inc/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    

    <!-- Your custom JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
</body>
</html>

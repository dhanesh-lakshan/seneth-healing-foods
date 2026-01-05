<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="assets/img/logo-icon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="EDkBz8TK5ru_SDCCZ6wjDvzdFdtMKEZMGpLUEERccK8" />
    <meta name="description" content="Explore Seneth Healing Foods for organic, healthy food products that nurture your well-being. Shop now for a healthier lifestyle!">
    <meta name="keywords" content="organic foods, healthy lifestyle, healing foods, Seneth Healing Foods">
   
    <title>Seneth Healing Foods</title>
    <link rel="canonical" href="https://www.senethhealingfoods.com/">
    <?php require('inc/links.php'); 
    
if (
    (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') ||  
    strpos($_SERVER['HTTP_HOST'], 'www.') === false              
) {
    $redirectURL = "https://www.senethhealingfoods.com" . $_SERVER['REQUEST_URI'];
    header("Location: $redirectURL", true, 301);
    exit();
}
    
    ?>
    
    
    <style>
        body{
            background-color:#00426a;
            margin: 0;
            overflow-x: hidden;
        }
        
        .product-line-text h2 {
            font-size: 3rem;
            color: #ffffff;
            font-weight: 600;
            text-shadow: 2px 2px 4px #000000;
        }
        @media (max-width: 992px) {
            .product-line-text h2 {
                font-size: 2.5rem;
            }
        }
        @media (max-width: 768px) {
            .product-line-text h2 {
                font-size: 2rem;
            }
        }

        .text-content-des{
            font-weight:600;
        }
        
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px); /* Starts slightly lower */
            }
            to {
                opacity: 1;
                transform: translateY(0); /* Moves to its original position */
            }
        }
        
        .block {
            opacity: 0; /* Initially hidden */
            transform: translateY(20px); /* Starts slightly lower */
            transition: opacity 0.5s ease-out, transform 0.5s ease-out; /* Smooth transition */
        }
        
        .block.animate {
            opacity: 1;
            transform: translateY(0); /* Moves to final position */
        }
    </style>
</head>

<body class="index-page">

    <?php require('inc/header.php'); ?>
    <header id="header" class="header sticky-top">
    
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <img src="assets/img/logo.png" alt="">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">HOME<br></a></li>
                    <li><a href="about.php" >ABOUT US</a></li>
                    <li class="dropdown"><a style="cursor: pointer;"><span>OUR PRODUCTS</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
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
    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4 justify-content-center justify-content-lg-between">
          <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 class="mb-3 mb-md-0">Welcome to Seneth Exports Pvt Ltd</h1>
            <p>
                With over 30 years in the Sri Lankan food industry, we offer natural, plant-based foods that promote health and harmony with nature. 
                Our preservative-free, vegan products are crafted with care and backed by top certifications, supporting your journey to wellness and spiritual growth.
            </p>
          </div>
          <div class="col-lg-5 order-1 order-lg-2 hero-img">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
    
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-lg-12 text-center product-line-text my-3">
                <h2>SELECT YOUR PLANT BASED ALTERNATIVES</h2>
            </div>
        </div>
        
      </div>

    </section><!-- /Hero Section -->

    <section class="products-line-up m-0" style="background-color: #00426a;">
        <div class="container-fluid container-custom py-5 mt-4" style="background-color: #ffb81c;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 px-3 py-2 text-center">
                    <img src="assets/image/mvimage1.jpg" alt="Moving Mountains No Chicken Burger" class="burger-img  image-fluid block" >
                    </div>
                    <div class="col-12 col-lg-5  p-5 py-2 text-content">
                    <h2 class="text-content-head block" style="color:#fff;" >Vegan Plant-Based<br><span>Ready Meals</span></h2>
                    <p class="mt-3 text-content-des block" style="color:#fff; font-weight:800;" >
                        Nutritious, protein-rich ready meals crafted from pulses, rice, and plant-based ingredients, including versatile dishes like idly (five varieties), 
                        ensuring convenience without compromising health and taste.  
                    </p>
                    <a href="our_product1.php" class="btn btn-custom py-1 px-5 mt-3 block">Find out More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-custom py-5 mt-4" style="background-color: #3cdbc0;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 px-3 py-2 text-center">
                    <img src="assets/image/mvimage22.jpg" alt="Moving Mountains No Chicken Burger" class="burger-img image-fluid block">
                    </div>
                    <div class="col-12 col-lg-5  p-5 py-2 text-content block">
                    <h2 class="fw-bold text-content-head" >High-Fiber Plant-Based<br><span>Vegan Meat Alternatives</span></h2>
                    <p class="mt-3 text-content-des block" style="font-weight:800;" >
                        Delicious meat substitutes made from jackfruit and plant proteins, featuring burgers, meatballs, BBQ styles, and soy-based alternatives, offering 
                        high-fiber, versatile, and sustainable meal solutions. 
                    </p>
                    <a href="our_product2.php" class="btn btn-custom py-1 px-5 mt-3 block" >Find out More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-custom py-5 mt-4" style="background-color: #5bc2e7;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 px-3 py-2 text-center">
                    <img src="assets/image/mvimage33.jpg" alt="Moving Mountains No Chicken Burger" class="burger-img image-fluid block">
                    </div>
                    <div class="col-12 col-lg-5  p-5 py-2 text-content">
                    <h2 class="fw-bold text-content-head block" style="color:#fff;" >Vegan<br><span>Egg Substitutes</span></h2>
                    <p class="mt-3 text-content-des block" style="color:#fff; font-weight:800;">
                        Innovative egg-free options like soy protein scrambled eggs and vegan omelette cubes, perfect for breakfast or cooking, ensuring a rich 
                        protein source with no compromise on texture or flavor.
                    </p>
                    <a href="our_product3.php" class="btn btn-custom py-1 px-5 mt-3 block ">Find out More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-custom py-5 mt-4 " style="background-color: #A3C1AD;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 px-3 py-2 text-center">
                    <img src="assets/image/mvimage44.jpg" alt="Moving Mountains No Chicken Burger" class="burger-img image-fluid block">
                    </div>
                    <div class="col-12 col-lg-5  p-5 py-2 text-content">
                    <h2 class="fw-bold text-content-head block" >Vegan Complements,<br><span>Condiments, and Desserts</span></h2>
                    <p class="mt-3 text-content-des block" style="font-weight:800;">
                        A delightful range of sauces, coco aminos, lacto soy cheese, and plant-based desserts like vegan wood apple drinks, enhancing meals with unique 
                        flavors and wholesome ingredients.
                    </p>
                    <a href="our_product4.php" class="btn btn-custom py-1 px-5 mt-3 block">Find out More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-custom py-5 mt-4  " style="background-color: #e06287;">
            <div class="container py-5">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 px-3 py-2 text-center">
                    <img src="assets/image/mvimage555.png" alt="Moving Mountains No Chicken Burger" class="burger-img image-fluid block">
                    </div>
                    <div class="col-12 col-lg-5  p-5 py-2 text-content">
                    <h2 class="fw-bold text-content-head block" style="color:#fff;" >Plant-Based Beverages<br><span>and Milk Supplements</span></h2>
                    <p class="mt-3 text-content-des block" style="color:#fff; font-weight:800;" >
                        Healthy drinks and milk alternatives enriched with dual proteins, spices, and nutrients, offering immunity boosts 
                        and versatile use in smoothies, cereals, or standalone beverages.
                    </p>
                    <a href="our_product5.php" class="btn btn-custom py-1 px-5 mt-3 block">Find out More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="Capabilities p-0 py-3">

        <div class="container section-title mt-4 block">
            <p><span>Our Capabilities </span> <span class="description-title">and Benefits</span></p>
        </div>

        <div class="container mb-2 align-item-center">

            <div class="row d-flex">
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Decades of Expertise in the Food Industry.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Healing and Plant-Based Nutrition.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Natural, Preservative-Free Products.</p>
                    </div>
                </div>
                <div class="col-md-6 block" >
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Stringent Quality Standards and Certifications.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Promoting Holistic Health.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Commitment to Sustainability.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Innovation Backed by Generational Wisdom.</p>
                    </div>
                </div>
                <div class="col-md-6 block">
                    <div class="benefit-item p-2 py-3 mx-5">
                        <p>Spiritual and Compassionate Approach to Food.</p>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <?php require('inc/footer.php'); ?>
    
    
    <!-- AOS JS -->

    <script>
        let lastScrollPosition = 0; // Tracks the last scroll position
        let blocks = document.querySelectorAll('.block'); // Select all elements with class 'block'
        let delay = 0.2; // Initial delay for staggering the animations
    
        window.addEventListener('scroll', () => {
            let currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    
            blocks.forEach((block, index) => {
                let blockPosition = block.getBoundingClientRect().top;
    
                // Check if the element is in the viewport and hasn't already been animated
                if (blockPosition < window.innerHeight && blockPosition > 0 && !block.classList.contains('animate')) {
                    setTimeout(() => {
                        block.classList.add('animate');
                    }, index * delay * 100); // Consistent delay for each block
                }
            });
    
            // Update the last scroll position
            lastScrollPosition = currentScrollPosition;
        });
    </script>


    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    

</body>

</html>
<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
   <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/solid.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="./main.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body class="bg-white">
   
<?php include 'components/user_header.php'; ?>

<!-- Slider Start -->
<div class="home-bg">
   <section class="home">
      <div class="swiper home-slider">
         <div class="swiper-wrapper">
            <div class="swiper-slide slide">
               <div class="image">
               <img src="images/slider-1.jpg" alt="">
               </div>
               <!-- <div class="content">
                  <span>your interest dish prepared</span>
                  <h3>vegetarian diet</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div> -->
            </div>
            <div class="swiper-slide slide">
               <div class="image">
                  <img src="images/slider-2.jpg" alt="">
               </div>
               <!-- <div class="content">
                  <span>your fresh fast food</span>
                  <h3>fast food served fast</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div> -->
            </div>
            <div class="swiper-slide slide">
               <div class="image">
               <img src="images/slider-3.jpg" alt="">
               </div>
               <!-- <div class="content">
                  <span>spicy nor spicy</span>
                  <h3>street style noddles</h3>
                  <a href="shop.php" class="btn">shop now</a>
               </div> -->
            </div>
         </div>
         <div class="swiper-pagination"></div>
      </div>
   </section>
</div>
<!-- Slider End -->

<!-- About Us start -->
<section class="about bg container px-5" id="about">
   <h1 class="heading fw-3 p-3 mb-2" style="background-color: #f5f5f5;"> <span style="color: #358856;"> About </span> Us </h1>
   <div class="row">
      <div class="video-container">
            <video src="images/about-vid.mp4" loop autoplay muted></video>
            <h3>best gardening tools sellers</h3>
      </div>
      <div class="content p-1">                
            <p>If you love gardening, you’ll want the best possible tools for every garden activity. At LeafGo, we work hard to make sure you have the right tools at hand.<br> <br> From axes and mauls that deliver extreme performance while chopping logs or splitting firewood, to weeders that provide smart, more eco-friendly solutions for permanently removing weeds, Fiskars offers a wide variety of garden and yard tools that help make things easier and more efficient – season after season. </p>
            <p>Our cultivating tools are intuitively designed to help you plant, nurture and harvest what you love, while our gardening accessories include kneeling pads and tool organizers to help make your time in the garden more enjoyable and efficient. Our powerful, durable hedge shears, loppers and pruners feature smart technologies that maximize your power. Razor sharp teeth on our saws let you make short work of thick branches, while our shears and snips give you the dexterity and precision you need to make more delicate cuts on flowers and produce.</p>
            <p>LeafGo's tools are built to last and backed by a full lifetime warranty. However, we do offer replacement parts for many of our garden and yard tools.</p>
            <!-- <a href="#" class="button">learn more</a> -->
      </div>
   </div>
</section>
<!-- About Us End -->

<!-- Service Start -->
<div style="background: #eee!important; width: 100%;">
   <section class="icons-container">
      <div class="icons">
         <img src="images/icon-1.png" alt="">
         <div class="info">
               <h3>free delivery</h3>
               <span>on all orders</span>
         </div>
      </div>
      <div class="icons">
         <img src="images/icon-2.png" alt="">
         <div class="info">
               <h3>10 days returns</h3>
               <span>moneyback guarantee</span>
         </div>
      </div>
      <div class="icons">
         <img src="images/icon-3.png" alt="">
         <div class="info">
               <h3>offer & gifts</h3>
               <span>on all orders</span>
         </div>
      </div>
      <div class="icons">
         <img src="images/icon-4.png" alt="">
         <div class="info">
               <h3>secure paymens</h3>
               <span>protected by paypal</span>
         </div>
      </div>
   </section>
</div>
<!-- Service Section End -->

<!-- Feature Products -->
<section class="home-products mt-5">
<h1 class="heading fw-3 p-3 mb-2" style="background-color: #f5f5f5;"> <span style="color: #358856;"> Featured </span> Products</h1>
   <div class="swiper products-slider mt-5">
      <div class="swiper-wrapper">
         <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6"); 
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
         ?>
         <form action="" method="post" class="swiper-slide slide">
            <input type="hidden" name="pid" value="<?= $fetch_product['id']; ?>">
            <input type="hidden" name="name" value="<?= $fetch_product['name']; ?>">
            <input type="hidden" name="price" value="<?= $fetch_product['price']; ?>">
            <input type="hidden" name="image" value="<?= $fetch_product['image_01']; ?>">
            <button class="fas fa-heart" type="submit" name="add_to_wishlist"></button>
            <a href="quick_view.php?pid=<?= $fetch_product['id']; ?>" class="fas fa-eye"></a>
            <img src="uploaded_img/<?= $fetch_product['image_01']; ?>" alt="">
            <div class="name"><?= $fetch_product['name']; ?></div>
            <div class="flex">
               <div class="price"><span>$</span><?= $fetch_product['price']; ?><span>/-</span></div>
               <input type="number" name="qty" class="qty" min="1" max="40" onkeypress="if(this.value.length == 2) return false;" value="1">
            </div>
            <input type="submit" value="add to cart" class="btn text-white" name="add_to_cart">
         </form>
         <?php
            }
         }else{
            echo '<p class="emptyMessage">no products added yet!</p>';
         }
         ?>
      </div>
   <div class="swiper-pagination"></div>
   </div>
</section>
<!-- Feature Products -->

<!-- review section starts  -->
<section class="review pb-5">
   <h1 class="heading"> customer's <span>review</span> </h1>
   <div class="box-container">
         <div class="box">
            <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half"></i>
            </div>
            <p>So far so good. Registration and ordering was convenient and easy. Although there was a slight delay in the order status updating and the shipment getting out, the products were received in a timely fashion. I’ve to date only used the products for some seedlings and vegetation but have witnessed strong growth across the board. Can’t wait to see the results as I start to flower some plants.</p>
            <div class="user">
                  <img src="images/pic-1.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <span>happy customer</span>
                  </div>
            </div>
            <span class="fas fa-quote-right"></span>
         </div>

         <div class="box">
            <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
            </div>
            <p>Great Tools. Great Customer Service.
                  I had a problem when trying to order online so I called. The number was easy to find on the website and a real person answered the phone. She provided outstanding customer service and the product was delivered as promised within just a few days. Couldn't be happier. Highly recommend. Would like to get a copy of the catalog when available. Thanks for a stress free experience.</p>
            <div class="user">
                  <img src="images/pic-2.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <span>happy customer</span>
                  </div>
            </div>
            <span class="fas fa-quote-right"></span>
         </div>

         <div class="box">
            <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
            </div>
            <p>I wish I could face this company earlier in summer. I believe nowadays it's quite easy to find the company which would deliver spades and various things for gardening but this one is a unique company as it offers plenty of things and they are quite cheap. These days I am thinking about applying to this company once again, as I finally ordered here a month ago couple of tools in late spring. That, I want to order here some more and new instruments for planting.</p>
            <div class="user">
                  <img src="images/pic-3.png" alt="">
                  <div class="user-info">
                     <h3>john deo</h3>
                     <span>happy customer</span>
                  </div>
            </div>
            <span class="fas fa-quote-right"></span>
         </div>
   </div>
</section>
<!-- review section ends -->


<?php include 'components/footer.php'; ?>

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".home-slider", {
   loop:true,
   spaceBetween: 0,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
    },
   autoplay: {
      delay: 2000,
   },
});

 var swiper = new Swiper(".category-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
         slidesPerView: 2,
       },
      650: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
      1024: {
        slidesPerView: 5,
      },
   },
   autoplay: {
      delay: 2000,
   },
});

var swiper = new Swiper(".products-slider", {
   loop:true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      550: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
   },
   autoplay: {
      delay: 2000,
   },
});

let launchDate = new Date("August 1, 2022 12:00:00").getTime();
let timer = setInterval(tick, 1000)


function tick (){
let now = new Date().getTime();
let t = launchDate - now;

if (t > 0){
    // Algorith to calculate days...
    let days = Math.floor(t / (1000 * 60 * 60 * 24));
    if (days < 10){
        days  = "0" + days;
    }

// Algorith to calculate hours....
    let hrs = Math.floor((t % (1000 * 60 * 60 *24)) / (1000 * 60 * 60));
    if (hrs < 10){
        hrs  = "0" + hrs;
    }
// Algorith to calculate Minutes ....
    let mins = Math.floor((t % (1000 * 60 * 60 )) / (1000 * 60));
    if (mins < 10){
        mins  = "0" + mins;
    }

// Algorithm to calculate Seconds....
   let secs = Math.floor((t % (1000 * 60)) / (1000));
   if (secs < 10){
    secs  = "0" + secs;
}

let time = `${days} Days  |   ${hrs}  Hrs   |    ${mins} Mins  |  ${secs}  Sec`;

    document.querySelector('.countdown').innerHTML = time;
}
}
</script>

</body>
</html>
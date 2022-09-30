<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'cart quantity updated successfully!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:index.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:index.php');
}

?>


<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>

   <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
   <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      <a href="login.php" class="btn">login</a>
      <a href="register.php" class="option-btn">register</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>
   </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shopping cart</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>










</body>
</html>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
        /* home  */
?>
        </body>
</html>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAJRANG FESHAN</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="New folder (3)/all.css">
    
</head>
<body >
    <section id="header"> 
        <a href="#"><img src="New folder (3)/ing/bf1.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <table> 
                <li ><a class="active" href="New folder (3)/home.html">Home</a></li>
                        
                <li><a href="New folder (3)/shop.html">Shop</a></li>
                
                <li><a href="New folder (3)/conteck.html">Contact</a></li>
                
                
               
            </table>
            </ul>
        </div>
        <div id="mobile">
            <a href="cart.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fad fa-outdent"></i>
         
        </div>
    </section>
    

    
    <section id="product1" class="section-p1">
        <h2>Featured Products</h2>
         <p>Summer Collection New Morden Design</p>
         <div class="pro-container">
             <div class="pro"  onclick="window.location.href='New folder (3)/cart.html';">
                <img src="New folder (3)/ing/indriyans/b1.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                    
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>500</h4>
                </div>
              <a href="New folder (3)/cart.html"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro" onclick="window.location.href='New folder (3)/caet1.html';">
                <img src="New folder (3)/ing/indriyans/b2.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>550</h4>
                </div>
                <a href="New folder (3)/caet1.html"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro" onclick="window.location.href='New folder (3)/cart3.html';">
                <img src="New folder (3)/ing/indriyans/b3.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>600</h4>
                </div>
                <a href="New folder (3)/cart3.html"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro" onclick="window.location.href='New folder (3)/cart5.html';">
                <img src="New folder (3)/ing/indriyans/b5.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                       <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>450</h4>
                </div>
                <a href="New folder (3)/cart5.html"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/indriyans/b4.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                     
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>600</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/products/f4.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                     
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>800</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
              <div class="pro">
                <img src="New folder (3)/ing/products/f8.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>300</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/products/f7.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>550</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
         </div>
    </section>

    <section id="banner" class="section-m1">
        <h4>Repair Services</h4>
        <h2>Up to <span>70% off</span> - All t-Shirts </h2>
        <button class="normal">Explore More</button>
    </section>
   
    <section id="product1" class="section-p1">
        <h2>New Arrivals</h2>
         <p>Summer Collection New Morden Design</p>
         <div class="pro-container">
             <div class="pro">
                <img src="New folder (3)/ing/products/f1.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>999</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/products/f2.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>850</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/products/f3.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>879</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/products/f4.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$86</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/indriyans/b3.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>975</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/indriyans/b4.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>777</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
              <div class="pro">
                <img src="New folder (3)/ing/indriyans/b5.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>898</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
             <div class="pro">
                <img src="New folder (3)/ing/indriyans/b2.jpg" alt style="width: 279px ;height: 279px ;">
                <div class="des">
                      <H1></H1>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>868</h4>
                </div>
                <a href="#"><i class="fal fa-shopping-cart cart"></i></a>
             </div>
         </div>
    </section>

    <section id="banner3">
        <div class="banner-box">
            <h2>SEASONAL SALE</h2>
            <h3>Winter Collection -50% OFF</h3>
       </div>
         <div class="banner-box banner-box2">
            <h2>NEW  COLLECTION </h2>
            <h3>spring/summer 2023</h3>
       </div>
         <div class="banner-box banner-box3">
            <h2>T-SHIRTS</h2>
            <h3>New trendy Prints</h3>
       </div>
     </section>
     
    <section id="newsletter" class="section-p1 section-m1">
        <div class="newtext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
             
        </div>
      
        <div class="form">
            <input type="email" placeholder="Your emali address" >
            <button class="normal">Sign Up</button>
        </div>
    </section>
    
    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="New folder (3)/ing/bf1.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> 61,bajrang feshan,, nana varachha, Surat</p>
            <p><strong>Phone:</strong>  +91 7016318323</p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat </p>

            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>

                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About Us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact Us</a>

        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign In</a>
            <a href="#">View cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>
        <div class="Col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>

            <div class="row">
                <img  src="img/pay/app.jpg"  alt="" >
                <img src="img/pay/play.jpg" alt="">
            </div>
             <p>Secured Payment Gateways </p>
             <img src="img/pay/pay.png" alt=""> 
        </div>

    </footer>

    <script src="script.js"></script>
</body>
</html>
</body>
</html>



<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <?php
        /* home  */
?>
        </body>
</html>
<?php
session_start();  


include "../database/connect.php";

$conn = (new Connection())->getConnection();

if(isset($_GET['id'])){
    $id = $_GET['id'];
   
}
?>









<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.4/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/home.css">
  </head>

  <section class="hero is-medium">
    <div class="hero-head">
      <div class="container">
        <nav class="navbar" role="navigation" aria-label="main navigation">

          <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
              <a class="navbar-item">
                Home
              </a>
              <a class="navbar-item">
                Blog Posts
              </a>
            </div>

            <div class="navbar-end">
              <div class="navbar-item">
      
                  <a href="<?php echo "cart.php?id=".$id?>">
                        
                        <button class="button is-primary"><i class="fa-solid fa-cart-shopping"></i>&nbsp; Cart</button>
                        
                  </a>

                  <a href="">
                        
                        <button class="button is-primary"><i class="fa-solid fa-cart-shopping"></i>&nbsp; Logout</button>
                        
                  </a>
            
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
 
  </section>
  <section class="blog-posts">
    <div class="container">
   
          <hr>
          <div class="columns is-multiline">
      
            <div class="column post is-4">
              <article class="columns is-multiline">
                <div class="column is-12 post-img">
                  <img src="../img/pc.png" height="200px" width="200px" alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Gaming Pc</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="products.php?pid=1" class="button is-primary">Buy</a>
                </div>
              </article>
            </div>
            <div class="column post is-4">
              <article class="columns is-multiline">
                <div class="column is-12 post-img">
                  <img src="../img/laptop.png" height="200px" width="270px alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Gaming Laptop</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="products.php?pid=2" class="button is-primary">Buy</a>
                </div>
              </article>
            </div>
            <div class="column post is-4">
              <article class="columns is-multiline">
                <div class="column is-12 post-img">
                  <img src="../img/raspberry.png" alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Raspberry Pi</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="products.php?pid=3" class="button is-primary">Buy</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>

  </section>




  
</html>
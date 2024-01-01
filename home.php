<?php
include('database/connect.php');
include "classes/Contact.php";

// Create a new Connection instance
$conn = (new Connection())->getConnection();


// Check if the form is submitted
if (isset($_POST['submit'])) {

    $user    =  $_POST['user'];
    $email   =  $_POST['email'];
    $message = $_POST['message']; 
    $status = 0;
    
    $contact = new Contact($user, $email, $message,$status,$conn); // 0 as not treated

    $contact->setUserContact($user);
    $contact->setEmailContact($email);
    $contact->setMsgContact($message);
    $contact->setStatusContact($status);

    $userContact= $contact->getUserContact();
    $emailContact = $contact->getEmailContact();
    $messageContact = $contact->getMsgContact();
    $statusContact = $contact->getStatusContact();
    
    $contact->insertData($userContact,$emailContact,$messageContact,$status);
}

$conn->close();
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
                  <a href="login.php">
                        
                        <button class="button is-primary"> <i class="fa-solid fa-right-to-bracket"></i>&nbsp;Login</button>
                        
                  </a>&nbsp;
                  <a href="signup.php">
                        
                        <button class="button is-primary"> <i class="fa-solid fa-right-to-bracket"></i>&nbsp;Signup</button>
                        
                  </a>
            
              </div>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div class="hero-body">
      <div class="container has-text-centered">
            <br><h2 class="title">
          Inventory Management
        </h2>
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
                  <img src="img/pc.png" height="200px" width="200px" alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Gaming Pc</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="#" class="button is-primary">Read More</a>
                </div>
              </article>
            </div>
            <div class="column post is-4">
              <article class="columns is-multiline">
                <div class="column is-12 post-img">
                  <img src="img/laptop.png" height="200px" width="270px alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Gaming Laptop</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="#" class="button is-primary">Read More</a>
                </div>
              </article>
            </div>
            <div class="column post is-4">
              <article class="columns is-multiline">
                <div class="column is-12 post-img">
                  <img src="img/raspberry.png" alt="Featured Image">
                </div>
                <div class="column is-12 featured-content ">
                  <h1 class="title post-title">Raspberry Pi</h1>
                  <p class="post-excerpt">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus ratione harum eaque, animi nulla tempore quis, quam voluptatum.</p>
                  <br>
                  <a href="#" class="button is-primary">Read More</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>

  </section>




  <form action="" method="POST" id="contactForm">
    <section class="section">
    <h1 class="has-text-centered title is-3"><br>Contact Us :</h1> 

        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="field">

                        <label class="label">Username</label>
                        <div class="control">
                            <input class="input is-primary" type="text" placeholder="Username" id="username" name="user" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-primary" type="email" placeholder="Email input" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Message</label>
                        <div class="control">
                            <textarea class="textarea is-primary" placeholder="Textarea" id="message" name="message" required></textarea>
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div class="control">
                            <input class="button is-primary" type="submit" name="submit" value="Submit">
                            <button class="button is-primary is-light" type="button" onclick="clearField();">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
</html>
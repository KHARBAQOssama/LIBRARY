<?php
include './assets/php/script.php';
include './assets/php/database.php';
// if(!isset($_SESSION['profile']))    header('location:signin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YOURLIBRARY-Home</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body class="bg-black row p-0 m-0">
    
    <nav class="col-12 navbar navbar-expand-lg navbar-light bg-dark">
        <!-- Container wrapper -->
        <div class="container">
          <!-- Navbar brand -->
          <a class="navbar-brand me-5" href="">
            <img
              src="./assets/img/logo.png"
              height="30"
              alt="Logo"
              loading="lazy"
              style="margin-top: -1px;"
            />
            <span class="text-info">YOURBOOK</span>
          </a>
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse bg-dark ms-5" id="navbarButtonsExample">
            <!-- Left links -->
            <div class="navbar-nav me-auto my-2 mb-lg-0">
              <button  class="nav-item btn-sm border-0 bg-info rounded text-white d-flex align-items-center mx-4">
                <a class="nav-link text-white" href="home.php"><i class="bi me-2 bi-house text-white"></i>Home</a>
              </button>
              <button class="nav-item btn-sm text-white rounded d-flex align-items-center mx-4">
                <a class="nav-link text-white" href="mybooks.php"><i class="bi me-2 bi-book text-white"></i>My Books</a>
              </button>
              <button class="nav-item btn-sm text-white rounded  d-flex align-items-center mx-4">
                <a class="nav-link text-white" href="statics.php"><i class="bi me-2 bi-bar-chart text-white"></i>Statics</a>
              </button>
            </div>
            <!-- Left links -->
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm me-3 border-0 fw-bold bg-info" data-bs-toggle="modal" data-bs-target="#add-book">
                        <i class="bi bi-plus"></i>
                        Add Book
                    </button>
                </div>
                <div class="d-flex align-items- ms-1 border-2 border-white rounded">
                    <a href="#" class="text-decoration-none text-white">


                    <span><?php if (isset($_SESSION['profile'])){ 
                                echo $_SESSION['profile']['username']; }
                       ?></span>



                    <i class="bi bi-person-circle ms-2 fs-5"></i></a>
                </div>
            </div>
            <form action="script.php" method="post" class="ms-3">
              <button type="submit" class="btn-sm border-0 bg-info rounded text-white d-flex align-items-center mx-2 px-1" id="signout" name="signout">SIGN OUT</button>
            </form>

          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
      <!-- Navbar -->
      <div class="breadcrumbs">
            <ul>
              <li></li>
            </ul>
      </div>
      <div class="text-center">
      <?php if (isset($_SESSION['welcome'])): ?>
                        <div class="alert alert-sm alert-info alert-dismissible fade show">
                        <strong class="text-info me-2">HELLO!</strong>
                        <?php 
                                echo $_SESSION['welcome'];
                            ?>
                            <b class="text-black">
                               <?php  
                                echo $_SESSION['profile']['username'];
                                ?>
                                </b>
                               <?php 
                                unset ($_SESSION['welcome']);
                                
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                        </div>
                    <?php endif ?>


                   
      </div>
      <section class="d-flex row justify-content-around gap-3">
      <?php 
            if (isset($_SESSION['profile'])){ 
            allBooks($_SESSION['profile']['id'] , $_SESSION['profile']['username']);} ?>
      </section>
    <!-- JavaScript Bundle with Popper -->
    <script src="./assets/js/script.js"></script>
    
</body>
</html>
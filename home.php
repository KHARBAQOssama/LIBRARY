<?php
include './assets/php/script.php';
include './assets/php/database.php';
if(!isset($_SESSION['profile']))    header('location:./assets/php/signin.php');
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
              style="margin-top: -1px;"
            />
            <span class="text-info fw-bold">YOURBOOK</span>
          </a>
          <!-- Toggle button -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          
      
          <!-- Collapsible wrapper -->
          <div class="collapse navbar-collapse bg-dark ms-lg-5" id="navbarButtonsExample">
            <!-- Left links -->
            <div class="navbar-nav me-auto my-2 mb-lg-0">
              <button class="nav-item my-lg-0 my-2 text-center px-lg-0 ps-5  btn-sm border-0 bg-info rounded text-white d-flex align-items-center mx-lg-4">
                <a class="nav-link text-center text-white" href="home.php"><i class="bi me-2 bi-house text-white"></i>Home</a>
              </button>
              <button class="nav-item my-lg-0 my-2 text-center px-lg-0 ps-5  btn-sm text-white  rounded d-flex align-items-center mx-lg-4">
                <a class="nav-link text-center text-white" href="mybooks.php"><i class="bi me-2 bi-book text-white"></i>My Books</a>
              </button>
              <button class="nav-item my-lg-0 my-2 text-center px-lg-0 ps-5  btn-sm text-white rounded  d-flex align-items-center mx-lg-4">
                <a class="nav-link text-center text-white" href="statics.php"><i class="bi me-2 bi-bar-chart text-white"></i>Statics</a>
              </button>
            </div>
            <!-- Left links -->
                <div class="d-flex align-items-center justify-content-between">
                    <button type="button" class="btn btn-sm me-3 border-0 fw-bold bg-info" data-bs-toggle="modal" data-bs-target="#add-book">
                        <i class="bi bi-plus"></i>
                        Add Book
                    </button>
                    <div class="d-flex align-items-center mx-2">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#show-profile" class="text-decoration-none">

                    <span><?php if (isset($_SESSION['profile'])){ 
                                echo strtoupper($_SESSION['profile']['username']); }
                        ?></span>

                    <i class="bi bi-person-circle ms-2 fs-5"></i></a>
                </div>
                <form action="./assets/php/script.php" method="post">
                    <button type="submit" class="btn-sm border-0 bg-info rounded text-white d-flex align-items-center mx-2 px-1" id="signout" name="signout">SIGN OUT</button>
                </form>
                </div>
            

          </div>
          <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
      </nav>
    <!-- Navbar -->
    <div class="border border-info my-3 w-75 mx-auto text-center py-1">
            <h3 class="text-info"><i class="bi bi-house text-info"></i> Home</h3>
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

      <?php if (isset($_SESSION['changeProfile'])): ?>
                        <div class="alert alert-sm alert-info alert-dismissible fade show">
                        <strong class="text-info me-2">HELLO!</strong>
                        <?php 
                                echo $_SESSION['changeProfile'];
                                unset ($_SESSION['changeProfile']);
                                
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></span>
                        </div>
                    <?php endif ?>


                   
      </div>
      <section class="d-flex row justify-content-around px-5 gap-3">
      <?php 
            if (isset($_SESSION['profile'])){ 
            allBooks($_SESSION['profile']['id'] , $_SESSION['profile']['username']);} ?>
      </section>


      <?php
      include './assets/php/forms.php'
      ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="./assets/js/script.js"></script>
    
</body>
</html>
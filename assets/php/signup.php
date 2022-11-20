<?php
include '../php/script.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .hide{
            visibility: hidden;
        }
        .visible{
            visibility: visible !important;
        }
        .fillout{
            border-bottom: 2px solid red !important;
        }
        .success{
            border-bottom: 2px solid rgb(5, 203, 61) !important;
        }
        
    </style>
</head>
<body class="bg-black pt-5 p-0 m-0 row">
    <div class="container d-flex m-auto bg-white rounded row col-sm-11 col-md-9 col-lg-7">
        <div class="col-6 d-none d-lg-flex d-md-flex my-3 ">
            <img class="w-100 rounded" src="../img/illus1.jpg" alt="">
        </div>
        <form action="script.php" method="post" class="col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark " id="signup-form" >
                    <div class="d-flex justify-content-center mb-3">
                        <h3 class="text-info">SIGN UP
                        </h3>
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-sm alert-danger alert-dismissible fade show">
                        <strong class="text-danger me-2">ERROR!</strong>
                            <?php 
                                echo $_SESSION['error']; 
                                unset($_SESSION['error']);
                            ?>
                            <button type="button" class="btn-close border-0" data-bs-dismiss="alert"></span>
                        </div>
                    <?php endif ?>
                    
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-person"></i>
                        <input type="text" name="username" class="form-control rounded-0" id="username" placeholder="UserName">
                        <i class="hide" id="i1"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-at"></i>                        
                        <input type="email" name="email" class="form-control rounded-0 " id="email" placeholder="Email address">
                        <i class="hide" id="i2"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" class="form-control rounded-0 " id="password" placeholder="Password">
                        <i class="hide" id="i3"></i>
                    </div>
                    <div class="mb-3  d-flex position-relative">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password2" class="form-control rounded-0 " id="password2" placeholder="Confirme the Password">
                        <i class="hide" id="i4"></i>
                    </div>
                    <div class="w-100 d-flex justify-content-around align-items-center">
                        <p class="text-dark mt-2"><a class="text-dark" href="signin.php">I Already Have An Account</a></p>
                        <button type="submit" name="submitSup" class="btn-sm text-info fw-bold rounded px-2">REGISTER</button>
                    </div>
        </form>
      </div>
         <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="../js/signup.js"></script>
</body>
</html>
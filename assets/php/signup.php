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
</head>
<body class="bg-info pt-5 p-0 m-0 row">
    <div class="container d-flex shadow m-auto bg-white rounded row col-sm-11 col-md-9 col-lg-7">
        <div class="col-6 d-none d-lg-flex d-md-flex my-3 ">
            <img class="w-100 rounded" src="../img/illus1.jpg" alt="">
        </div>
        <form action="script.php" method="post" class="col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark " id="signup-form" >
                    <div class="d-flex justify-content-center mb-5">
                        <h3 class="text-info mb-3">SIGN UP</h3>
                    </div>



                    <div class="mb-4  d-flex position-relative">
                        <i class="bi bi-person"></i>
                        <input type="text" name="username" class="form-control rounded-0" id="username" placeholder="UserName">
                        <p class="ms-4 ps-2 d-block position-absolute text-danger top-100 opacity-0" id="error1">please enter a valid data</p>
                    </div>
                    <div class="mb-4  d-flex position-relative">
                        <i class="bi bi-at"></i>                        
                        <input type="email" name="email" class="form-control rounded-0" id="email" placeholder="Email address">
                        <p class="ms-4 ps-2 d-block position-absolute text-danger top-100 opacity-0" id="error2">please enter a valid data</p>
                    </div>
                    <div class="mb-4  d-flex position-relative">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password">
                        <p class="ms-4 ps-2 d-block position-absolute text-danger top-100 opacity-0" id="error3">please enter a valid data</p>
                    </div>
                    <div class="mb-4  d-flex position-relative">
                        <i class="bi bi-lock"></i>
                        <input type="password" name="password2" class="form-control rounded-0" id="password2" placeholder="Confirme the Password">
                        <p class="ms-4 ps-2 d-block position-absolute text-danger top-100 opacity-0" id="error4">please enter a valid data</p>
                    </div>
                    <div class="w-100 d-flex justify-content-around align-items-center">
                        <p class="text-dark mt-2"><a class="text-dark" href="signin.php">I Already Have An Account</a></p>
                        <button type="submit" name="submitSup" class="btn-sm text-info rounded-5 fw-bold px-2" id="supBtn" disabled>REGISTER</button>
                    </div>
        </form>
      </div>

      <script src="../js/signup.js"></script>
         <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
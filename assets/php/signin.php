<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-info pt-5 p-0 m-0 row">
    <div class="container d-flex m-auto bg-white rounded shadow row col-sm-11 col-md-9 col-lg-7">
        <div class="col-6 d-none d-lg-flex d-md-flex my-3 ">
            <img class="w-100 rounded" src="../img/illus2.jpg" alt="illustration">
        </div>
        <form action="script.php" method="post" class="col-lg-6 col-md-6 col-sm-12 m-0 sign-form m-auto bg-white text-dark" id="signin-form">
            <div class="d-flex justify-content-center mb-5">
                <h3 class="text-info">SIGN IN</h3>
            </div>
            <div class="mb-3  d-flex position-relative">
                <i class="bi bi-at"></i>
                <input type="email" name="email" class="form-control rounded-0 " id="emailIn" placeholder="Email address">
                <i class="hide" id="i6" title="email invalid"></i>
            </div>
            <div class="mb-5  d-flex position-relative">
                <i class="bi bi-lock"></i>
                <input type="password" name="password" class="form-control rounded-0 " id="passwordIn" placeholder="Password">
                <i class="hide" id="i7" title="password is not correct"></i>
            </div>
            <div class="w-100 d-flex justify-content-around align-items-center">
                <p class="text-dark mt-2"><a class="text-dark" href="signup.php">Create An Account</a></p>
                <button type="submit" name="submitSin" class="btn-sm text-info fw-bold rounded px-2">SIGN IN</button>
            </div>
        </form>
      </div>
         <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'database.php';
session_start();

// print_r($_POST);

if(isset($_POST['submitSup']))       register();
if(isset($_POST['submitSin']))       signIn();


function register(){
    global $conn;
    //CODE HERE
    // let's collect inputs values ;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $result = mysqli_query($conn ,"SELECT count(*) FROM admin WHERE admin.email= '$email';");
    $row = mysqli_fetch_assoc($result);


    if($row['count(*)'] == 1){


        $_SESSION['error'] = "this email is already exist!";
            header('location: signup.php'); 


    }else if($row['count(*)'] == 0){


    //SQL INSERT
        $result = mysqli_query($conn ,"INSERT INTO `admin` (`username`,`email`,`password`) VALUES ('$username','$email','$password')");

        if($result){
            $_SESSION['message'] = " your account has been created successfully !";
            header('location: signin.php');
        }
    }
}

function signIn(){
    global $conn;
    //CODE HERE
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    
    $result = mysqli_query($conn ,"SELECT count(*) FROM admin WHERE admin.email= '$email';");
    $row = mysqli_fetch_assoc($result);
    if($row['count(*)'] == 0){

        $_SESSION['incorrect'] = "email is not correct !";
            header('location: signin.php'); 
    }else{
        $result1= mysqli_query($conn ,"SELECT * FROM admin WHERE admin.email= '$email';");
        $_SESSION['profile'] = mysqli_fetch_assoc($result1);

        if($_SESSION['profile']['password'] != $password){
            $_SESSION['incorrect'] = "password is not correct !";
            header('location: signin.php'); 
        }else{
            $_SESSION['welcome'] = "welcome back  ";
            header('location: home.php'); 
        }
    }

}

function allBooks($x,$y){
    global $conn;
    $result = mysqli_query($conn, "SELECT * FROM books");

    while($book = mysqli_fetch_assoc($result)){
        $id=$book['id'];
        $title = $book['title'];
        $author = $book['author'];
        $category = $book['category'];
        $price = $book['price'];
        $userId = $book['admin'];
    
        ?>
        <div class="col-sm-11 col-lg-2 m-3 position-relative book d-flex justify-content-center">
          <a href="#">
          <?php if($category == 1){
                                ?>
            <img class="w-100" src="images/Music.png" alt="">                    
          <?php }else if($category == 2){
                                ?>
            <img class="w-100" src="images/historic.png" alt="">
          <?php }else if($category == 3){
                                ?>
            <img class="w-100" src="images/Sciences.png" alt="">
          <?php }else if($category == 4){
                                ?>
            <img class="w-100" src="images/animal.png" alt="">
            <?php }?>
          <h5 class="text-center position-absolute top-0 p-1 book-info"><?php echo "$title" ;?></h5>
            <div class="position-absolute bottom-0  book-info">
                <p class="text-center mt-2">AUTHOR : <span><?php echo "$author" ;?></span></p>
                <div class="d-flex align-items-center justify-content-between">
                <p class="ms-2 fw-bold">PRICE : <span class="text-info"><?php echo "$price" ;?></span>$</p>
                <?php if($userId != $x){
                                ?>
                <button type="button" onclick="buying('<?= $title?>','<?= $y?>',<?= $id?>,<?= $x?>);" class="px-2 py-1 mb-3 rounded" data-bs-toggle="modal" data-bs-target="#deleteBook"><i class="bi bi-cart"></i></button>
                <?php }?>
                </div>
            </div></a>
        </div>
        <?php    }

}


